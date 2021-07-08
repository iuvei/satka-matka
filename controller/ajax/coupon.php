<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$return_array = array();
if (isset($_POST["couponcode"]) && isset($_POST["cost"]) && $_POST["action"] == "add") {
    $couponid = $_POST["couponcode"];
    $cost = $_POST["cost"];
    $coupons = $conn->query("select * from coupons where cid='$couponid' and min_cost<=$cost and max_cost>=$cost and status='on'");
    if ($coupons->num_rows > 0) {
        $coupon = $coupons->fetch_assoc();
        $_SESSION["coupon"] = $couponid;
        $return_array = $coupon;
    } else {
    }
    echo json_encode($return_array);
} else if (isset($_POST["couponcode"]) && isset($_POST["cost"]) && $_POST["action"] == "remove") {
    unset($_SESSION["coupon"]);
    echo json_encode($return_array);
} else if (isset($_POST["cost"]) && isset($_SESSION["coupon"])) {
    $cost = $_POST["cost"];
    $couponid = $_SESSION["coupon"];
    $coupons = $conn->query("select * from coupons where cid='$couponid' and min_cost<=$cost and max_cost>=$cost and status='on'");
    if ($coupons->num_rows > 0) {
        $coupon = $coupons->fetch_assoc();
        $return_array = $coupon;
    } else {
    }
    echo json_encode($return_array);
} else if (isset($_POST["action"]) && $_POST["action"] == "check") {
    if (isset($_SESSION["coupon"])) {
        $couponid = $_SESSION["coupon"];
        $coupons = $conn->query("select * from coupons where cid='$couponid' and status='on'");
        if ($coupons->num_rows > 0) {
            $coupon = $coupons->fetch_assoc();
            $return_array = $coupon;
        }
    }
    echo json_encode($return_array);
} else {
    $coupons = $conn->query("select * from coupons where status='on'");
    while ($coupon = $coupons->fetch_assoc()) {
        array_push($return_array, $coupon);
    }
    echo json_encode($return_array);
}
