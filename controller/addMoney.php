<?php 
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);

if($_REQUEST['api_key'] !== $_SESSION['api_key']){
    echo "Inalid api key";
    die;
}

$user_id = $_SESSION['loginid'];
$user_data = $db->select("user", "*", array("id"=>$user_id))->fetch_assoc();
$wallet = $user_data['wallet'];
$amount = $_REQUEST['amount'];
$final_amount = $wallet + $amount;
$update_wallet = $db->update(array("wallet"=>$final_amount),"user",$user_id);

if($update_wallet[0] == 1){
    
    $wallet_transaction_insert_data = array("amount"=>$amount, "txn_type"=>"credit","description"=>"Rs $amount added in your wallet","user_id"=>$user_id,"created_at"=>date("Y-m-d H:i:s"));
    $insert_wallet_transaction = $db->insert($wallet_transaction_insert_data, "wallet_transactions");
    if($insert_wallet_transaction[0] == 1){
        ?>
        <script>
            alert("Rs <?php echo $amount; ?> Added succsessfully in your wallet");
        </script>
        <?php
        $db->sendBack($_SERVER);
    }else{
        ?>
        <script>
            alert("Some Problem Accur");
        </script>
        <?php
        $db->sendBack($_SERVER);
    }
}
?>