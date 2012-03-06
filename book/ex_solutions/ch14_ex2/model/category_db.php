<?php
namespace Store {
    class CategoryDB {
        public static function getCategories() {
            $db = \Store\Database::getDB();
            $query = 'SELECT categoryID, categoryName
                      FROM categories
                      ORDER BY categoryName';
            $result = $db->query($query);
            $categories = array();
            foreach ($result as $row) {
                $category = new Category($row['categoryID'],
                                         $row['categoryName']);
                $categories[] = $category;
            }
            return $categories;
        }

        public static function getCategory($category_id) {
            $db = \Store\Database::getDB();
            $query = "SELECT categoryID, categoryName
                      FROM categories
                      WHERE categoryID = '$category_id'";
            $statement = $db->query($query);
            $row = $statement->fetch();
            $category = new Category($row['categoryID'],
                                     $row['categoryName']);
            return $category;
        }
    }
}
?>