<?php

/* This page adds an ingredient to a recipe */

require_once('database.php');

// Check to see if a new ingredient was submitted
if (isset($_GET['ingredient_id']) && isset($_GET['recipe_id'])) {
	$ingredient_id = $_GET['ingredient_id'];
	$recipe_id = $_GET['recipe_id'];
	$query = "DELETE FROM recipes_ingredients WHERE recipes_id = $recipe_id AND ingredients_id = $ingredient_id";
  // echo $query;
  // exit();
	$result = $db->exec($query);

// Return to view-recipe
	header("Location:view-recipe.php?recipe_id=$recipe_id");
}