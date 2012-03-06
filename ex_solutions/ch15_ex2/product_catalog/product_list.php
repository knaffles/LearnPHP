<?php include '../view/header.php'; ?>
<div id="main">
    <div id="sidebar">
        <h1>Categories</h1>
        <ul class="nav">
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="content">
        <h1><?php echo $current_category->getName(); ?></h1>
        <ul class="nav">
            <?php foreach ($products as $product) : ?>
            <li>
                <a href="?action=view_product&product_id=<?php
                          echo $product->getID(); ?>">
                    <?php echo $product->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php include '../view/footer.php'; ?>