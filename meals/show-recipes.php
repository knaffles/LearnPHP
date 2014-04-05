<?php

/*	This page displays all the ingredients for a given recipe.
*	The recipe ID is grabbed from the URL */

require_once('database.php');

// Fetch all recipes
$query = "SELECT rid, name FROM recipes";
$all_recipes = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Learning PHP</title>
</head>
<html>
<h1>All Recipes</h1>
<ul>
<?php foreach ($all_recipes as $recipe): ?>
	<li><a href="view-recipe.php?recipe_id=<?php echo $recipe[0]; ?>"><?php echo $recipe[1]; ?></a></li>
<?php endforeach; ?>
</ul>
</html>