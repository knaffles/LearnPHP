<div id="sidebar">
    <h2>Links</h2>
    <ul>
        <li>
            <a href="<?php echo $app_path . 'cart'; ?>">View Cart</a>
        </li>
            <?php
            // Check if user is logged in and
            // display appropriate account links
            $account_url = $app_path . 'account';
            $logout_url = $account_url . '?action=logout';
            if (isset($_SESSION['user'])) :
            ?>
                <li><a href="<?php echo $account_url; ?>">My Account</a></li>
                <li><a href="<?php echo $logout_url; ?>">Logout</a>
            <?php else: ?>
                <li><a href="<?php echo $account_url; ?>">Login/Register</a></li>
            <?php endif; ?>
        <li>
            <a href="<?php echo $app_path; ?>">
               <?php echo Home; ?>
            </a>
        </li>
        
        <h2>Categories</h2>
        <!-- display links for all categories -->
        <?php
            require_once('model/database.php');
            require_once('model/category_db.php');
            
            $categories = get_categories();
            foreach($categories as $category) :
                $name = $category['categoryName'];
                $id = $category['categoryID'];
                $url = $app_path . 'catalog?category_id=' . $id;
        ?>
        <li>
            <a href="<?php echo $url; ?>">
               <?php echo $name; ?>
            </a>
        </li>
        <?php endforeach; ?>
        <h2>Temp Link</h2>
        <li>
            <!-- These links are for testing only.
                 Remove them from a production application. -->
            <a href="<?php echo $app_path; ?>admin">Admin</a>
        </li>
        
    </ul>
</div>