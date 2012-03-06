<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1 class="top">Register</h1>
    <form action="" method="post" id="register_form">

        <h2>Customer Information</h2>
        <input type="hidden" name="action" value="register" />

        <label>E-Mail:</label>
        <input type="text" name="email"
               value="<?php echo $_SESSION['form_data']['email']; ?>"
               size="30" />
        <br />

        <label>Password:</label>
        <input type="password" name="password_1" size="30" />
        <?php echo $password_message; ?>
        <br />

        <label for="password_2">Retype Password:</label>
        <input type="password" name="password_2" size="30" />
        <br />

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name"
               value="<?php echo $_SESSION['form_data']['first_name']; ?>" 
               size="30" />
        <br />

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name"
               value="<?php echo $_SESSION['form_data']['last_name']; ?>"
               size="30" />
        <br />

        <h2>Shipping Address</h2>
        <label for="ship_line1">Address:</label>
        <input type="text" name="ship_line1"
               value="<?php echo $_SESSION['form_data']['ship_line1']; ?>"
               size="30" />
        <br />

        <label for="ship_line2">Line 2:</label>
        <input type="text" name="ship_line2"
               value="<?php echo $_SESSION['form_data']['ship_line2']; ?>"
               size="30" />
        <br />

        <label for="ship_city">City:</label>
        <input type="text" name="ship_city"
               value="<?php echo $_SESSION['form_data']['ship_city']; ?>"
               size="30" />
        <br />

        <label for="ship_state">State:</label>
        <input type="text" name="ship_state"
               value="<?php echo $_SESSION['form_data']['ship_state']; ?>"
               size="30" />
        <br />

        <label for="ship_zip">Zip Code:</label>
        <input type="text" name="ship_zip"
               value="<?php echo $_SESSION['form_data']['ship_zip']; ?>"
               size="30" />
        <br />

        <label for="ship_phone">Phone:</label>
        <input type="text" name="ship_phone"
               value="<?php echo $_SESSION['form_data']['ship_phone']; ?>"
               size="30" />
        <br />

        <h2>Billing Address</h2>
        <label>&nbsp;</label>
        <input type="checkbox" name="use_shipping"
               <?php if ($_SESSION['form_data']['use_shipping']) : ?>
                   checked="checked"
               <?php endif; ?>
               size="30" />
        Use shipping address
        <br />

        <label for="bill_line1">Address:</label>
        <input type="text" name="bill_line1"
               value="<?php echo $_SESSION['form_data']['bill_line1']; ?>"
               size="30" />
        <br />

        <label for="bill_line2">Line 2:</label>
        <input type="text" name="bill_line2"
               value="<?php echo $_SESSION['form_data']['bill_line2']; ?>"
               size="30" />
        <br />

        <label for="bill_city">City:</label>
        <input type="text" name="bill_city"
               value="<?php echo $_SESSION['form_data']['bill_city']; ?>"
               size="30" />
        <br />

        <label for="bill_state">State:</label>
        <input type="text" name="bill_state"
               value="<?php echo $_SESSION['form_data']['bill_state']; ?>"
               size="30" />
        <br />

        <label for="bill_zip">Zip Code:</label>
        <input type="text" name="bill_zip"
               value="<?php echo $_SESSION['form_data']['bill_zip']; ?>"
               size="30" />
        <br />

        <label for="bill_phone">Phone:</label>
        <input type="text" name="bill_phone"
               value="<?php echo $_SESSION['form_data']['bill_phone']; ?>"
               size="30" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Register" />
    </form>
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<?php include '../view/footer.php'; ?>