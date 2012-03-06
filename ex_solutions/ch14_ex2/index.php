<?php
require_once('config.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

try {
    switch ($action) {
        case 'list_products':
            $products = Store\ProductDB::getProducts();
            include('view/product_list.php');
            break;
        case 'delete_product':
            $product_id = $_POST['product_id'];
            Store\ProductDB::deleteProduct($product_id);
            header('Location: .');
            break;
        case 'show_add_form':
            $categories = Store\CategoryDB::getCategories();
            include('view/product_add.php');
            break;
        case 'add_product':
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            // Validate inputs
            if (empty($name) || empty($description) || empty($price) ) {
                $errors[] = "Invalid product data. Try again.";
                include('view/error.php');
            } else {
                $category = Store\CategoryDB::getCategory($category_id);
                $product = new Store\Product($category, $name,
                                             $description, $price);
                Store\ProductDB::addProduct($product);
                header('Location: .');
            }
            break;
        default:
            $errors[] = "Invalid action. Try again.";
            include('view/error.php');
            break;
    }
} catch (Exception $e) {
    $errors[] = 'There was an error connecting ' .
                'to the database.';
    $errors[] = 'The database must be installed as ' .
                'described in appendix A.';
    $errors[] = 'The database must be running as ' .
                'described in chapter 2.';
    $errors[] = $e->getMessage();
    include('view/error.php');
}
?>