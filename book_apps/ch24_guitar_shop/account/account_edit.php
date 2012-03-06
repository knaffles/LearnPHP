<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1>Edit Account</h1>
    <form action="" method="post">
        <input type="hidden" name="action" value="update_account" />
        <label for="email">E-Mail:</label>
        <input type="text" name="email" value="<?php echo $email; ?>" />
        <br />
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>" />
        <br />
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $last_name; ?>" />
        <br />
        <label for="password_1">New Password:</label>
        <input type="password" name="password_1" />&nbsp;&nbsp;
        Optional
        <br />
        <label for="password_2">Retype Password:</label>
        <input type="password" name="password_2" />
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Update Account" />
    </form>
    <form action="" method="post" class="aligned">
        <label>&nbsp;</label>
        <input type="submit" value="Cancel" />
    </form>
</div>
<?php include '../view/footer.php'; ?>
