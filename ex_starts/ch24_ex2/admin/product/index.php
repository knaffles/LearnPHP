<?php
require_once('../../util/main.php');
require_once('util/secure_conn.php');
require_once('util/valid_admin.php');
require_once('util/images.php');
require_once('model/product_db.php');
require_once('model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

$action = strtolower($action);
switch ($action) {
    case 'list_products':
        // get categories and products
        $category_id = $_GET['category_id'];
        if (empty($category_id)) {
            $category_id = 1;
        }
        $current_category = get_category($category_id);
        $categories = get_categories();
        $products = get_products_by_category($category_id);

        // display product list
        include('product_list.php');
        break;
    case 'view_product':
        $categories = get_categories();
        $product_id = $_GET['product_id'];
        $product = get_product($product_id);
        $product_order_count = get_product_order_count($product_id);
        include('product_view.php');
        break;
    case 'delete_product':
        $category_id = $_POST['category_id'];
        $product_id = $_POST['product_id'];
        delete_product($product_id);
        
        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
        break;
    case 'show_add_edit_form':
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
        } else {
            $product_id = $_POST['product_id'];
        }
        $product = get_product($product_id);
        $categories = get_categories();
        include('product_add_edit.php');
        break;
    case 'add_product':
        $category_id = $_POST['category_id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount_percent = $_POST['discount_percent'];

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            empty($price) ) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            $product_id = add_product($category_id, $code, $name,
                    $description, $price, $discount_percent);
            $product = get_product($product_id);
            include('product_view.php');
        }
        break;
    case 'update_product':
        $product_id = $_POST['product_id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount_percent = $_POST['discount_percent'];
        $category_id = $_POST['category_id'];

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            empty($price) ) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            update_product($product_id, $code, $name, $description,
                           $price, $discount_percent, $category_id);
            $product = get_product($product_id);
            include('product_view.php');
        }
        break;
    case 'upload_image':
        $product_id = $_POST['product_id'];
        $product = get_product($product_id);
        $product_code = $product['productCode'];

        $image_filename = $product_code . '.png';
        $image_dir = $doc_root . $app_path . $image_dir . 'images/';

        if (isset($_FILES['file1'])) {
            $source = $_FILES['file1']['tmp_name'];
            $target = $image_dir . DIRECTORY_SEPARATOR . $image_filename;

            // save uploaded file with correct filename
            move_uploaded_file($source, $target);

            // add code that creates the medium and small versions of the image
            process_image($image_dir, $image_filename);

            // display product with new image
            include('product_view.php');
        }
        break;
}
?>