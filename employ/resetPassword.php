<?php include './common/session_db.php'; ?>
<html class="no-js" lang="en">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href="../admin/employee/css/style.css" rel="stylesheet">



    <head>
        <?php include './common/head.php'; ?>
        <?php include '../Config/common_script.php'; ?>

<style>
.for{
	margin-top: 55px;
}

form {
   max-width: 950px;
   margin: auto;
}
.fieldContainer {
   display: flex;
   width: 100%;
   margin-bottom: 15px;
   background-color: #eee !important;
}

.fieldContainer1 {
   display: flex;
   width: 70%;
   margin-bottom: 15px;
   
}
.icon {
   font-size: 15px;
   padding: 10px;
   background: black;
   color: white;
   min-width: 50px;
   text-align: center;
}
.field {
   font-size: 15px;
   width: 100%;
   padding: 10px;
   outline: none;
}
.field:focus {
   border: 2px solid dodgerblue;
}
.btn {
   font-size: 15px;
   background-color: green;
   color: white;
   padding: 10px 20px;
   border: none;
   cursor: pointer;
   width: 20%;
   margin-left:350px;
   
   text-align: center;
   opacity: 0.9;
   
}

.btn1 {
   font-size: 15px;
   border: 2px solid black !important;
   color: black;
   padding: 10px 20px;
   border: none;
   cursor: pointer;
   width: 15%;
   margin-left:10px;
   
   text-align: center;
   opacity: 0.9;
   
}
.btn2 {
   font-size: 15px;
   background-color: #eee;
   color: black;
   padding: 10px 20px;
   border: none;
   cursor: pointer;
   width: 35%;
   margin-left:40px;
   float:left;
   text-align: center;
   opacity: 0.9;
   
}
.btn:hover {
   opacity: 1;
}
.topnav a.active {
  background-color: #04AA6D;
  color: white;
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
           <!-- <nav class="navbar navbar-light bg-light nav1">
  <a class="navbar-brand" style="color:#fff; font-size:14px;"></a>
</nav>-->

               <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                           <h3 class="service_title" style="text-align: center;">Reset Password</h3>
                                    <div class="col-12;" style="text-align:center;">
                                <div style="margin-top: 95px;">
								<form action="" method="POST">
									<div class="fieldContainer">
									<i class="fa fa-mobile icon"></i>
									<input class="field" type="text" placeholder="Mobile Number" name="usrnm" />
									</div>
									<div class="fieldContainer1">
									<i class="far fa-comment-alt icon"></i>

									<input class="field" type="text" placeholder="Verification Code" name="vcode"/>
									<button type="submit" class="btn1" href="" >OTP</button>
									</div>

									<div class="fieldContainer">
									<i class="fa fa-key icon"></i>
									<input class="field" type="password" placeholder="Password" name="pass"/>
									</div>
									

									<button type="submit" class="btn">Continue</button><br><br>

									
								</form>
								
								</div>
								</div>
							

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
        <?php include './common/footer_script.php'; ?>
    </body>

</html>