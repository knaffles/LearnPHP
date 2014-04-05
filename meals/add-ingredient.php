<?php

/* This page adds an ingredient to a recipe */

require_once('database.php');

// Check to see if a new ingredient was submitted
if (isset($_POST['submit']) && isset($_POST['ingredient'])) {
	$new_ingredient = $_POST['ingredient'];
	$recipe_id = $_POST['recipe_id'];
	$query = "INSERT INTO ingredients (name) VALUES ('$new_ingredient')";
	$insert_count = $db->exec($query);
	$last_ingredient_id = $db->lastInsertId();

// Now insert the ingredient into the many-to-many table
	$query = "INSERT INTO recipes_ingredients (recipes_id, ingredients_id) VALUES ($recipe_id, $last_ingredient_id)";
	$insert_count = $db->exec($query);

// Return to view-recipe
	header("Location:view-recipe.php?recipe_id=$recipe_id");
}