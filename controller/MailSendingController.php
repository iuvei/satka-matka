<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
require '../vendor/autoload.php';
include '../Config/Mail.php';
$mail = new Mail();
$db = new DB($conn);
$mail = new Mail();
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["contact"]) && isset($_POST["message"])) {
    $to = "support@sofrich.com";
    $email = $_POST["email"];
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $message = $_POST["message"];
    $body = "$name<br>$contact<br>$email<br>$message";

    $subject = "Contact Us Form";
    $info = $mail->sendMail($to, $subject, $body);
  
    if ($info == "1") {
        $db->sendBack($_SERVER,"?info=Mail sent");
    } else {
        echo $info;
    }
} else {
    echo "<h2 style='color:#460008; text-align:center; box-shadow: inset 1px 1px 20px #6C000D;'>Please fill all mendatory fields</h2>";
}
