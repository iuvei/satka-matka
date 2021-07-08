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

tr:nth-child(even) {
  background-color: #dddddd;
}

.btn {
  border: none;
  outline: none;
  padding: 10px 156px;
 
  cursor: pointer;
  font-size: 18px;
}
.btn1 {
 background-color:green;
  margin-right: 224px;
  border: none;
  outline: none;
  padding: 10px 46px;
 color: white;
  cursor: pointer;
  font-size: 18px;
}
.btn2 {
  background-color:green;
  border: none;
  outline: none;
  padding: 10px 46px;
 color: white;
  cursor: pointer;
  font-size: 18px;
}
.btn3 {
 background-color:green;
 
  border: none;
  outline: none;
  padding: 10px 46px;
  color: white;
  cursor: pointer;
  font-size: 18px;
}

.btn4 {
 background-color:#eee;
  float:left;
  border: none;
  outline: none;
  padding: 10px 18px;
  color: #000;
  cursor: pointer;
  font-size: 13px;
  margin:5px;
}

/* Style the active class, and buttons on mouse-over */

.mt-10{
margin-top:20px;
}
.nav1{
width:100%;
background-color:#fb8c00 !important;
color:white;
height:60px;
}
#add
{
font-size: 18px;
    color: red;
    font-weight: bold;
    margin-bottom: 0px;
    padding-bottom: 0px;
   margin-right: 260px;
}
a {
    color: #43a047;
}

<!----accordion------------------>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #eee;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
<!------End accordion-------------->


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
  <a class="navbar-brand" style="color:#fff; font-size:14px;">!! Please assure the bank details are correct otherwise company will not be responsible for any missing withdraw.</a>
</nav>
               <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                           <h3 class="service_title" style="text-align: center;">Withdrawal</h3>
                                    <div class="col-12;" style="text-align:center;">
                                 <div class="container mt-10">
									<span id="add">Any problem? Contact <a href=""> lulaowai121@gmail.com</a></span>
									</div><br>
                             <h4 style="font-weight:300px">Balance:&nbsp; <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;0.00</span></h4>
                                        <div class="container mt-10">
 
 <form action="#" method="Post">
								<div class="form-group">
								 
								  <input type="text"  class="form-control" id="pcode" style="width: 76%;"  placeholder="&#65284; Enter withdrawal amount" name="amount">
								</div>
								
							
						

							  </form>
  
</div>
								</div>
								<div class="container mt-10" id="myDIV ">
								<span>Fee:0, to account 0</span><br><br>
                                 <span> Payment</span><br><br>
									<form action="#" method="Post">
									
									<div data-name="check">
									  <input type="checkbox" value="《Use Bank to withdraw》EK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <label for="vehicle1"> 《Use Bank to withdraw》EK</label><br>
									  <input type="checkbox" value="《Use Bank to withdraw》TAJ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <label for="vehicle1"> 《Use Bank to withdraw》TAJ</label><br>
									  </div>
									  
									  <div class="row" style="display: flex;">
									  <div class="col-2">
									  <label for="bankcard"><i style="font-size:24px" class="fa">&#xf09d;</i></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  </div>
									  <div class="col-10" style="width:50%">
									  <p class="accordion">Select Bank Card</p>
										<div class="panel">
										  <p><a href="http://localhost/RXCE/admin/employee/editBankCard.php">Add Bank Card</a></p>
										</div>
									 </div>
									 </div>
									 
									 
									 <div class="row" style="display: flex;">
									   <div class="col-2">
									  <label for=""><i class="fa fa-key fa-2x"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  </div>
									  <div class="col-10" style="width:100%">
		 <input type="text" class="form-control" id="pcode" style="width: 40%;"  placeholder=" Enter your login password" name="loginpassword"></span>
									 </div>
									  </div>
									  <button type="submit" class="btn3 btn-default" style="margin-left:30%">Withdrawal</button>
									</form>
 
									</div>
								
							




					</div>
				</div>
			</div>
		</div>

	</div>
	
	
	<script>
var acc = document.getElementsByClassName("accordion");

var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
	
	<script>
	var last;
document.addEventListener('input',(e)=>{
var closest=e.target.closest("*[data-name='check']");
if(e.target.closest("*[data-name]")){
if(last)
last.checked=false;
}
if(e.target!==last)
last=e.target;
else
last=undefined;
})
	</script>
	

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
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