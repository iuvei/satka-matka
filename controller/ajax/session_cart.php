<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$return_array = array();

if (isset($_POST["id"]) && isset($_POST["quantity"])) {
    $id = $_POST["id"];
    $quantity = $_POST["quantity"];
    if (!isset($_SESSION["cart"])) {
        $array = array();
        $array[$id] = $quantity;
        $_SESSION["cart"] = $array;

    } else {
        $array = $_SESSION["cart"];
        $array[$id] = $quantity;
        $_SESSION["cart"] = $array;
    }
}else if(isset($_POST["action"])  && isset($_POST["id"]) && $_POST["action"]=="remove" ){
    $array = $_SESSION["cart"];
    $id=$_POST["id"];
    unset($array["$id"]);
    $_SESSION["cart"]=$array;
}
if (isset($_SESSION["cart"])) {
    $array = $_SESSION["cart"];
    foreach ($array as $key => $value) {
        $product = $db->select("products", "*", array("id" => $key))->fetch_assoc();
        $product["quantity"]=$value;
        array_push($return_array, $product);
    }
    echo json_encode($return_array);

}
