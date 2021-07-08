<?php

session_start();
error_reporting(0);
include '../../../Config/ConnectionObjectOriented.php';
include '../../../Config/DB.php';
$db = new DB($conn);

if (isset($_REQUEST["period"])) {
    $period = $_REQUEST["period"];
    
    $game_types_id = $_REQUEST["game_types_id"];
    
    $query = "select id from periods where period = $period and game_types_id = $game_types_id";
    
    $result = $conn->query($query);
    $data = array();
    $row = $result->fetch_assoc();
    
    $string = json_encode($row, JSON_UNESCAPED_SLASHES);
    echo $string;
}