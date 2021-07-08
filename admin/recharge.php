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
.active, .btn:hover {
  
  color: black;
  
  background-color: #ddd;
  border-bottom: 3px solid red;

}
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
  <a class="navbar-brand" style="color:#fff; font-size:14px;">!! Note: If the recharge amount is deducted but the amount is not added to the account, please send a detailed screenshot of the payment and the game ID to the mailbox for processing.</a>
</nav>
               <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                           <h3 class="service_title" style="text-align: center;">Recharge</h3>
                                    <div class="col-12;" style="text-align:center;">
                                 <div class="container mt-10">
									<span id="add">Any problem? Contact <a href=""> lulaowai121@gmail.com</a></span>
									</div><br>
                             <h4 style="font-weight:300px">Balance:&nbsp; <span><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;0.00</span></h4>
                                        <div class="container mt-10">
 
              <form action="../controller/addMoney.php" method="Post">
                <div class="form-group">
                  
                  <input type="number" class="form-control" id="pcode" style="width: 76%;" placeholder="Select Amount" name="amount">
                  <input type="hidden" name="api_key" value="<?php echo $user['api_key']; ?>">
                </div>
                
                <button type="button" class="btn4 btn-default" onclick="setAmount(100)"><i class="fa fa-inr" aria-hidden="true"></i>100</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(600)"><i class="fa fa-inr" aria-hidden="true"></i>600</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(1000)"><i class="fa fa-inr" aria-hidden="true"></i>1000</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(3000)"><i class="fa fa-inr" aria-hidden="true"></i>3000</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(5000)"><i class="fa fa-inr" aria-hidden="true"></i>5000</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(10000)"><i class="fa fa-inr" aria-hidden="true"></i>10000</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(20000)"><i class="fa fa-inr" aria-hidden="true"></i>20000</button>
                <button type="button" class="btn4 btn-default" onclick="setAmount(50000)"><i class="fa fa-inr" aria-hidden="true"></i>50000</button>

              
  
        </div>
								</div>
								<div class="container mt-10" id="myDIV ">
                                 <span> Payment</span><br><br>
								
									<div data-name="check">
									  <input type="checkbox" id="vehicle1"  value="tajpay">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <label for="vehicle1"> TAJPAY</label><br>
									 <input type="checkbox" id="vehicle2"  value="ek">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <label for="vehicle2"> EK</label><br>
									  <input type="checkbox" id="vehicle3"  value="cashtejee">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <label for="vehicle3"> CASHTEJEE</label><br><br>
									  <button type="submit" class="btn3 btn-default" style="margin-left:30%">Recharge</button>
									  </div>
									
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

function setAmount(amount){
	$("#pcode").val(amount);
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