<?php include './common/session_db.php'; ?>
<!doctype html>
<html class="no-js" lang="en">


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

            <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="sparkline-list">
                            <h3 class="service_title" style="text-align: center;">Add Incentive</h3>
                                <form action="../controller/insert2.php" class="p-5 bg-white" method="POST" enctype="multipart/form-data">
                                    <div class="row form-group">
                                        <div class="row form-group col-md-12">
                                            <div class="col-md-4">
                                                <label class="text-black" for="name">Criteria Type</label> 
                                                <input type="text" id="criteria_type" name="criteria_type" class="form-control" placeholder="Enter Criteria Type">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="text-black" for="min_criteria">Minimum Value</label> 
                                                <input type="number" id="min_criteria" name="min_criteria" class="form-control" placeholder="Enter Minimum Value">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="text-black" for="max_criteria">Maximum Value</label> 
                                                <input type="number" id="max_criteria" name="max_criteria" class="form-control" placeholder="Enter Maximum Value">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="text-black" for="incentive_type">Incentive Type</label> 
                                                <select class="form-control" name="incentive_type">
                                                        <option value="amount">Amount</option>
                                                        <option value="goods">Goods</option>
                                                        
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label class="text-black" for="incentive_value">Incentive Value</label> 
                                                <input type="text" id="incentive_value" name="incentive_value" class="form-control" placeholder="Enter Incentive Value">
                                            </div>
                                            <div class="col-md-8">
                                                <label class="text-black" for="contact">Description</label><br>
                                                <textarea class="form-control" name="description" id="description" rows="7" cols="50"></textarea>
                                            </div>
                                             

                                        <input type="hidden" name="api_key" value="<?php echo $user["api_key"]; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>">
                                        <input type="hidden" name="tbname" value="incentives">
                                        <div class="col-md-8">
                                            <input type="submit" value="Submit" style="float:right; margin-top: 10px;" class="btn btn-primary py-2 px-4 text-white">
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </DIV>
                        <div class="sparkline-list" style="margin-top: 15px;">
                            <DIV class="container-fluid">
                                <h3 class="service_title" style="text-align: center;"> Incentive List</h3>
                                <?php
                                $db->showInTable("incentives", "*", array(), "all", $externallinks = "", array(), $sort);
                                ?>
                            </DIV>
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