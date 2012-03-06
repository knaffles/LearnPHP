<?php
// Get IDs
$product_id = $_POST['product_id'];
$category_id = $_POST['category_id'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM products
          WHERE productID = '$product_id'";
$db->exec($query);

// display the Product List page
include('index.php');
?>