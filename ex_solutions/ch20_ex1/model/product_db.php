<?php
function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE categoryID = ?
              ORDER BY productID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_products() {
    global $db;
    $query = 'SELECT * FROM products ORDER BY productID';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT *
              FROM products
              WHERE productID = ?';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_product($category_id, $code, $name, $description,
        $price, $discount_percent) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, description,
                  listPrice, discountPercent, dateAdded)
              VALUES
                 (?, ?, ?, ?, ?,
                  ?, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $category_id);
        $statement->bindValue(2, $code);
        $statement->bindValue(3, $name);
        $statement->bindValue(4, $description);
        $statement->bindValue(5, $price);
        $statement->bindValue(6, $discount_percent);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($product_id, $code, $name, $description,
                        $price, $discount_percent, $category_id) {
    global $db;
    $query = 'UPDATE Products
              SET productName = ?,
                  productCode = ?,
                  description = ?,
                  listPrice = ?,
                  discountPercent = ?,
                  categoryID = ?
              WHERE productID = ?';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $code);
        $statement->bindValue(3, $description);
        $statement->bindValue(4, $price);
        $statement->bindValue(5, $discount_percent);
        $statement->bindValue(6, $category_id);
        $statement->bindValue(7, $product_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products WHERE productID = ?';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $product_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>