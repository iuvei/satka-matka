<?php include './common/session_db.php'; ?>
<html class="no-js" lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 




    <head>
        <?php include './common/head.php'; ?>
        <?php include '../Config/common_script.php'; ?>
<style>
#p1{
	float:right;
	font-size:15px;
	margin-right:40px;
}
#p2{
 color:#fff;
 font-size:25px;
}

.btn3 {
 background-color:#2196f3 !important;
 
  border: none;
  outline: none;
  padding: 8px 13px;
  color: white;
  cursor: pointer;
  font-size: 14px;
  border-radius: 5px;
}
.btn4 {
 background-color:#eee;
 margin-left:5px;
  border: none;
  outline: none;
  padding: 8px 13px;
  color: #000;
  cursor: pointer;
  font-size: 14px;
  border-radius: 5px;
}
.nav1{
width:100%;
background-color:#2196f3 !important;
color:white;
height:60px;
}
.nav2{
width:100%;
background-color:#43a047 !important;
color:white;
text-align:left;
height:140px;
margin-top:-15px;
}
h4{
	margin-left:20px;
	margin-top:40px;
}
button{
	margin-top:10px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  color:#000;
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
  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
  margin:50px;
   margin-top:-5px;
}
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}
.btn-group button:hover {
  background-color: #3e8e41;
}
.tim{
	
   background-color: #eee !important;
    
  color:#fff;
  font-size:20px;
  text-align:center;
}

#it{
	background-color: #651fff !important;
    border-color: #651fff !important;
}
#reds
 {
	background-color: #red !important;
    border-color: #ff1744 !important;
}

#green{
	  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
}

.btn-group1 button {

  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
  margin:50px;
   margin-top:-5px;
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
  color: white; /* White text */
  padding: 10px 48px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
  margin:5px;
   margin-top:-5px;
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
  color: white; /* White text */
  padding: 10px 48px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
  margin: 10px;
   margin-top:-5px;
   margin-left:0px;
   
   
}
.btn-group3:after {
  content: "";
  clear: both;
  display: table;
}
.btn-group3 button:hover {
  background-color: #3e8e41;
}
</style>

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
           <nav class="navbar navbar-light bg-light nav1">
  <a class="navbar-brand" style="color:#fff; font-size:14px;"> Important note: In order to facilitate each user's withdrawal, our withdrawal time is 10:30-24:00. No withdrawal service will be provided at other times. Everyone will inform each other and wish all users a happy life!</a>
</nav>
<nav class="navbar navbar-light bg-light nav2">
<h4><span>Available balance:</span>&nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp;0.00</h4>
 <button type="submit" class="btn3 btn-default" style="margin-left:0px;" ><a style="color: white;" href="recharge.php">Recharge</a></button>
 <button id="myBtn" class="btn4 btn-default" style="margin-left:0px;">Read Rule</button>
 <p id="p1"><a href="#"><span class="glyphicon glyphicon-refresh" id="p2"></span></a></p>
  
  
  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  
    <span class="close">&times;</span>
	<h4>Rule of Guess</h4>
    <p>3 minutes 1 issue, 2 minutes and 30 seconds to order, 30 seconds to show the lottery result. It opens all day. The total number of trade is 480 issues</p>
	<p>If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</p>
	<ol>
	<li><b>JOIN GREEN:</b> if the result shows 1,3,7,9, you will get (98*2) 196 If the result shows 5, you will get (98*1.5) 147</li>
	<li><b>JOIN RED:</b> if the result shows 2,4,6,8, you will get (98*2) 196; If the result shows 0, you will get (98*1.5) 147</li>
	<li><b>JOIN VIOLET:</b> if the result shows 0 or 5, you will get (98*4.5) 441</li>
	<li><b>SELECT NUMBER:</b> if the result is the same as the number you selected, you will get (98*9) 882</li>
	</ol>
  </div>

</div>

  <a class="navbar-brand" style="color:#fff; font-size:14px;"> </a>
</nav>
<div class="btn-group">
  <button>Parity</button>
  <button>Sapre</button>
  <button>Bcone</button>
  <button>Emerd</button>
</div>

<!--<button type="button" class="btn11 btn-default">Parity</button>
<button type="button" class="btn12 btn-default">Sapre</button>
<button type="button" class="btn13 btn-default">Bcone</button>
<button type="button" class="btn14 btn-default">Emerd</button>-->



               <div class="product-status mg-tb-15" style="margin-top:-20px;">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                           <h3 class="service_title" style="text-align: center;">Win Game</h3>
                                    <div class="col-12;" >
                                
								<div class="col-6;" >
								<div style="float:left"><i class="fas fa-trophy"></i> Period</div>
								<div style="float:left">20210614200</div>
								</div>
								<div class="col-6;" >
								<div style="float:right">Count Down </div><br>
								 <div class="tim" style="float:right"><span id="timer"></span></div>
								</div>
								
								</div>
								
								<div class="col-12" style="margin-top:50px;">
								<div class="btn-group1">
										  <button id="green">Join Green</button>
										  <button id="it">Join Violet</button>
										   <button style="background-color: #ff1744 !important;border-color: #ff1744 !important;">Join Red</button>
			
										</div>
								</div>
								
								<div class="col-12" style="margin-top:50px; ">
								<div class="btn-group2" >
										  <button>0</button>
										  <button>1</button>
										   <button>2</button>
										   <button>3</button>
										  <button>4</button>
										   <button>5</button>
			
										</div>
										
								</div>
								<div class="col-12" style="margin-top:30px;">
								
										<div class="btn-group3" style="margin-left: 120px">
										  <button>6</button>
										  <button>7</button>
										   <button>8</button>
										   <button>9</button>
										 
			
										</div>
								</div>
								
					
					</div>
				</div>
			</div>
		</div>

	</div>
	
<script>
document.getElementById('timer').innerHTML =
  003 + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  //if(m<0){alert('timer completed')}
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  console.log(m)
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (min < 10 && min >= 0) {min = "0" + min}; // add zero in front of numbers < 10
 // if (sec < 0) {sec = "59"};
  return sec;
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
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
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tbody tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <!-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> -->
        <script>
            // CKEDITOR.replace('description');
        </script>
        <?php include './common/footer_script.php'; ?>
    </body>

</html>