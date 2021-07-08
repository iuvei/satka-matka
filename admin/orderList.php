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
                           <h3 class="service_title" style="text-align: center;">Orders</h3>
                           <div class="admintab-area mg-tb-15">
                            <div class="container-fluid">
                           <div class="row">
                            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                            <div class="admintab-wrap mg-t-30">
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabProject"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span>ALL</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDetails"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span>UNDELIVER</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabPlan"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>UNRECEIVE</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabPlan"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>SUCCESS</a>
                                </li>
                            </ul>
                            <!--<div class="tab-content">
                                <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div id="TabDetails" class="tab-pane animated flipInX custon-tab-style1">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div id="TabPlan" class="tab-pane animated flipInX custon-tab-style1">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>
                                    <p>the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                  </div>
                  </div>
                  </div>
						<!--	<table>
  <tr>
    <th>All</th>
    <th>Undeliver</th>
    <th>Unreceive</th>
    <th>Success</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
	<td>Mexico</td>
	<td>Germany</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
	<td>Germany</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
	<td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
	<td>Germany</td>
  </tr>
</table>-->




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