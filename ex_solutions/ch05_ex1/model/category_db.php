<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $result = $db->query($query);
    return $result;
}

function get_category_name($category_id) {
    global $db;
    $query = "SELECT * FROM categories
              WHERE categoryID = $category_id";
    $category = $db->query($query);
    $category = $category->fetch();
    $category_name = $category['categoryName'];
    return $category_name;
}

function add_category($name) {
    global $db;
    $query = "INSERT INTO categories (categoryName)
              VALUES ('$name')";
    $db->exec($query);
}

function delete_category($category_id) {
    global $db;
    $query = "DELETE FROM categories
              WHERE categoryID = '$category_id'";
    $db->exec($query);
}
?>