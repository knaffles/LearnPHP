<?php include '../view/header.php'; ?>
<div id="content">
    <h2>Billing Address</h2>
    <p><?php echo $bill_line1; ?><br />
        <?php if ( strlen($bill_line2) > 0 ) : ?>
            <?php echo $bill_line2; ?><br />
        <?php endif; ?>
        <?php echo $bill_city; ?>, <?php echo $bill_state; ?>
        <?php echo $bill_zip; ?><br />
        <?php echo $bill_phone; ?>
    </p>
    <form action="../account" method="post">
        <input type="hidden" name="action" value="edit_billing" />
        <input type="submit" value="Edit Billing Address" />
    </form>
    <h2>Payment Information</h2>
    <form action="." method="post" id="payment_form">
        <input type="hidden" name="action" value="process" />
        <label for="card_type">Card Type:</label>
        <select name="card_type">
            <option value="1">MasterCard</option>
            <option value="2">Visa</option>
            <option value="3">Discover</option>
            <option value="4">American Express</option>
        </select>
        <br />
        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" />
        &nbsp;&nbsp;No dashes or spaces.
        <br />
        <label for="card_cvv">CVV:</label>
        <input type="text" name="card_cvv" />
        <br />
        <label for="card_expires">Expiration:</label>
        <input type="text" name="card_expires" />&nbsp;&nbsp;MM/YYYY
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Place Order" />&nbsp;&nbsp;
        Click only once.
    </form>
    <form action="../cart" method="post" >
        <input type="submit" value="Cancel Payment Entry" />
    </form>
</div>
<?php include '../view/footer.php'; ?>