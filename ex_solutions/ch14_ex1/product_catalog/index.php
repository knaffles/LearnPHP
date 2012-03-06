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
    $category_id = $_GET['category_id'];
    if (empty($category_id)) {
        $category_id = 1;
    }

    // Get product and category data
    $current_category = $categoryDB->getCategory($category_id);
    $categories = $categoryDB->getCategories();
    $products = $productDB->getProductsByCategory($category_id);

    include('product_list.php');
} else if ($action == 'view_product') {
    $categories = $categoryDB->getCategories();

    $product_id = $_GET['product_id'];
    $product = $productDB->getProduct($product_id);

    include('product_view.php');
}
?>