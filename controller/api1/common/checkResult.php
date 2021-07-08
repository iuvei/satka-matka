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
$user_id = $_REQUEST['loginid'];
$joinings = $db->select('joinings', '*', array("user_id"=>$user_id),"id desc");


while($joining = $joinings->fetch_assoc()){
    
    $periods_id = $joining['periods_id'];
    $wallet_transaction = $db->select("wallet_transactions", "id", array("user_id"=>$user_id,"operatoroc"=>"and", "periods_id"=>$periods_id));
    
    if($wallet_transaction->num_rows > 0){
        break;
        
    }else{
        $joinings = $db->select('joinings', '*', array("user_id"=>$user_id, "operatoroc"=>"and", "periods_id"=>$periods_id));
        
        // This loop for if the user join same period multiple time with diffrent number and color
        while($joining = $joinings->fetch_assoc()){
            $winning_amount = 0;
            if($joining['number'] !== null){
                
                $period = $db->select("periods", "*", array("id"=>$periods_id,"operatoroc"=>"and","number"=>$joining['number']));
                
                if($period->num_rows > 0){
                    
                    $profit = $db->select("game_rules","profit", array("numbers"=>"any"))->fetch_assoc()['profit'];
                    
                    $winning_amount = $joining['price'] * $profit;
                    
                }
            }elseif(!empty($joining['color'])){
                $joining_color = $joining['color'];
                $sql = "select * from periods where CONCAT(',', result, ',') like '%,$joining_color,%' and id = $periods_id";
                // echo $sql;
                $periods = mysqli_query($conn, $sql);
                if($periods->num_rows > 0){
                    $period = $periods->fetch_assoc();
                    $number = $period['number'];
                    $game_colors_id = $db->select("game_colors", "id", array("name"=>$joining['color']))->fetch_assoc()['id'];
                    
                    $sql = "select profit from game_rules where CONCAT(',', numbers, ',') like '%,$number,%' and game_colors_id = $game_colors_id";
                    $profit = mysqli_query($conn, $sql)->fetch_assoc()['profit'];
                    
                    $winning_amount = $joining['price'] * $profit;
                }
                
                
            }
            if($winning_amount > 0){
                $wallet = $db->select("user", "wallet", array("id"=>$user_id))->fetch_assoc()['wallet'];
                $final_wallet = $wallet + $winning_amount;
                
                $update_wallet = $db->update(array("wallet"=>$final_wallet), "user", $user_id);
                if($update_wallet[0] == 1){
                    
                    $wallet_transaction_data = array("amount"=>$winning_amount, "txn_type"=>"credit", "description"=>"Rs $winning_amount Added in your account your current balance is $final_wallet", "created_at"=>date("Y-m-d H:i:s"), "user_id"=>$user_id, "periods_id"=>$periods_id);
                    $insert_wallet_transaction = $db->insert($wallet_transaction_data, "wallet_transactions");
                }
            }
        }
    }

    
    
}
$user = $db->select("user", "*", array("id"=>$user_id))->fetch_assoc();
$data[] = $user;

$string = json_encode($data, JSON_UNESCAPED_SLASHES);
echo $string;
