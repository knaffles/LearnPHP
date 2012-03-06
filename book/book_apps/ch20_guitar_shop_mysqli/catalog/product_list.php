<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1><?php echo $current_category['categoryName']; ?></h1
    <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
        <?php foreach ($products as $product) : ?>
        <p>
            <a href="?action=view_product&amp;product_id=<?php
                      echo $product['productID']; ?>">
                <?php echo $product['productName']; ?>
            </a>
        </p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include '../view/footer.php'; ?>