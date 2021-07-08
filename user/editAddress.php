<?php include './common/session_db.php'; ?>
<html class="no-js" lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




    <head>
        <?php include './common/head.php'; ?>
        <?php include '../Config/common_script.php'; ?>

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  width:90%;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
            
               <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                           <h3 class="service_title" style="text-align: center;">Add Address</h3>
                                    <div class="col-12;" style="text-align:center;">
									
									
                                    <?php
                                    $url = "../controller/insert2.php";
                                     ?>

<div class="container">
  <form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
  
    <div class="row">
      <div class="col-25">
        <label for="fname">Full Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name"  placeholder="Your Full Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Mobile Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="mobile"  placeholder="Mobile Number..">
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
        <label for="lname">PinCode</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="pincode"  placeholder="PinCode..">
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
        <label for="lname">State</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="state" value="<?php echo isset($useradd["state"]) ? $useradd["state"] : ""; ?>" placeholder="State..">
      </div>
    </div>
	 <div class="row">
      <div class="col-25"> 
        <label for="lname">Town/City</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="city"  placeholder="Town/City..">
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="subject">Detail Address</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="address"  placeholder="Detail Address.." style="height:200px"></textarea>
      </div>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>">
                    <input type="hidden" name="api_key" value="<?php echo $user["api_key"]; ?>">
                    <input type="hidden" name="tbname" value="useraddress">
    
    <div class="row">
      <input type="submit" value="Continue">
    </div>
  </form>
</div>
                                 
								</div>
								
								
							




					</div>
				</div>
			</div>
		</div>

	</div>

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

function setAmount(amount){
	$("#pcode").val(amount);
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