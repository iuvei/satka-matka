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

/* Style the active class, and buttons on mouse-over */
.active, .btn:hover {
  
  color: black;
  
  background-color: #ddd;
  border-bottom: 3px solid red;

}
.mt-10{
margin-top:20px;
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
                           <h3 class="service_title" style="text-align: center;">Promotion</h3>
                                    <div class="col-12;" style="text-align:center;">
                             <h4>Bonus: <span><i class="fa fa-inr" aria-hidden="true"></i>0</span></h4>
                                        <div class="container">
 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn1 btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="text-align:center;">Apply to Balance</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#eee;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Apply to Balance</h4>
        </div>
        <div class="modal-body">
         <form action="#" Method="Post">
    <div class="form-group">
      <label for="bonus">Bonus:</label>
      <input type="text" class="form-control" id="bonus" placeholder="Bonus" name="bonus">
    </div>
    
    
    <button type="submit" class="btn3 btn-default">Apply All</button>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn2 btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn2 btn-default" data-dismiss="modal">Confirm</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
								</div>
								<div class="container mt-10" id="myDIV ">
									  <button class="btn active">Level1</button>
									  <button class="btn ">Level2</button>
									  
									</div>
								<div class="container mt-10">
                                 
							<form action="#" method="Post">
								<div class="form-group">
								 
								  <input type="text" class="form-control" id="pcode" style="width: 76%;" placeholder="My Promotion Code" name="promotioncode">
								</div>
								<div class="form-group">
								  
								  <input type="text" class="form-control" id="plink" style="width: 76%;" placeholder="My Promotion Link" name="promotionlink">
								</div>
								
								<button type="submit" class="btn3 btn-default" style="margin-left:30%">Submit</button>
							  </form>						
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