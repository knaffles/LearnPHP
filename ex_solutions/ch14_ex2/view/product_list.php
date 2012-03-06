<?php include 'header.php'; ?>
<div id="main">
    <h2 class="top">Product List</h2>
    <?php if (count($products) == 0) : ?>
        <p>There are no products in the database.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Category</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product->getCategory()->getName(); ?></td>
                <td><?php echo $product->getName(); ?></td>
                <td><?php echo $product->getDescription(); ?></td>
                <td><?php echo $product->getFormattedPrice(); ?></td>
                <td><form id="delete_product_form"
                          action="index.php" method="post">
                    <input type="hidden" name="action"
                           value="delete_product" />
                    <input type="hidden" name="product_id"
                           value="<?php echo $product->getId(); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href="index.php?action=show_add_form">Add Product</a></p>
</div>
<?php include 'footer.php'; ?>