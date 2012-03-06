<?php
require_once('../../util/main.php');
require_once('util/secure_conn.php');
require_once('util/valid_admin.php');

require_once('model/customer_db.php');
require_once('model/address_db.php');
require_once('model/order_db.php');
require_once('model/product_db.php');

if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} elseif ( isset($_GET['action']) ) {
    $action = $_GET['action'];
} else {
    $action = 'view_orders';
}

switch($action) {
    case 'view_orders':
        $new_orders = get_unfilled_orders();
        $old_orders = get_filled_orders();
        include 'orders.php';
        break;
    case 'view_order':
        $order_id = $_GET['order_id'];

        // Get order data
        $order = get_order($order_id);
        $order_date = date('M j, Y', strtotime($order['orderDate']));
        $order_items = get_order_items($order_id);

        // Get customer data
        $customer = get_customer($order['customerID']);
        $name = $customer['lastName'] . ', ' . $customer['firstName'];
        $email = $customer['emailAddress'];
        $card_number = $order['cardNumber'];
        $card_expires = $order['cardExpires'];
        $card_name = card_name($order['cardType']);

        $shipping_address = get_address($order['shipAddressID']);
        $ship_line1 = $shipping_address['line1'];
        $ship_line2 = $shipping_address['line2'];
        $ship_city = $shipping_address['city'];
        $ship_state = $shipping_address['state'];
        $ship_zip = $shipping_address['zipCode'];
        $ship_phone = $shipping_address['phone'];

        $billing_address = get_address($order['billingAddressID']);
        $bill_line1 = $billing_address['line1'];
        $bill_line2 = $billing_address['line2'];
        $bill_city = $billing_address['city'];
        $bill_state = $billing_address['state'];
        $bill_zip = $billing_address['zipCode'];
        $bill_phone = $billing_address['phone'];

        include 'order.php';
        break;
    case 'set_ship_date':
        $order_id = intval($_POST['order_id']);
        set_ship_date($order_id);
        $url = '?action=view_order&order_id=' . $order_id;
        redirect($url);
    case 'confirm_delete':
        // Get order data
        $order_id = intval($_POST['order_id']);
        $order = get_order($order_id);
        $order_date = date('M j, Y', strtotime($order['orderDate']));

        // Get customer data
        $customer = get_customer($order['customerID']);
        $name = $customer['lastName'] . ', ' . $customer['firstName'];
        $email = $customer['emailAddress'];

        include 'confirm_delete.php';
        break;
    case 'delete':
        $order_id = intval($_POST['order_id']);
        delete_order($order_id);
        redirect('.');
        break;
    default:
        display_error("Unknown order action: " . $action);
        break;
}
?>