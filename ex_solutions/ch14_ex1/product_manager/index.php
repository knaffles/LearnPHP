<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/product.php');
require('../model/product_db.php');

// create the CategoryDB and ProductDB objects
$categoryDB = new CategoryDB();
$productDB = new ProductDB();

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
    $current_category = $categoryDB->getCategory($category_id);
    $categories = $categoryDB->getCategories();
    $products = $productDB->getProductsByCategory($category_id);

    // Display the product list
    include('product_list.php');
} else if ($action == 'delete_product') {
    // Get the IDs
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    // Delete the product
    $productDB->deleteProduct($product_id);

    // Display the Product List page for the current category
    header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
    $categories = $categoryDB->getCategories();
    include('product_add.php');
} else if ($action == 'add_product') {
    $category_id = $_POST['category_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Validate the inputs
    if (empty($code) || empty($name) || empty($price)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $current_category = $categoryDB->getCategory($category_id);

        // Create the Product object
        $product = new Product();
        $product->setCategory($current_category);
        $product->setCode($code);
        $product->setName($name);
        $product->setPrice($price);

        // Add the Product object to the database
        $productDB->addProduct($product);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
}
?>