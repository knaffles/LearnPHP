<?php

namespace murach\cart {

    // Add an item to the cart
    function add_item(&$cart, $key, $quantity) {
        global $products;
        if ($quantity < 1) return;

        // If item already exists in cart, update quantity
        if (isset($cart[$key])) {
            $quantity += $cart[$key]['qty'];
            update_item($cart, $key, $quantity);
            return;
        }

        // Add item
        $cost = $products[$key]['cost'];
        $total = $cost * $quantity;
        $item = array(
            'name' => $products[$key]['name'],
            'cost' => $cost,
            'qty'  => $quantity,
            'total' => $total
        );
        $cart[$key] = $item;
    }

    // Update an item in the cart
    function update_item(&$cart, $key, $quantity) {
        global $products;
        $quantity = (int) $quantity;
        if (isset($cart[$key])) {
            if ($quantity <= 0) {
                unset($cart[$key]);
            } else {
                $cart[$key]['qty'] = $quantity;
                $total = $cart[$key]['cost'] *
                         $cart[$key]['qty'];
                $cart[$key]['total'] = $total;
            }
        }
    }

    // Get cart subtotal
    function get_subtotal($cart, $decimals = 2) {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['total'];
        }
        $subtotal = number_format($subtotal, $decimals);
        return $subtotal;
    }
}
?>