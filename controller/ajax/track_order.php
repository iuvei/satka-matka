<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
include '../../Config/ShipRocket.php';
$shiprocket = new ShipRocket();
$db = new DB($conn);
$return_array = array();
if (isset($_POST["order_id"]) && $_POST["track_by"] == "order_id") {
    $order_id = $_REQUEST["order_id"];
    $shipments = $db->select("shipment", "*", array("orders_id" => $order_id));
    if ($shipments->num_rows > 0) {
        $shipment = $shipments->fetch_assoc();
        $token = json_decode($shipment["create_token_json"]);
        $channel_id = isset($_REQUEST["channel_id"]) ? $_REQUEST["channel_id"] : "";
        $response = $shiprocket->trackOrderbyOrderId($order_id, $channel_id, $token->token);
        if ($response[1]->message == "Token has expired" || $response[1]->status_code == 401) {
            $token = $shiprocket->createToken($shiprocket_username, $shiprocket_password);
            $token = $token[1]->token;
            $response = $shiprocket->trackOrderbyOrderId($order_id, $channel_id, $token);
        }
        $return_array["status"] = "success";
        $return_array["info"] = $response;
    } else {
        $return_array["status"] = "Order id not matched";
    }
    echo json_encode($return_array);
}
if (isset($_POST["order_id"]) && $_POST["track_by"] == "awb") {
    $order_awb = $_POST["order_id"];
    $token = $shiprocket->createToken($shiprocket_username, $shiprocket_password);
    $token = $token[1]->token;
    $response = $shiprocket->trackOrderByAWB($token, $order_awb);
    if ($response[0] == 1) {
        $response = $response[1];
        if (isset($response->tracking_data->shipment_track[0])) {
            $status = $response->tracking_data->shipment_track[0]->current_status;
            $return_array["status"] = "success";
            $return_array["info"] = $status;
        } else {
            $return_array["status"] = "Token mismach";
            $return_array["info"] = $response;
        }
    } else {
        $return_array["status"] = "Token mismach";
        $return_array["info"] = $response;
    }
    echo json_encode($return_array);
}
