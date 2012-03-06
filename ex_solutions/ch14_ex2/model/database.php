<?php
namespace Store {
    class Database {
        private static $dsn = 'mysql:host=localhost;dbname=music_test';
        private static $username = 'mmuser';
        private static $password = 'pa55word';

        private static $db;

        private function __construct() {}

        public static function getDB () {
            if (!isset(self::$db)) {
                self::$db = new \PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            }
            return self::$db;
        }
    }
}
?>