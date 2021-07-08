<?php
session_start();
$return_array = array();
if (isset($_POST["value"])) {
    $value = $_POST["value"];
    $checkoutdata = $_SESSION["checkoutdata"];
    $total = $checkoutdata["subtotal_without_online_payment"];
    $cod_charge_val = 50;
    $online_payment_percent = 5;
    $subtotal = 0;
    $shipping_Val = 50;

    if ($value == 'cod') {
        if ($total <= 399) {
            $total += $shipping_Val;
            $checkoutdata["shipping_charge"] = $shipping_Val;
        } else
            $checkoutdata["shipping_charge"] = 0;

        $total = round($total, 2);
        $total = round($total + $cod_charge_val);
        $checkoutdata["online_payment_discount"] = 0;
    } else if ($value == 'online') {
        $percentv = $total * $online_payment_percent / 100;
        $total = $total - $percentv;
        $checkoutdata["online_payment_discount"] = $percentv;
        if ($total <= 399) {
            $total += 50;
            $checkoutdata["shipping_charge"] = $shipping_Val;
        } else
            $checkoutdata["shipping_charge"] = 0;
    }
    $checkoutdata["total"] = $total;
    $_SESSION["checkoutdata"] = $checkoutdata;
    echo json_encode($checkoutdata);
}
