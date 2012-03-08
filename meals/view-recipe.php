<?php

/*	This page displays all the ingredients for a given recipe.
*	The recipe ID is grabbed from the URL */

require_once('database.php');

// Get the recipe ID
if (!isset($_GET['recipeID'])) {
	echo "Error: no recipe ID specified";
	exit();
} else {
	$recipeID = $_GET['recipeID'];	
}

// Display the recipe name
$query = "SELECT name FROM recipes WHERE id = $recipeID";
$recipe_names = $db->query($query);
$recipe_names = $recipe_names->fetch();
$recipe_name = $recipe_names[0];

// Display all recipe ingredients
$query = "SELECT ingredients.name from ingredients
	INNER JOIN recipeIngredients ON ingredients.id = recipeIngredients.ingredientsId
	INNER JOIN recipes ON recipeIngredients.recipesId = recipes.Id
	WHERE recipes.id = $recipeID";
$ingredients_names = $db->query($query);

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
	<input type="hidden" name="recipeID" value="<?php echo $recipeID ?>" />
</form>
<ul>
<?php foreach ($ingredients_names as $ingredient_name): ?>
	<li><?php echo $ingredient_name[0] ?></li>
<?php endforeach; ?>
</ul>
</html>