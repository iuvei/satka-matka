<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
include '../../Config/SMS.php';
require '../../vendor/autoload.php';
include '../../Config/Mail.php';
$mail = new Mail();
$sms = new SMS();
$db = new DB($conn);
$return_array = array();
if (isset($_POST["id"]) && isset($_POST["password"]) && isset($_POST["tbname"]) && isset($_POST["otp"])) {
    $return = $db->update(array("password" => $_POST["password"]), $_POST["tbname"], $_POST["id"]);
    $return_array["status"] = 1;
    // $return_array["update"] = $return;
    echo json_encode($return_array);
    unset($_SESSION["otp"]);
} else if (isset($_POST["userid"])) {
    $userid = $_POST["userid"];
    $sql = "select * from user where email='" . $userid . "' or contact='" . $userid . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $otp = rand(1000, 9999);
        $fuser = $result->fetch_assoc();
        // if (isset($fuser["contact"]) && $fuser["contact"] != "" && $fuser["contact"] != null && strlen($fuser["contact"])==10) {
        //     $status = $sms->sendSms("Forgot password OTP", "Dear Customer, Your OTP is " . $otp." to reset your password.  Do not share it with anyone! Warm Regards, Sofrich Skincare", "" . $fuser["contact"] . "");
        //     $_SESSION["otp"] = $otp;
        //     $return_array["status"] = 1;
        //     $return_array["success"] = "Contact matched";
        //     // $return_array["smsstatus"] = $status;
        //     $return_array["userid"] = $fuser["id"];
        // } else 
        if (isset($fuser["email"]) && $fuser["email"] != "" && $fuser["email"] != null) {
            $mailinfo=$mail->sendMail($fuser['email'], "Forgot password OTP", "Dear Customer <br> Your OTP is " . $otp." to reset your password.  Do not share it with anyone! <br> Warm Regards <br> Sofrich Skincare");
            $_SESSION["otp"] = $otp;
            $return_array["status"] = 1;
            $return_array["mailinfo"] = $mailinfo;
            $return_array["success"] = "Email matched";
            $return_array["userid"] = $fuser["id"];
        } else {
            $return_array["status"] = 0;
            $return_array["error"] = "no email or contact found";
        }
    } else {
        $return_array["status"] = 0;
        $return_array["error"] = "Not found";
    }
    echo json_encode($return_array);
} else if (isset($_SESSION["otp"]) && $_POST["otp"]) {
    $otp = $_SESSION["otp"];
    $userotp = $_POST["otp"];
    if ($otp == $userotp) {

        $return_array["status"] = 1;
    } else {
        $return_array["status"] = 0;
    }
    echo json_encode($return_array);
} else {
    $return_array["status"] = 0;
    $return_array["error"] = "No email or contact found";
    echo json_encode($return_array);
}
