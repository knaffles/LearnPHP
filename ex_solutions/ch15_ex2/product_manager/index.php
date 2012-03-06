<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/product.php');
require('../model/product_db.php');

require('../model/fields.php');
require('../model/validate.php');

// Set up fields
$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('code');
$fields->addField('name');
$fields->addField('price', 'Must be a valid number.');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

if ($action == 'list_products') {
    // Get the current category ID
    $category_id = $_GET['category_id'];
    if (!isset($category_id)) {
        $category_id = 1;
    }

    // Get product and category data
    $current_category = CategoryDB::getCategory($category_id);
    $categories = CategoryDB::getCategories();
    $products = ProductDB::getProductsByCategory($category_id);

    // Display the product list
    include('product_list.php');
} else if ($action == 'delete_product') {
    // Get the IDs
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    // Delete the product
    ProductDB::deleteProduct($product_id);

    // Display the Product List page for the current category
    header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
    $categories = CategoryDB::getCategories();
    include('product_add.php');
} else if ($action == 'add_product') {

    // Get form data
    $category_id = $_POST['category_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Validate form data
    $validate->text('code', $code, true, 1, 10);
    $validate->text('name', $name);
    $validate->number('price', $price);

    // Load appropriate view based on hasErrors
    if ($fields->hasErrors()) {
        $categories = CategoryDB::getCategories();
        include 'product_add.php';
    } else {
        $current_category = CategoryDB::getCategory($category_id);
        $product = new Product($current_category, $code, $name, $price);
        ProductDB::addProduct($product);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
}
?>