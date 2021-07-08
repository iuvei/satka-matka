<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
include '../../Config/ShipRocket.php';
$shiprocket = new ShipRocket();
$db = new DB($conn);
$return_array = array();
if (isset($_POST["order_id"])) {
    $order_id = $_POST["order_id"];
    $shipments = $db->select("shipment", "id", array("orders_id" => $order_id));
    if ($shipments->num_rows > 0) {
        $shipment = $shipments->fetch_assoc();
        $token = json_decode($shipment["create_token_json"]);
        $info = $shiprocket->cancelOrder($token->token, array($order_id));
        if ($info[1] == "") {
        } else {
            $obj = $info[1];
            $return_array["status"] = false;
            $return_array["message"] = $obj->message;
        }
    } else {

        $return_array["status"] = false;
        $return_array["message"] = "order id not found";
    }
    echo json_encode($return_array);
}
