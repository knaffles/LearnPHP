<?php include 'header.php'; ?>
<div id="main">
    <h2 class="top">Add Product</h2>
    <form id="add_product_form" action="index.php" method="post">
        <input type="hidden" name="action" value="add_product" />

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category->getId(); ?>">
                <?php echo $category->getName(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br />

        <label>Name:</label>
        <input type="input" name="name" />
        <br />

        <label>Description:</label>
        <input type="input" name="description" />
        <br />

        <label>List Price:</label>
        <input type="input" name="price" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br />
    </form>
    <p><a href="index.php?action=list_products">View Product List</a></p>

</div>
<?php include 'footer.php'; ?>