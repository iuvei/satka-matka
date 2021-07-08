<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';

$db = new DB($conn);
$tbname = isset($_POST["tbname"]) ? $_POST["tbname"] : "user";
//$db->showInTable("user");
// var_dump($_POST);die;
$info = $db->login($_POST["userid"], $_POST["password"], $tbname);
// var_dump($info);
if ($info["status_number"] == 1) {
    $_SESSION["conn"] = $conn;
    $array = isset($_SESSION["cart"]) ? $_SESSION["cart"] : array();
    if ($info["role"] == "admin") {
        $db->sendTo("../admin/index.php");
    }else if ($info["role"] == "user") {
        $db->sendTo("../user/index.php");
    }
} else {
    $db->sendBack($_SERVER, "?" . http_build_query($info));
}
