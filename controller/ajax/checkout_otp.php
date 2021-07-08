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
if (isset($_POST["email"]) && isset($_POST["contact"])) {
    $userid = $_POST["email"];
    $contact = $_POST["contact"];
    // $sql = "select * from user where email='"  . $userid . "' or contact='" . $contact . "'";

    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //         $fuser = $result->fetch_assoc();
        $otp = rand(1000, 9999);
    
        // $db->dd($fuser);
        // if (isset($fuser["email"]) && $fuser["email"] != "" && $fuser["email"] != null) {
        //     $mailinfo = $mail->sendMail($fuser['email'], "Email Verification", "Dear Customer <br> Your OTP is " . $otp . " to verify your email.  Do not share it with anyone! <br> Warm Regards <br> Sofrich Skincare");
        //     $_SESSION["otp"] = $otp;
        //     $return_array["status"] = 1;
        //     $return_array["mailinfo"] = $mailinfo;
        //     $return_array["success"] = "Email matched";
        //     $return_array["userid"] = $fuser["id"];
        // } else
         if (strlen($contact) == 10) {
            $status = $sms->sendSms("Contact verification Dear Customer, Your OTP is " . $otp . " to verify your mobile.  Do not share it with anyone! Warm Regards, Sofrich Skincare AUZTUS LABORATORIES PRIVATE LIMITED", "" . $contact . "");
            $_SESSION["otp"] = $otp;
            $return_array["status"] = 1;
            $return_array["success"] = "Contact matched";
            $return_array["smsstatus"] = $status;
            $return_array["userid"] = $fuser["id"];
        } else {
            $return_array["status"] = 0;
            $return_array["error"] = "no email or contact found";
        }
    // } else {
    //     $return_array["status"] = 0;
    //     $return_array["error"] = "Not found";
    // }
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
