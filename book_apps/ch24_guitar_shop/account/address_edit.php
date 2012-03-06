<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1 class="top"><?php echo $heading; ?></h1>
    <form action="" method="post" id="edit_address_form">
        <input type="hidden" name="action" value="update_address" />
        <?php if ($billing) : ?>
            <input type="hidden" name="address_type" value="billing" />
        <?php else: ?>
            <input type="hidden" name="address_type" value="shipping" />
        <?php endif; ?>
        <label for="line1">Address:</label>
        <input type="text" name="line1" value="<?php echo $line1; ?>" />
        <br />
        <label for="line2">Line 2:</label>
        <input type="text" name="line2" value="<?php echo $line2; ?>" />
        <br />
        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $city; ?>" />
        <br />
        <label for="state">State:</label>
        <input type="text" name="state" value="<?php echo $state; ?>" />
        <br />
        <label for="zip">Zip Code:</label>
        <input type="text" name="zip" value="<?php echo $zip; ?>" />
        <br />
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" />
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="<?php echo $heading; ?>" />
        <br />
        <form action="" method="post">
            <label>&nbsp;</label>
            <input type="submit" value="Cancel" />
        </form>
    </form>
    
</div>
<?php include '../view/footer.php'; ?>
