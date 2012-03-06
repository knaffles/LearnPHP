<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Delete Account</h1>
    <p>Are you sure you want to delete the account for
       <?php echo $last_name . ', ' . $first_name .
                  ' (' . $email . ')'; ?>?</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="admin_id"
               value="<?php echo $admin_id; ?>" />
        <input type="submit" value="Delete Account" />
    </form>
    <form action="" method="post">
        <input type="submit" value="Cancel" />
    </form>
</div>
<?php include 'view/footer.php'; ?>