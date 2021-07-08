<?php

session_start();
include '../../../Config/ConnectionObjectOriented.php';
include '../../../Config/DB.php';
$db = new DB($conn);
$tbname = $_POST["tbname"];
if ($tbname == "user") {
   $location = "../img/user/";
}

unset($_POST["tbname"]);
$info = $db->insert($_POST, $tbname);
if (isset($_SESSION["recentinsertedid"])) {
   $recentinsertedid = $_SESSION["recentinsertedid"];
}
if ($info[0] == 1) {
   if (count($_FILES) > 0) {
      $return = $db->fileUploadWithTable($_FILES, $tbname, $recentinsertedid, $location, "50m", "JPG,PNG,JFIF,PDF,DOCX,mp4,jpg,png,jfif,pdf,docx");
      $return = array();
      $return["status"] = "success";
      $return["message"] = "Data and image saved";
      $return["recentinsertedid"] = $_SESSION["recentinsertedid"];
      echo json_encode($return);
   } else {
      $info = array();
      $info["status"] = "success";
      $info["message"] = "Data  saved";
      $info["recentinsertedid"] = $_SESSION["recentinsertedid"] or 0;
      echo json_encode($info);
   }
} else if ($info[0] == 0) {

   $info["status"] = "failed";
   $info["message"] = "Data not saved";
   echo json_encode($info);
}