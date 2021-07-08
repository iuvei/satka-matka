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
if (isset($_REQUEST["game_types_id"])) {
    $game_types_id = $_REQUEST['game_types_id'];
    $user_id = $_REQUEST['loginid'];
    $query = "select joinings.price,periods.period,periods.number as win_number,joinings.number as my_number,joinings.color as my_color,periods.result from joinings join periods on periods.id = joinings.periods_id where joinings.user_id = $user_id and joinings.game_types_id = $game_types_id and periods.number is not null order by periods.period desc limit 15";
    
    $result = $conn->query($query);
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i] = $row;
        $i++;
    }
    $string = json_encode($data, JSON_UNESCAPED_SLASHES);
    echo $string;
}