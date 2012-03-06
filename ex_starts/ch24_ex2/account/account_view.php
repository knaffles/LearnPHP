<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1 class="top">My Account</h1>
    <p><?php echo $customer_name . ' (' . $email . ')'; ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_account_edit" />
        <input type="submit" value="Edit Account" />
    </form>
    <h2>Shipping Address</h2>
    <p><?php echo $ship_line1; ?><br />
        <?php if ( strlen($ship_line2) > 0 ) : ?>
            <?php echo $ship_line2; ?><br />
        <?php endif; ?>
        <?php echo $ship_city; ?>, <?php echo $ship_state; ?>
        <?php echo $ship_zip; ?><br />
        <?php echo $ship_phone; ?>
    </p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_address_edit" />
        <input type="hidden" name="address_type" value="shipping" />
        <input type="submit" value="Edit Shipping Address" />
    </form>
    <h2>Billing Address</h2>
    <p><?php echo $bill_line1; ?><br />
        <?php if ( strlen($bill_line2) > 0 ) : ?>
            <?php echo $bill_line2; ?><br />
        <?php endif; ?>
        <?php echo $bill_city; ?>, <?php echo $bill_state; ?>
        <?php echo $bill_zip; ?><br />
        <?php echo $bill_phone; ?>
    </p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_address_edit" />
        <input type="hidden" name="address_type" value="billing" />
        <input type="submit" value="Edit Billing Address" />
    </form>
    <?php if (count($orders) > 0 ) : ?>
        <h2>Your Orders</h2>
        <ul>
            <?php foreach($orders as $order) :
                $order_id = $order['orderID'];
                $order_date = strtotime($order['orderDate']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path . 'account' .
                       '?action=view_order&order_id=' . $order_id;
                ?>
                <li>
                    Order # <a href="<?php echo $url; ?>">
                    <?php echo $order_id; ?></a> placed on
                    <?php echo $order_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<?php include '../view/footer.php'; ?>
