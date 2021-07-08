<?php include './common/session_db.php'; ?>
<html class="no-js" lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




<head>
    <?php include './common/head.php'; ?>
    <?php include '../Config/common_script.php'; ?>


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
            <a class="navbar-brand" style="color:#fff; font-size:14px;"></a>
        </nav>
        <div class="product-status mg-tb-15">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <DIV class="container-fluid">
                        <div class="sparkline-list">

                            <div class="col-12;" style="text-align:center;">

                                <div class="sparkline-list" style="margin-top: 15px;">
                                    <DIV class="container-fluid">
                                        <h3 class="service_title" style="text-align: center;">User List</h3>
                                        <?php
                                        $db->showInTable("user", "id,name,contact", array(), "all", $externallinks = "", array(), $sort);
                                        ?>
                                    </DIV>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>




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
        <!-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> -->
        <script>
            // CKEDITOR.replace('description');
        </script>
        <?php include './common/footer_script.php'; ?>
</body>

</html>