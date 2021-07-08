<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$return_array = array();
if (isset($_POST["pincode"])) {
    $pin = $_POST["pincode"];

    if ($db->select("pincode","id",array("pin"=>$pin))->num_rows > 0) {
        $_SESSION["pincode"] = $pin;
        $return_array["status"] = true;
    } else {
        $_SESSION["pincode"] = $pin;
        $return_array["status"] = false;
    }
    echo json_encode($return_array);
} else if (isset($_SESSION["pincode"])) {
    $pin = $_SESSION["pincode"];
    if ($db->select("pincode","id",array("pin"=>$pin))->num_rows > 0) {
        $_SESSION["pincode"] = $pin;
        $return_array["status"] = true;
    } else {
        $return_array["status"] = false;
    }
    echo json_encode($return_array);
} else {
    $return_array["status"] = false;
    echo json_encode($return_array);
}
