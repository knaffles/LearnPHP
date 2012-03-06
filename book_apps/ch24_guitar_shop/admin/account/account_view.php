<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<div id="content">
    <h1 class="top">Administrator Accounts</h1>
    <?php if (isset($_SESSION['admin'])) : ?>
    <h2>My Account</h2>
    <p><?php echo $name . ' (' . $email . ')'; ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_edit" />
        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
        <input type="submit" value="Edit" />
    </form>
    <?php endif; ?>
    <?php if ( count($admins) > 1 ) : ?>
        <h2>Other Administrators</h2>
        <table>
        <?php foreach($admins as $admin):
            if ( $admin['adminID'] != $admin_id ) :
                ?>
                <tr>
                    <td><?php echo $admin['lastName'] . ', ' .
                               $admin['firstName']; ?>
                    </td>
                    <td>
                        <form action="" method="post" class="inline">
                            <input type="hidden" name="action"
                                value="view_edit" />
                            <input type="hidden" name="admin_id"
                                value="<?php echo $admin['adminID']; ?>" />
                            <input type="submit" value="Edit" />
                        </form>
                        <form action="" method="post" class="inline">
                            <input type="hidden" name="action"
                                value="view_delete_confirm" />
                            <input type="hidden" name="admin_id"
                                value="<?php echo $admin['adminID']; ?>" />
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <h2>Add an Administrator</h2>
    <form action="" method="post" id="add_admin_user_form">
        <input type="hidden" name="action" value="create" />
        <label for="email">E-Mail:</label>
        <input type="text" name="email"
               value="<?php echo $_SESSION['form_data']['email']; ?>" />
        <br />
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name"
               value="<?php echo $_SESSION['form_data']['first_name']; ?>" />
        <br />
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name"
               value="<?php echo $_SESSION['form_data']['last_name']; ?>" />
        <br />
        <label for="password_1">Password:</label>
        <input type="password" name="password_1" />
        <?php echo $password_message; ?>
        <br />
        <label for="password_2">Retype password:</label>
        <input type="password" name="password_2" />
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add Admin User" />
    </form>
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<?php include 'view/footer.php'; ?>