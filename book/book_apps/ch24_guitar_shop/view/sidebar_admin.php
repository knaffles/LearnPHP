<div id="sidebar">
    <h2>Links</h2>
    <ul>
        <li>
        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'admin/account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $logout_url; ?>">Logout</a>
        <?php else: ?>
        <a href="<?php echo $account_url; ?>">Login</a>
        <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>admin">Admin</a>
        </li>
    
        <!-- display links for all categories -->
        <?php if (isset($categories)) : ?>
        <h2>Categories</h2>
        <?php foreach ($categories as $category) : ?>
        <li>
            <a href="<?php echo $app_path .
                'admin/product?action=list_products' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
