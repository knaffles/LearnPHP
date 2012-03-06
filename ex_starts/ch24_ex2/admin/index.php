<?php 
    require_once('../util/main.php');
    require_once('../util/secure_conn.php');
    require_once('../util/valid_admin.php');
?>
<?php 
    include 'view/header.php';
    include 'view/sidebar_admin.php';
?>

<div id="content">
    <h1 class="top">Admin Menu</h1>
    <p><a href="product">Product Manager</a></p>
    <p><a href="category">Category Manager</a></p>
    <p><a href="orders">Order Manager</a></p>
    <p><a href="account">Account Manager</a></p>

</div>

<?php include 'view/footer.php'; ?>
