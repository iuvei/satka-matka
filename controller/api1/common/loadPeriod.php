<?php
session_start();
include '../../../Config/ConnectionObjectOriented.php';
include '../../../Config/DB.php';
$db = new DB($conn);
if (isset($_POST["api_key"]) && isset($_POST["loginid"])) {
    $user_api_key = $_POST["api_key"];
    $loginid = $_POST["loginid"];
    $users = $db->select("user", "*", array("id" => $loginid));
    $user = $users->fetch_assoc();
    $db_user_api_key = $user["api_key"];
    if ($db_user_api_key == $user_api_key) {
        
    } else {
        echo json_encode(array("error" => "Invalid API Key"));
        die();
    }
} else {
    echo json_encode(array("error" => "Invalid API Key Or Logged in user id"));
    die();
}

$query = "select * from periods order by id desc";
$result = $conn->query($query);
$data = array();
$i = 0;
$row = $result->fetch_assoc();
    $data[$i] = $row;
    $i++;

$string = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $string;
