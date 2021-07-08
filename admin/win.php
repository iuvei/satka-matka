<?php
include './common/session_db.php';
$notification = $db->select("notifications", "*", array(), "id desc")->fetch_assoc();
$period = $db->select("periods", "*", array("game_types_id"=>1),"id desc")->fetch_assoc();

$datetime1 = new DateTime($period['created_at']);
$datetime2 = new DateTime(date("Y-m-d H:i:s"));
$interval = $datetime1->diff($datetime2);
$minuts = $interval->format('%i');
$mins = 3 - $minuts;
$seconds = $interval->format('%s');
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
    .font-small{
        font-size: small;
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
    .p-10-5{
        padding: 10px 5px;
    }
    .bg-dark{
        background-color: #C9C9C9;
    }
    .text-blur{
        color: #ABABAB;
    }
    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
    }
    
    .point {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 2px;
    }
    
    .ajax-loader {
      display: none;
      background-color: rgba(255,255,255,0.7);
      position: absolute;
      z-index: +100 !important;
      width: 100%;
      height:100%;
    }
    
    .ajax-loader img {
      position: relative;
      top:50%;
      left:50%;
    }
    /*Style for mobile device*/
    @media (max-width: 767px){
        .container {
             width: 100%; 
             padding:0px;
             margin:0px;
        }
        .number-div{
            width: 100%;
            display: contents;
        }
        .numbers{
            width :60px;
        }
    }
  </style>
  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    var min = 0;
    var sec = 0;
    
   
    $(document).ajaxStart(function() {
      $("#ajax-loader").show();
      $("#st-tree-container").addClass("disabledbutton");
    });
    
    $(document).ajaxStop(function() {
      $("#ajax-loader").hide();
      $("#st-tree-container").removeClass("disabledbutton");
    });
    var add_minutes =  function (dt, minutes) {
        return new Date(dt.getTime() + minutes*60000);
    }
    
    
    function loadData(game_types_id){
        loadPeriod();
        selectAllData2(game_types_id,'desc');
        selectMyData2(game_types_id,<?php echo $user['id'] ?>);
        checkResult(<?php echo $user['id'] ?>);
        
    }
    
    function loadPeriod(){
        
          $.post("../controller/api1/common/loadPeriod.php",
            {
              
              loginid: '<?php echo $user["id"]; ?>',
              api_key: '<?php echo $user["api_key"]; ?>'
            },
            
            function (data, status) {
              var data = JSON.parse(data);
              
             $.each(data, function (index, item) {
            //   alert( item.period + ": " + item.created_at );
            
                if(data){
                     
                     $("#period").text(item.period);
                     $("#periods_id").val(item.id);
                     var created_at = item.created_at;
                     var period_date = add_minutes(new Date(created_at), 3);
                     
                     
                    var today = new Date();
                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    var dateNow = date+' '+time;
    
                    //  console.log('created_at : '+created_at);
                    //  console.log('period_date : '+period_date);
                    //  console.log('dateNow : '+dateNow);
                     let diffInMilliSeconds = Math.abs(new Date(dateNow) - period_date) / 1000;

                    // calculate days
                    const days = Math.floor(diffInMilliSeconds / 86400);
                    diffInMilliSeconds -= days * 86400;
                
                    // calculate hours
                    const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
                    diffInMilliSeconds -= hours * 3600;
                
                    // calculate minutes
                    const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
                    diffInMilliSeconds -= minutes * 60;
                    // calculate seconds
                    const seconds = Math.floor(diffInMilliSeconds ) % 60;
                    diffInMilliSeconds -= seconds;
                    
                    if(days == 0 && hours==0){
                        
                        var count_down = minutes+' : '+seconds;
                        // console.log('count_down : '+count_down);
                        // alert(count_down);
                        countdown('timer', minutes, seconds);
                    }
                     
                }
                 
             });
             
            });
         
    }
    
    function checkResult(user_id){
        
          $.post("../controller/api1/common/checkResult.php",
            {
              
              loginid: user_id,
              api_key: '<?php echo $user["api_key"]; ?>'
            },
            
            function (data, status) {
              var data = JSON.parse(data);
              
             $.each(data, function (index, item) {
              
                if(data){
                      $('#wallet').text(item.wallet);   
                }
                 
             });
             
            });
         
    }
    
    function selectAllData(game_types_id){
        if(game_types_id){
          $('#all-record').empty();
          
          $.post("../controller/api1/common/selectAllByColumn.php",
            {
              column : "game_types_id",
              colval : game_types_id,
              loginid: '<?php echo $user["id"]; ?>',
              api_key: '<?php echo $user["api_key"]; ?>',
              tbname: "periods",
            },
            
            function (data, status) {
              var data = JSON.parse(data);
              
             $.each(data, function (index, item) {
            //   alert( item.period + ": " + item.price );
                 var point = item.result;
                    if(item.result == "Red"){
                        var point = '<div class="point" style="background-color: rgb(255, 23, 68);"></div>';
                    }else if(item.result == "Green"){
                        point = '<div class="point" style="background-color: rgb(0, 230, 118);"></div>';
                    }else if(item.result == "Violet"){
                        point = '<div class="point" style="background-color: rgb(101, 31, 255);"></div>';
                    }else if(item.result == "Violet,Red"){
                        point = '<p><span class="point" style="background-color: rgb(101, 31, 255);"></span><span class="point" style="background-color: rgb(255, 23, 68);"></span></p>';
                    }
                 $('#all-record').append('<tr><td>'+item.period+'</td><td>'+item.price+'</td><td>'+item.number+'</td><td>'+point+'</td></tr>');
             });
             
            });
          }
    }
    
    function selectMyData(game_types_id,user_id){
        if(game_types_id && user_id){
            $('#my-record').empty();
          $.post("../controller/api1/common/selectMyData.php",
            {
              game_types_id : game_types_id,
              loginid: user_id,
              api_key: '<?php echo $user["api_key"]; ?>',
            },
            
            function (data, status) {
              var data = JSON.parse(data);
              
             $.each(data, function (index, item) {
            //   alert( item.period + ": " + item.price );
                if(data){
                    
                    if(!item.my_number){
                        item.my_number = item.my_color
                    }
                    
                    var point = item.result;
                    if(item.result == "Red"){
                        var point = '<div class="point" style="background-color: rgb(255, 23, 68);"></div>';
                    }else if(item.result == "Green"){
                        point = '<div class="point" style="background-color: rgb(0, 230, 118);"></div>';
                    }else if(item.result == "Violet"){
                        point = '<div class="point" style="background-color: rgb(101, 31, 255);"></div>';
                    }else if(item.result == "Violet,Red"){
                        point = '<p><span class="point" style="background-color: rgb(101, 31, 255);"></span><span class="point" style="background-color: rgb(255, 23, 68);"></span></p>';
                    }
                    
                    
                     $('#my-record').append('<tr><td>'+item.period+'</td><td>'+item.price+'</td><td>'+item.my_number+'</td><td>'+item.win_number+'</td><td>'+point+'</td></tr>');
                }
                 
             });
             
            });
          }
    }
  
    function selectRecord(game_type_id , game_type_name){
        loadData(game_type_id);
        $("#game_types_id").val(game_type_id);
      var game_type_div_id = "game-type"+game_type_id;
      applyClass(game_type_div_id);
      var game_type_text = $("#game-type-id").text();
      
      $(".game-type-text").text(game_type_name);
      
    }

    function applyClass(id){
      $(".game-type").removeClass("game-type-active");
      $("#"+id).addClass("game-type-active");
    }
    
    function bgDark(id){
        
      $(".contract").removeClass("bg-dark");
      $("#"+id).removeClass("text-blur");
      $("#"+id).addClass("bg-dark");
    }
    
    function setType(attribute){
        $("#attribute").val(attribute);
        
        if(typeof attribute == "string"){
            $("#joining_header").text("Join "+attribute);
        }else{
            $("#joining_header").text("Select "+attribute);
        }
        
    }
    
    function setContract(amount){
        
        $("#contract").val(amount);
        var sapn_id = "contract"+amount;
        bgDark(sapn_id);
        var contract_quantity = $("#contract-quantity").val();
        var final_amount = amount * contract_quantity;
        setContractMoney(final_amount);
    }
    function setContractMoney(amount){
        
        $("#contract-money").text(amount);
    }
    
    function addQuantity(quantity){
        
        var contract_quantity = $("#contract-quantity").val();
        
        final_contract_quantity = (+contract_quantity + (+quantity));
        if(final_contract_quantity < 1){
            alert("Quantity can't be less than 1");
            return;
        }
        $("#contract-quantity").val(final_contract_quantity);
        var contract = $("#contract").val();
        var contract_money = contract*final_contract_quantity;
        setContractMoney(contract_money);
    }
    
    function submitJoining(agreemrnt){
        var period_id = "";
        var attribute = $("#attribute").val();
        
            
        if(agreemrnt){
            var contract_money = $("#contract-money").text();
            var wallet = <?php echo $user['wallet'] ?>;
            var remaining_wallet = wallet - contract_money;
            
            if(wallet < contract_money){
                alert("Insufficient fund");
                return;
            }
            
            var game_types_id = $("#game_types_id").val();
            var period = $("#period").text();
            
            $.post("../controller/api1/common/update.php",
            {
              wallet: remaining_wallet,
              id: '<?php echo $user["id"]; ?>',
              loginid: '<?php echo $user["id"]; ?>',
              api_key: '<?php echo $user["api_key"]; ?>',
              tbname: "user",
            },
            
            function (data, status) {
              var data = JSON.parse(data);
              
              if(data.status == "success"){
                  
                  // This is for fetching periods_id
                    $.post("../controller/api1/common/selectPeriodId.php",
                    {
                      game_types_id: game_types_id,
                      period: period,
                      loginid: <?php echo $user["id"]; ?>,
                      api_key: '<?php echo $user["api_key"]; ?>'
                    },
                    
                    function (data, status) {
                      var data = JSON.parse(data);
                         period_id =  data.id;
                         
                         if(attribute.length > 1 && period_id){
                          
                            $.post("../controller/api1/common/insert2.php",
                            {
                              price: contract_money,
                              color: attribute,
                              periods_id: period_id,
                              game_types_id: game_types_id,
                              user_id: <?php echo $user["id"]; ?>,
                              loginid: <?php echo $user["id"]; ?>,
                              api_key: '<?php echo $user["api_key"]; ?>',
                              tbname: "joinings"
                            },
                            
                            function (data, status) {
                              var data = JSON.parse(data);
                              
                              if(data.status == "success"){
                                  alert("Joined Successfully");
                                  location.reload();
                              }
                            });
                        }else{
                            $.post("../controller/api1/common/insert2.php",
                            {
                              price: contract_money,
                              number: attribute,
                              periods_id: period_id,
                              game_types_id: game_types_id,
                              user_id: <?php echo $user["id"]; ?>,
                              loginid: <?php echo $user["id"]; ?>,
                              api_key: '<?php echo $user["api_key"]; ?>',
                              tbname: "joinings"
                            },
                            
                            function (data, status) {
                              var data = JSON.parse(data);
                              
                              if(data.status == "success"){
                                  alert("Joined Successfully");
                                  location.reload();
                              }
                            });
                        }
                             
                        });
                  
              }
            });
            
            
            
        }else{
            alert("First Agree Terms");
            window.location.href("#agreement");
        }
    }
  </script>
</head>

<body onload="loadData(1)">
  <div class="ajax-loader" id="ajax-loader">
      <img src="../images/ajax-loader.gif" class="img-responsive" />
    </div>
<div id="st-tree-container"> 
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
      <h4><span>Available balance:</span>&nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;<span id ="wallet"><?php echo $user['wallet']; ?></span></h4>
      <button type="submit" class="btn3 btn-default" style="margin-left:0px;"><a style="color: white;" href="recharge.php">Recharge</a></button>
      <button id="myBtn" class="btn4 btn-default" style="margin-left:0px;">Read Rule</button>
      <p id="p1"><a onclick="checkResult(<?php echo $user['id']; ?>)" style="cursor:pointer;"><span class="glyphicon glyphicon-refresh" id="p2"></span></a></p>


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
    <div class="row" >
      <div class="col-md-12 p-10 " style="display:flex;">
        <?php
        $game_types = $db->select("game_types");
        $total_game_types = $game_types->num_rows;
        $col_devide = 100 / $total_game_types;
        $i = 0;
        while ($game_type = $game_types->fetch_assoc()) {
            $period_id = $db->select("periods", "id", array("game_types_id"=>$game_type['id']), "id desc")->fetch_assoc()['id'];
          if($i == 0){
            $class="game-type-active";
          }else{
            $class = "";
          }
          $i++;
        ?>
          <div class="text-center game-type <?php echo $class; ?>" style="width:<?php echo $col_devide ?>%;" id="game-type<?php echo $game_type['id']; ?>">
            <span class="font-large" style="cursor:pointer;" onclick="selectRecord(<?php echo $game_type['id']; ?>,'<?php echo $game_type['name']; ?>')"><?php echo $game_type['name']; ?></span>
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
          <p class="fs-22"><?php echo date('Ymd') ?><span  id="period"><?php echo $period['period']; ?></span></p>
        </div>
        <div class="col-md-6 text-right" style="float: right;">
          <p>Count Down</p>
          <p class="fs-22" id="timer" style="letter-spacing: 10px;"></p>
        </div>
      </div>
    </div>
    <div class="container" id="joining-link">
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
                <button class="p-7" data-toggle="modal" data-target="#joining_modal" onclick="setType('<?php echo $game_color['name']; ?>')" style="background-color: <?php echo $color; ?>; color:white;box-shadow: 0px 0px 6px 0px #00000087;border-radius: 4px;padding: 7px 15px;">Join <?php echo ucwords($game_color['name']); ?></button>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-md-12 number-div">
            <div class="col-sm-2 numbers" >
                <a onclick="setType(0)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>0</span>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-2 numbers" >
                <a onclick="setType(1)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>1</span>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-2 numbers" >
                <a onclick="setType(2)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>2</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-2 numbers" >
                <a onclick="setType(3)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>3</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-2 numbers" >
                <a onclick="setType(4)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>4</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-2 numbers" >
                <a onclick="setType(5)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>5</span>
                    </div>
                </a>
            </div>
         </div>  
        </div>
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-sm-2 numbers" >
                <a onclick="setType(6)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>6</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-2 numbers" >
                <a onclick="setType(7)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>7</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-2 numbers" >
                <a onclick="setType(8)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>8</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-2 numbers" >
                <a onclick="setType(9)" data-toggle="modal" data-target="#joining_modal">
                    <div class="mt-10 p-7 text-center" style="background-color:#00B0FF;color:antiquewhite;border-radius:4px;cursor:pointer;">
                      <span>9</span>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
    <div class="container">
        <!--Joining Modal -->
      <div class="modal fade" id="joining_modal" role="dialog">
        <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
          <div class="modal-content" style="width: 90%;">
            <div class="modal-header bg-green" style="color:white;" id="joining-modal-header">
              <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
              <h4 class="modal-title" id="joining_header">Join Green</h4>
              <!--Hidden values-->
              <input type="hidden" name="attribute" value="green" id="attribute">
              <input type="hidden" value="10" id="contract" name="contract">
              <input type="hidden" value="1" id="game_types_id" name="game_types_id">
              <input type="hidden" value="<?php echo $period['id']; ?>" id="periods_id" name="periods_id">
            </div>
            <div class="modal-body">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4">
                          <p>Contract Money</p>
                          <div style="box-shadow: 0px 0px 6px 0px #00000087;width: fit-content;padding: 7px 0px;">
                              <span class="p-10-5 bg-dark contract" onclick="setContract(10)" id="contract10" style="cursor:pointer;">10</span>
                              <span class="p-10-5 text-blur contract" onclick="setContract(100)" id="contract100" style="cursor:pointer;">100</span>
                              <span class="p-10-5 text-blur contract" onclick="setContract(1000)" id="contract1000" style="cursor:pointer;">1000</span>
                              <span class="p-10-5 text-blur contract" onclick="setContract(10000)" id="contract10000" style="cursor:pointer;">10000</span>
                              
                          </div>
                      </div>
                  </div>
                  <div class="row mt-10">
                      <div class="col-md-8">
                          <p>Number</p>
                          <div class="mt-10">
                              <span ><i class="fa fa-plus" aria-hidden="true" style="width:30%;cursor: pointer;" onclick="addQuantity(+1)"></i></span>
                              <span><input type="text" id="contract-quantity" value="1" style="border: none;width: 10%;" onchange="setContractMoney(this.value*contract.value)"></span>
                              <span style="text-align: end;"><i class="fa fa-minus" aria-hidden="true" style="width:30%;cursor: pointer;" onclick="addQuantity(-1)"></i></span>
                          </div>
                          <p class="mt-10">Total Contract Money is <span id="contract-money">10</span></p>
                      </div>
                  </div>
                  <div class="row mt-10">
                      <div class="col-md-4">
                          <input type="checkbox" checked name="agreement" id="agreement" style="cursor:pointer;"><label for="agreement" style="cursor:pointer;">&nbsp;  I agree <a target="_blank" href="#">&nbsp; PRESALE RULE</a></label>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" onclick="submitJoining(agreement.value)">Confirm</button>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <?php 
    $colums = "period,price,number,result";
    ?>
    <div class="row sparkline-list mt-10 font-small">
      <div class="col-md-12 font-large text-center game-type-active mb-10">
        <p><i class="fas fa-trophy"></i></p>
        <span class="game-type-text">Parity</span> Record
      </div>
       <div class="col-md-12"> 
        <table class="table table-borderd font-small" id="employee_grid">
          <thead>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>Number</th>
              <th>Color</th>
            </tr>
          </thead>
          
          <tfoot>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>Number</th>
              <th>Color</th>
              
            </tr>
          </tfoot>
        
        </table>
       </div> 
    </div>

    <div class="row sparkline-list mt-10 font-small">
      <div class="col-md-12 font-large text-center game-type-active mb-10">
        <p><i class="fas fa-trophy"></i></p>
        <span>My <span class="game-type-text">Parity</span> Record</span>
      </div>
       <div class="col-md-12"> 
        <table class="mt-10 table table-borderd font-small" id="my-table">
          <thead>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>My Guess</th>
              <th>Win Number</th>
              <th>Win Color</th>
              
            </tr>
          </thead>
          
          <tfoot>
            <tr>
              <th>Period</th>
              <th>Price</th>
              <th>My Guess</th>
              <th>Win Number</th>
              <th>Win Color</th>
              
            </tr>
          </tfoot>
        
        </table>
       </div> 
    </div>
</div>
</div>   
    <script>
    
    function selectAllData2(game_types_id,sort){
        // console.log("selectAllData2");
        if(game_types_id){
          
          $('#employee_grid').DataTable({
             "bProcessing": true,
             "serverSide": true,
             "bDestroy": true,
             "ajax":{
                url :"response.php", // json datasource
                type: "post",  // type of method  ,GET/POST/DELETE
                "data": {
                    "colums" : '<?php echo $colums ?>',
                    "where" : 'where game_types_id = '+game_types_id+' and number is not null',
                    "tbname" : "periods",
                    "sort" : sort //send only asc or desc automatically take base id
                },
                error: function(){
                  $("#employee_grid_processing").css("display","none");
                }
              }
            }); 
          
          }
    }
     
    function selectMyData2(game_types_id,user_id){
        // console.log("selectMyData2");
        if(game_types_id && user_id){
          
          $('#my-table').DataTable({
             "bProcessing": true,
             "serverSide": true,
             "bDestroy": true,
             "ajax":{
                url :"response.php", // json datasource
                type: "post",  // type of method  ,GET/POST/DELETE
                "data": {
                    "colums" : 'periods.period,joinings.price,joinings.number as my_number,joinings.color as my_color,periods.number as win_number,periods.result',
                    "join" : " join periods on periods.id = joinings.periods_id ",
                    "where" : ' where joinings.user_id = '+user_id+' and joinings.game_types_id = '+game_types_id+' and periods.number is not null',
                    "tbname" : "joinings",
                    "sort" : 'desc' //send only asc or desc automatically take base as first column name
                },
                error: function(){
                  $("#employee_grid_processing").css("display","none");
                }
              }
            }); 
          
        }
    }
    
    function countdown(element, minutes, seconds) {
      
    // set time for the particular countdown
    var time = minutes*60 + seconds;
    var interval = setInterval(function() {
        var el = document.getElementById(element);
        // if the time is 0 then end the counter
        if(time <= 30){
            $("#joining-link").addClass("disabledbutton");
        }else{
            $("#joining-link").removeClass("disabledbutton");
        }
        if (time <= 0) {
            var game_types_id = $("#game_types_id").val();
            // countdown('timer', minutes, seconds);
            // loadData(game_types_id);
            var text = "Continue";
            el.innerHTML = text;
            setTimeout(function() {
                loadData(game_types_id);
            }, 0);
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