<?php include './common/session_db.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<head>

    <?php include './common/head.php'; ?>
    <?php include '../Config/common_script.php'; ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
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
        <div class="section-admin container-fluid" style="margin-top: 80px;">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        
                       
                        <a class="col-lg-3 col-md-3 col-sm-3 col-xs-12" href="list_employees.php">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Employees</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-blue"> <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin">
                                            <?php
                                            echo $db->select("user", "count(id) as total", array("role" => "user"))->fetch_assoc()["total"];
                                            ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 100%;" class="progress-bar bg-blue"></div>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                </div>
                
        </div>
        
            </div>
        

    </div>
    
    <?php include './common/footer_script.php'; ?>
</body>

</html>