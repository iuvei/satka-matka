<?php
include './common/session_db.php';
$notification = $db->select("notifications", "*", array(), "id desc")->fetch_assoc();
?>
<html class="no-js" lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>





<head>
  <?php include './common/head.php'; ?>
  <?php include '../Config/common_script.php'; ?>
  <style>
    body {
      font-family: Roboto, sans-serif;
    }

    #p1 {
      float: right;
      font-size: 15px;
      margin-right: 40px;
    }

    #p2 {
      color: #fff;
      font-size: 25px;
    }

    .btn3 {
      background-color: #2196f3 !important;

      border: none;
      outline: none;
      padding: 8px 13px;
      color: white;
      cursor: pointer;
      font-size: 14px;
      border-radius: 5px;
    }

    .btn4 {
      background-color: #eee;
      margin-left: 5px;
      border: none;
      outline: none;
      padding: 8px 13px;
      color: #000;
      cursor: pointer;
      font-size: 14px;
      border-radius: 5px;
    }

    .nav1 {
      width: 100%;
      background-color: #2196f3 !important;
      color: white;
      height: 60px;
    }

    .nav2 {
      width: 100%;
      background-color: #43a047 !important;
      color: white;
      text-align: left;
      height: 140px;
      margin-top: -15px;
    }

    h4 {
      margin-left: 20px;
      margin-top: 40px;
    }

    button {
      margin-top: 10px;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
      color: #000;
    }

    /* Modal Content */
    .modal-content {
      background-color: #eee;
      margin: auto;
      padding: 20px;
      border: 1px solid #000;
      width: 60%;
      color: #000;
    }

    /* The Close Button */
    .close {
      color: #000;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .btn-group button {
      background-color: #04AA6D;
      /* Green background */
      border: 1px solid green;
      /* Green border */
      color: white;
      /* White text */
      padding: 10px 24px;
      /* Some padding */
      cursor: pointer;
      /* Pointer/hand icon */
      float: left;
      /* Float the buttons side by side */
      margin: 50px;
      margin-top: -5px;
    }

    .btn-group:after {
      content: "";
      clear: both;
      display: table;
    }

    .btn-group button:hover {
      background-color: #3e8e41;
    }

    .tim {

      background-color: #eee !important;

      color: #fff;
      font-size: 20px;
      text-align: center;
    }

    #it {
      background-color: #651fff !important;
      border-color: #651fff !important;
    }

    #reds {
      background-color: red !important;
      border-color: #ff1744 !important;
    }

    #green {
      background-color: #04AA6D;
      /* Green background */
      border: 1px solid green;
      /* Green border */
    }

    .btn-group1 button {

      color: white;
      /* White text */
      padding: 10px 24px;
      /* Some padding */
      cursor: pointer;
      /* Pointer/hand icon */
      float: left;
      /* Float the buttons side by side */
      margin: 50px;
      margin-top: -5px;
    }

    .btn-group1:after {
      content: "";
      clear: both;
      display: table;
    }

    .btn-group1 button:hover {
      background-color: #3e8e41;
    }

    .btn-group2 button {
      background-color: #00b0ff !important;
      border-color: #00b0ff !important;
      color: white;
      /* White text */
      padding: 10px 48px;
      /* Some padding */
      cursor: pointer;
      /* Pointer/hand icon */
      float: left;
      /* Float the buttons side by side */
      margin: 5px;
      margin-top: -5px;
    }

    .btn-group2:after {
      content: "";
      clear: both;
      display: table;
    }

    .btn-group2 button:hover {
      background-color: #3e8e41;
    }

    .btn-group3 button {
      background-color: #00b0ff !important;
      border-color: #00b0ff !important;
      color: white;
      /* White text */
      padding: 10px 48px;
      /* Some padding */
      cursor: pointer;
      /* Pointer/hand icon */
      float: left;
      /* Float the buttons side by side */
      margin: 10px;
      margin-top: -5px;
      margin-left: 0px;


    }

    .btn-group3:after {
      content: "";
      clear: both;
      display: table;
    }

    .btn-group3 button:hover {
      background-color: #3e8e41;
    }

    .p-10 {
      padding: 10px;
    }

    .font-large {
      font-size: large;
    }

    .text-left {
      text-align: left;
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .fs-22 {
      font-size: 22px;
    }

    .p-7 {
      padding: 7px;
    }

    .fw-6 {
      font-weight: 600;
    }

    .mt-10 {
      margin-top: 10px;
    }

    .w-20 {
      width: 20%;
    }
    .mb-10{
      margin-bottom: 10px;
    }
    .game-type-active{
      border-bottom: 2px solid #43A047;
    }
  </style>
  <script>
    function selectRecord(game_type_id){
      var game_type_div_id = "game-type"+game_type_id;
      applyClass(game_type_div_id);
    }

    function applyClass(id){
      $(".game-type").removeClass("game-type-active");
      $("#"+id).addClass("game-type-active");
    }
  </script>
</head>

<body>
  <div class="left-sidebar-pro">
    <!-- nav_siderbar php -->
    <?php include './common/nav_sidebar.php'; ?>
    <!-- nav_siderbar End php -->
  </div>
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro">
            <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-advance-area">

      <!-- haeder_menu  start-->
      <?php include './common/header_menu.php'; ?>
      <!-- haeder_menu  end -->
      <!-- Mobile Menu start -->
      <div class="mobile-menu-area">
        <?php include './common/mobile_menu_area.php'; ?>
      </div>
      <!-- Mobile Menu end -->
    </div>
    <div class="sparkline-list">
    <nav class="navbar navbar-light bg-light nav1">
      <a class="navbar-brand" style="color:#fff; font-size:14px;"> <?php echo $notification['name']; ?></a>
    </nav>
    <nav class="navbar navbar-light bg-light nav2">
      <h4><span>Available balance:</span>&nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $user['wallet']; ?></h4>
      <button type="submit" class="btn3 btn-default" style="margin-left:0px;"><a style="color: white;" href="recharge.php">Recharge</a></button>
      <button id="myBtn" class="btn4 btn-default" style="margin-left:0px;">Read Rule</button>
      <p id="p1"><a href="#"><span class="glyphicon glyphicon-refresh" id="p2"></span></a></p>


      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content" style="line-height:2;">

          <span class="close">&times;</span>
          <h4>Rule of Guess</h4>
          <div class="col-md-12" style="margin-left: 10px;">

            <p>3 minutes 1 issue, 2 minutes and 30 seconds to order, 30 seconds to show the lottery result. It opens all day. The total number of trade is 480 issues</p>
            <p>If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</p>
          </div>

          <ol>
            <li><b>JOIN GREEN:</b> if the result shows 1,3,7,9, you will get (98*2) 196 <br>
              If the result shows 5, you will get (98*1.5) 147</li>
            <li><b>JOIN RED:</b> if the result shows 2,4,6,8, you will get (98*2) 196 <br>
              If the result shows 0, you will get (98*1.5) 147</li>
            <li><b>JOIN VIOLET:</b> if the result shows 0 or 5, you will get (98*4.5) 441</li>
            <li><b>SELECT NUMBER:</b> if the result is the same as the number you selected, you will get (98*9) 882</li>
          </ol>
        </div>

      </div>

      <a class="navbar-brand" style="color:#fff; font-size:14px;"> </a>
    </nav>
    </div>
    <div class="row sparkline-list" >
      <div class="col-md-12 p-10 " style="display:flex;">
        <?php
        $game_types = $db->select("game_types");
        $total_game_types = $game_types->num_rows;
        $col_devide = 100 / $total_game_types;
        $i = 0;
        while ($game_type = $game_types->fetch_assoc()) {
          if($i == 0){
            $class="game-type-active";
          }else{
            $class = "";
          }
          $i++;
        ?>
          <div class="text-center game-type <?php echo $class; ?>" style="width:<?php echo $col_devide ?>%;" id="game-type<?php echo $game_type['id']; ?>">
            <span class="font-large" style="cursor:pointer;" onclick="selectRecord(<?php echo $game_type['id']; ?>)"><?php echo $game_type['name']; ?></span>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 font-large mt-10">
        <div class="col-md-6 text-left" style="float:left">
          <p><i class="fas fa-trophy"></i> Period</p>
          <p class="fs-22">116546545</p>
        </div>
        <div class="col-md-6 text-right" style="float: right;">
          <p>Count Down</p>
          <p class="fs-22" id="timer" style="letter-spacing: 10px;"></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" style="display:flex;">
        <?php
        $game_colors = $db->select("game_colors");
        $total_game_colors = $game_colors->num_rows;
        $col_devide = 100 / $total_game_colors;
        while ($game_color = $game_colors->fetch_assoc()) {
          $color = $game_color['name'];
        ?>
          <div class="text-center fw-6" style="width:<?php echo $col_devide ?>%;">
            <button class="p-7" style="background-color: <?php echo $color; ?>; color:white;box-shadow: 0px 0px 6px 0px #00000087;border-radius: 4px;padding: 7px 15px;">Join <?php echo ucwords($game_color['name']); ?></button>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="row" style="display: flex;justify-content: center;">
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>0</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>1</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>2</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>3</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>4</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>5</span>
            </div>
        </div>
       
    </div>
    <div class="row" style="display: flex;justify-content: center;">
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>6</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>7</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>8</span>
            </div>
        </div>
        <div class="col-sm-2" >
            <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;">
              <span>9</span>
            </div>
        </div>
        
    </div>

    <div class="row sparkline-list mt-10">
      <div class="col-md-12 font-large text-center game-type-active mb-10">
        <p><i class="fas fa-trophy"></i></p>
        <span>Parity Record</span>
      </div>
      <!-- <div class="table-responsive"> -->
        <table class="table table-hover order-table">
          <thead>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>Number</th>
              <th>Color</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
          </tbody>
          <tfooot>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>Number</th>
              <th>Color</th>
              
            </tr>
          </tfooot>
        
        </table>
      <!-- </div> -->
    </div>

    <div class="row sparkline-list mt-10">
      <div class="col-md-12 font-large text-center game-type-active mb-10">
        <p><i class="fas fa-trophy"></i></p>
        <span>My Parity Record</span>
      </div>
      <!-- <div class="table-responsive"> -->
        <table class="table table-hover order-table mt-10">
          <thead>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>Number</th>
              <th>Color</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
            <tr>
              <td>123456</td>
              <td>5</td>
              <td>45254</td>
              <td>green</td>
            </tr>
          </tbody>
          <tfooot>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>Number</th>
              <th>Color</th>
              
            </tr>
          </tfooot>
        
        </table>
      <!-- </div> -->
    </div>
    <script>
      function countdown(element, minutes, seconds) {
    // set time for the particular countdown
    var time = minutes*60 + seconds;
    var interval = setInterval(function() {
        var el = document.getElementById(element);
        // if the time is 0 then end the counter
        if (time <= 0) {
            var text = "Continue";
            el.innerHTML = text;
            setTimeout(function() {
                countdown('timer', 1, 5);
            }, 2000);
            clearInterval(interval);
            return;
        }
        var minutes = Math.floor( time / 60 );
        if (minutes < 10) minutes = "0" + minutes;
        var seconds = time % 60;
        if (seconds < 10) seconds = "0" + seconds; 
        var text = minutes + ':' + seconds;
        el.innerHTML = text;
        time--;
    }, 1000);
}
countdown('timer', 1, 5);
    </script>

    <script>
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

    <script>
      $(document).ready(function() {
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
    
    <?php include './common/footer_script.php'; ?>
</body>

</html>