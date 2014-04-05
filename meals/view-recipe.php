<?php

/*	This page displays all the ingredients for a given recipe.
*	The recipe ID is grabbed from the URL */

require_once('database.php');

// Get the recipe ID
if (!isset($_GET['recipe_id'])) {
	echo "Error: no recipe ID specified";
	exit();
} else {
	$recipe_id = $_GET['recipe_id'];	
}

// Display the recipe name
$query = "SELECT name FROM recipes WHERE rid = $recipe_id";
$recipe_names = $db->query($query);
$recipe_names = $recipe_names->fetch();
$recipe_name = $recipe_names[0];

// Display all recipe ingredients
$query = "SELECT ingredients.iid, ingredients.name from ingredients
	INNER JOIN recipes_ingredients ON ingredients.iid = recipes_ingredients.ingredients_id
	INNER JOIN recipes ON recipes_ingredients.recipes_id = recipes.rid
	WHERE recipes.rid = $recipe_id";
$ingredients = $db->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Learning PHP</title>
</head>
<html>
<h1><?php echo $recipe_name; ?></h1>
<form action="add-ingredient.php" method="post">
	<label>Add new ingredient</label>
	<input name="ingredient" type="text" size="10" />
	<input type="submit" name="submit" value="Add" />
	<input type="hidden" name="recipe_id" value="<?php echo $recipe_id ?>" />
</form>
<ul>
<?php foreach ($ingredients as $ingredient): ?>
	<li><?php echo $ingredient[1] ?> (<a href="delete-ingredient.php?recipe_id=<?php echo $recipe_id; ?>&amp;ingredient_id=<?php echo $ingredient[0]; ?>">delete</a>)</li>
<?php endforeach; ?>
</ul>
<p><a href="show-recipes.php">&lt; Show all recipes</a></p>
</html>