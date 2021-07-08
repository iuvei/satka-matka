<?php include './common/session_db.php'; ?>
<html class="no-js" lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <head>
        <?php include './common/head.php'; ?>
        <?php include '../Config/common_script.php'; ?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


.nav1{
width:100%;
background-color:#fb8c00 !important;
color:white;
height:160px;
}

<!--------------------Start modal2------------------------->
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modalss {
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
}



/* Modal Content */
.modalss-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 60%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: black;
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

/* The Close Button */
.close2 {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button */
.close3 {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close3:hover,
.close3:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button */
.close4 {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close4:hover,
.close4:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button */
.close5 {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close5:hover,
.close5:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button */
.close6 {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close6:hover,
.close6:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modalss-body {padding: 2px 16px;}

<!----------------------End modal2---------------------------->

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
  <a class="navbar-brand" style="color:#fff; font-size:14px;"><b>Gift activities:</b> Red envelope gifts are randomly distributed, and if the basic conditions are met , they can participate. The event is carried out thrice a day, and each round is given 30lac RS randomly.</a>
 
  <ul style="margin-left:15px; margin-top: 65px;">
  <li>Activity time:</li>
  <li>First round: 10:30-11:30</li>
  <li>Second round: 15:30-16:30</li>
  <li>The third round: 20:30-21:30</li>
  </ul>
</nav>
			
               <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                           <h3 class="service_title" style="text-align: center;">Gift Events</h3>

							<table>
  <tr>
    <th>Time</th>
    <th>Receive Limit</th>
    <th>Requirements</th>
  </tr>
  <?php 
  $id = '';
  $style = '';
  $id2 = '';
  $style2 = '';
  $id3 = '';
  $style3 = '';
  
  if(date('H:i:s') < "11:30:00"){
	  ?>
	  <tr id="myBtn1">
		<td>10:30:00 ~ 11:30:00</td>
		<td>1 times</td>
		<td>Recharge >= 100 and game join >= 1000</td>
	  </tr>
	  <?php
  }else{
	  ?>
	  <tr style="opacity:0.5">
		<td>10:30:00 ~ 11:30:00</td>
		<td>1 times</td>
		<td>Recharge >= 100 and game join >= 1000</td>
	  </tr>
	  <?php
  }
  
  if(date('H:i:s') < "16:30:00"){
	  ?>
	  <tr id="myBtn2">
		<td>15:30:00 ~ 16:30:00</td>
		<td>1 times</td>
		<td>Recharge >= 500 and game join >= 2000</td>
	  </tr>
	  <?php
  }else{
	  ?>
	  <tr style="opacity:0.5">
		<td>15:30:00 ~ 16:30:00</td>
		<td>1 times</td>
		<td>Recharge >= 500 and game join >= 2000</td>
	  </tr>
	  <?php
  }
  
  if(date('H:i:s') < "21:30:00"){
	  ?>
	  <tr id="myBtn3">
		<td>20:30:00 ~ 21:30:00</td>
		<td>1 times</td>
		<td>Recharge >= 1000 and game join >= 3000</td>
	  </tr>
	  <?php
  }else{
	  ?>
	  <tr style="opacity:0.5">
		<td>20:30:00 ~ 21:30:00</td>
		<td>1 times</td>
		<td>Recharge >= 1000 and game join >= 3000</td>
	  </tr>
	  <?php
  }

  ?>
  
  
 
  
</table>
<!-------------------- Open Modal1-------------->
<div id="myModal" class="modalss">

  <!-- Modal content -->
  <div class="modalss-content">
    <div class="">
      <span class="close">&times;</span>
      
    </div>
    <div class="modalss-body">
   
    <h3>Event Details</h3>
<p>This event started at 10:30:00 ~ 11:30:00, can receive 1 times.</p>
<p>Open gift can obtain random money to your wallet</p>
      <button id="second_btn">Open1 </button>
    </div>
    <div class="">
      
    </div>
  </div>

</div>

<!-- The Modal -->
<div id="myModel2" class="modalss">

  <!-- Modal content -->
  <div class="modalss-content">
    <div class="">
      <span class="close2">&times;</span>
      
    </div>
    <div class="modalss-body">
    <h3>Fail</h3>
<p>model1 Event has not started yet, please try again later</p>

     
    </div>
    <div class="">
     
    </div>
  </div>

</div>
<!---------------End Open Modal1---------------------->

 <!-------------------- Open Modal2-------------->
<div id="myModal3" class="modalss">

  <!-- Modal content -->
  <div class="modalss-content">
    <div class="">
      <span class="close3">&times;</span>
      
    </div>
    <div class="modalss-body">
   
    <h3>Event Details</h3>
<p>This event started at 15:30:00 ~ 16:30:00, can receive 1 times.</p>
<p>Open gift can obtain random money to your wallet</p>
      <button id="third_btn">Open 2</button>
    </div>
    
  </div>

</div>

<!-- The Modal -->
<div id="myModel4" class="modalss">

  <!-- Modal content -->
  <div class="modalss-content">
    <div class="">
      <span class="close4">&times;</span>
      
    </div>
    <div class="modalss-body">
    <h3>Fail</h3>
<p> Model2 Event has not started yet, please try again later</p>

     
    </div>
   
  </div>

</div>
<!---------------End Open Modal2---------------------->

<!-------------------- Open Modal3-------------->
<div id="myModal5" class="modalss">

  <!-- Modal content -->
  <div class="modalss-content">
    <div class="">
      <span class="close5">&times;</span>
      
    </div>
    <div class="modalss-body">
   
    <h3>Event Details</h3>
<p>This event started at 20:30:00 ~ 21:30:00, can receive 1 times.</p><br>
<p>Open gift can obtain random money to your wallet</p>
      <button id="fourth_btn">Open3 </button>
    </div>
    <div class="">
      
    </div>
  </div>

</div>

<!-- The Modal -->
<div id="myModel6" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="">
      <span class="close6">&times;</span>
      
    </div>
    <div class="modal-body">
    <h3>Fail</h3>
<p>model3 Event has not started yet, please try again later</p>

     
    </div>
    <div class="">
     
    </div>
  </div>

</div>
<!---------------End Open Modal3---------------------->



					</div>
				</div>
			</div>
		</div>

	</div>



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
<!----------------------------1----------------------------->
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");

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
// Get the modal
var modal2 = document.getElementById("myModel2");

// Get the button that opens the modal
var btn2 = document.getElementById("second_btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
  modal.style.display = "none";
  
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!-----------------------------End 1------------------------------------------->
<!-------------------------------2---------------------------------------->

<script>
// Get the modal
var modal3 = document.getElementById("myModal3");

// Get the button that opens the modal
var btn3 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close3")[0];

// When the user clicks the button, open the modal 
btn3.onclick = function() {
  modal3.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal3) {
    modal3.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var modal4 = document.getElementById("myModel4");

// Get the button that opens the modal
var btn4 = document.getElementById("third_btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close4")[0];

// When the user clicks the button, open the modal 
btn4.onclick = function() {
  modal4.style.display = "block";
  modal3.style.display = "none";
  
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<!-------------------------------End 2----------------------------------------->

<!-------------------------------3---------------------------------------->

<script>
// Get the modal
var modal5 = document.getElementById("myModal5");

// Get the button that opens the modal
var btn5 = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close5")[0];

// When the user clicks the button, open the modal 
btn5.onclick = function() {
  modal5.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal5.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal5) {
    modal5.style.display = "none";
  }
}
</script>

<script>
// Get the modal
var modal6 = document.getElementById("myModel6");

// Get the button that opens the modal
var btn6 = document.getElementById("fourth_btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close6")[0];

// When the user clicks the button, open the modal 
btn6.onclick = function() {
  modal6.style.display = "block";
  modal5.style.display = "none";
  
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal6.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == moda6) {
    modal6.style.display = "none";
  }
}
</script>

<!-------------------------------End 3----------------------------------------->
		
		
		
        <?php include './common/footer_script.php'; ?>
    </body>

</html>