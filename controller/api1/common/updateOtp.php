<?php

session_start();
include '../../../Config/ConnectionObjectOriented.php';
include '../../../Config/DB.php';
$db = new DB($conn);
$tbname = $_REQUEST["tbname"];
$id = $_REQUEST["id"];
$data = array("otp" => $_REQUEST["otp"]);
$res = $db->update($data, $tbname, $id);
echo json_encode($res);
