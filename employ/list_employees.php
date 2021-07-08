<?php include './common/session_db.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <?php include './common/head.php'; ?>
        <?php include '../Config/common_script.php'; ?>
        <link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
             
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
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
            <div class="product-status mg-tb-15">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <DIV class="container-fluid">
                            <div class="">
                                <h1>Data Table</h1>
                                <div class="">
                                <table id="employee_grid" class="display" width="100%" cellspacing="0">
                                <?php 
                                $colums = "id,name,contact";
                                $headers = explode(",", $colums);
                                

                                 ?>
                                <thead>
                                    <tr>
                                        <?php 
                                        for($i=0; $i<count($headers); $i++){
                                            ?>
                                            <th><?php echo ucwords($headers[$i]) ?></th>

                                            <?php
                                        }

                                        ?>
                                    </tr>
                                </thead>
                               
                            </table>
                            </div>
                              </div>
                            <?php
                            // $db->showInTable("user", "id,name,userid,email,contact,role,blocked", array('role'=>'employee'), "no", $externallinks = "", array(), $sort);
                            ?>
                        </DIV>
                    </div>
                </div>
            </div>
        </div>
        <?php $where = 'Where (name LIKE "%admin%") '  ;
        // echo($where);die;
        ?>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tbody tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });


            $( document ).ready(function() {
            $('#employee_grid').DataTable({
                 "bProcessing": true,
                 "serverSide": true,
                 "ajax":{
                    url :"response.php", // json datasource
                    type: "post",  // type of method  ,GET/POST/DELETE
                    "data": {
                        "colums" : '<?php echo $colums ?>',
                        "where" : '<?php echo $where ?>',
                        "tbname" : "user"
                    },
                    error: function(){
                      $("#employee_grid_processing").css("display","none");
                    }
                  }
                });   
            });
        </script>
        <?php include './common/footer_script.php'; ?>
    </body>

</html>