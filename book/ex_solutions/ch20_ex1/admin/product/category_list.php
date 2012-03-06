<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Product Manager - Category List</h1>
    <table id="category_table" >
        <tr>
            <th class="left" >Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form id="delete_product_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_category" />

        
        <input type="input" name="name" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="index.php?action=list_products">List Products</a></p>

</div>
<?php include '../../view/footer.php'; ?>