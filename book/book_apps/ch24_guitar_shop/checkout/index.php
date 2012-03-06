<?php
require_once('../util/main.php');
require_once('../util/secure_conn.php');
require_once('../util/validation.php');

require_once('../model/cart.php');
require_once('../model/product_db.php');
require_once('../model/order_db.php');
require_once('../model/customer_db.php');
require_once('../model/address_db.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['checkout'] = true;
    redirect('../account');
    exit();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'confirm';
}

switch ($action) {
    case 'confirm':
        $cart = cart_get_items();
        if (cart_product_count() == 0) {
            redirect('../cart');
        }
        $subtotal = cart_subtotal();
        $item_count = cart_item_count();
        $item_shipping = 5;
        $shipping_cost = shipping_cost();
        $shipping_address = get_address($_SESSION['user']['shipAddressID']);
        $state = $shipping_address['state'];
        $tax = tax_amount($subtotal);    // function from order_db.php file
        $total = $subtotal + $tax + $shipping_cost;
        include 'checkout_confirm.php';
        break;
    case 'payment':
        if (cart_product_count() == 0) {
            redirect($app_path . 'cart');
        }
        $billing_address = get_address($_SESSION['user']['billingAddressID']);
        $bill_line1 = $billing_address['line1'];
        $bill_line2 = $billing_address['line2'];
        $bill_city = $billing_address['city'];
        $bill_state = $billing_address['state'];
        $bill_zip = $billing_address['zipCode'];
        $bill_phone = $billing_address['phone'];
        include 'checkout_payment.php';
        break;
    case 'process':
        if (cart_product_count() == 0) {
            redirect('Location: ' . $app_path . 'cart');
        }
        $cart = cart_get_items();
        $card_type = intval($_POST['card_type']);
        $card_number = $_POST['card_number'];
        $card_cvv = $_POST['card_cvv'];
        $card_expires = $_POST['card_expires'];

        // Validate card data
        // NOTE: This uses functions from the util/validation.php file
        if (!is_present($card_type)) {
            display_error('Card type is required.');
        } elseif (!is_valid_card_type($card_type)) {
            display_error('Card type ' . $card_type . ' is invalid.');
        }
        if (!is_present($card_number)) {
            display_error('Card number is required.');
        } elseif (!is_valid_card_number($card_number, $card_type)) {
            display_error('Card number ending in ' . substr($card_number, -4) .
                      ' is invalid.');
        }
        if (!is_present($card_cvv)) {
            display_error('Card CVV is required.');
        } elseif (!is_valid_card_cvv($card_cvv, $card_type)) {
            display_error('Card CVV is invalid.');
        }
        if (!is_present($card_expires)) {
            display_error('Card expiration date is required.');
        } elseif (!is_valid_card_expires($card_expires)) {
            display_error('Card expiration date is invalid.');
        }

        $order_id = add_order($card_type, $card_number,
                              $card_cvv, $card_expires);
        foreach($cart as $product_id => $item) {
            $item_price = $item['list_price'];
            $discount = $item['discount_amount'];
            $quantity = $item['quantity'];
            add_order_item($order_id, $product_id,
                           $item_price, $discount, $quantity);
        }
        clear_cart();
        redirect('../account?action=view_order&order_id=' . $order_id);
        break;
    default:
        display_error('Unknown cart action: ' . $action);
        break;
}
?>
