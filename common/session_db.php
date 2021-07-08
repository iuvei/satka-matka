<?php 
session_start();
include_once 'Config/ConnectionObjectOriented.php';
include_once 'Config/DB.php';

$db = new DB($conn);

if($_SESSION['loginid']){
    $user = $db->select("user", "*", array("id"=>$_SESSION['loginid']))->fetch_assoc();
}
?>