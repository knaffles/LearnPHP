<?php
namespace Store {
    class ProductDB {
        public static function getProducts() {
            $db = Database::getDB();
            $query = '
                SELECT productID, productName, productDescription, listPrice,
                       categories.categoryID, categoryName
                FROM products
                   INNER JOIN categories
                       ON products.categoryID = categories.categoryID';
            $result = $db->query($query);
            $products = array();
            foreach ($result as $row) {
                $category = new Category($row['categoryID'],
                                         $row['categoryName']);
                $product = new Product($category,
                                       $row['productName'],
                                       $row['productDescription'],
                                       $row['listPrice']);
                $product->setId($row['productID']);
                $products[] = $product;
            }
            return $products;
        }

        public static function deleteProduct($product_id) {
            $db = Database::getDB();
            $query = "DELETE FROM products
                      WHERE productID = '$product_id'";
            $row_count = $db->exec($query);
            return $row_count;
        }

        public static function addProduct($product) {
            $db = Database::getDB();

            $category_id = $product->getCategory()->getId();
            $name = $product->getName();
            $description = $product->getDescription();
            $price = $product->getPrice();

            $query =
                "INSERT INTO products
                     (categoryID, productName, productDescription, listPrice)
                 VALUES
                     ('$category_id', '$name', '$description', '$price')";

            $row_count = $db->exec($query);
            return $row_count;
        }
    }
}
?>