<?php
require_once('../../util/main.php');
require_once('util/secure_conn.php');
require_once('util/valid_admin.php');

require_once('model/admin_db.php');
require_once('model/product_db.php');
require_once('model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_categories';
}

$action = strtolower($action);
switch ($action) {
    case 'list_categories':
        $categories = get_categories();

        include('category_list.php');
        break;
    case 'delete_category':
        $category_id = $_POST['category_id'];

        delete_category($category_id);
        
        header("Location: .");
        break;
    case 'add_category':
        $name = $_POST['name'];

        // Validate inputs
        if (empty($name)) {
            display_error('You must include a name for the category.
                           Please try again.');
        } else {
            $category_id = add_category($name);
        }

        header("Location: .");
        break;
    case 'update_category':
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];

        // Validate inputs
        if (empty($name)) {
            display_error('You must include a name for the category.
                          Please try again.');
        } else {
            update_category($category_id, $name);
        }

        header("Location: .");
        break;
}

?>