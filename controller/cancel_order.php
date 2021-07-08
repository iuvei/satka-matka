<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
include '../Config/ShipRocket.php';
$shiprocket = new ShipRocket();
$db = new DB($conn);
$return_array = array();
if (isset($_REQUEST["orderid"])) {
    $order_id = $_REQUEST["orderid"];
    $shipments = $db->select("shipment", "*", array("orders_id" => $order_id));
    if ($shipments->num_rows > 0) {
        $shipment = $shipments->fetch_assoc();
        $token = json_decode($shipment["create_token_json"]);
        $info = $shiprocket->cancelOrder($token->token, array($_REQUEST["order_id"]));
        if ($info[1] == "") {
        } else {
            $obj = $info[1];
            $jsondata = json_encode($obj);
            $info = $db->update(array("cancellation_json" => $jsondata), "shipment", $shipment["id"]);
            $return_array["status"] = false;
            $return_array["message"] = $obj->message;

            if ($obj->message == "Order cancelled successfully.") {
                $db->update(array("order_status" => "cancelled"), "orders", $order_id);
                $jsonobj = json_decode($shipment["create_order_json"]);
                $jsonobj->status = "CANCELED";
                $db->update(array("create_order_json" => json_encode($jsonobj)), "shipment", $order_id);
            } else {
                $db->update(array("order_status" => "Cancellation requested"), "orders", $order_id);
            }
        }
    } else {

        $return_array["status"] = false;
        $return_array["message"] = "order id not found";
    }
    // var_dump($return_array);
    $db->sendBack($_SERVER, "?" . http_build_query($return_array));
}
