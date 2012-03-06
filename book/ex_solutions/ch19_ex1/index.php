<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$category_id = 1;

// Get the products
$products = get_products_by_category($category_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$name = 'Fender Telecaster';

// Delete the product and display an appropriate messge
$product = get_product_by_name($name);
if ($product) {
    $product_id = $product['productID'];
    $row_count = delete_product($product_id);
    if ($row_count > 0) {
        $delete_message = "$row_count row was deleted.";
    } else {
        $delete_message = "No rows were deleted.";
    }
} else {
    $delete_message = "There is no product with that name.";
}

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';

// Prepare and execute the statement
$product_id = add_product($category_id, $code, $name, $description, $price, 0);

// Display a message to the user
if ($product_id > 0) {
    $insert_message = "1 row was inserted with this ID: $product_id";
} else {
    $insert_message = "No rows were inserted.";
}

// Display the data
include 'home.php';

?>