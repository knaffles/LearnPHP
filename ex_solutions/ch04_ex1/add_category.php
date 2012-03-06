<?php
// Get the product data
$category_id = $_POST['category_id'];
$name = $_POST['name'];

// Validate inputs
if (empty($name)) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO categories (categoryName)
              VALUES ('$name')";
    $db->exec($query);

    // Display the Category List page
    include('category_list.php');
}
?>