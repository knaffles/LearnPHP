<?php
namespace Store {
    class Product {
        private $category, $id, $name, $description, $price;

        public function __construct($category, $name, $description, $price) {
            $this->category = $category;
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
        }

        public function getCategory() {
            return $this->category;
        }

        public function setCategory($value) {
            $this->category = $value;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($value) {
            $this->id = $value;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($value) {
            $this->name = $value;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($value) {
            $this->description = $value;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setPrice($value) {
            $this->price = $value;
        }

        public function getFormattedPrice() {
            $formattedPrice = '$' . number_format($this->price, 2);
            return $formattedPrice;
        }
    }
}
?>