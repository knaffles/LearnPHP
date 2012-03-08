<?php
// Establish a database connection
$dsn = 'mysql:host=localhost;dbname=meals';
$username = 'usr_meals';
$password = 'mealspass';

try {
	$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	include('database-error.php');
	exit();
}
?>