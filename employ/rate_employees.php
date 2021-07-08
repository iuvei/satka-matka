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
                            
                            <div class="sparkline-list">
                                <h3 class="service_title" style="text-align: center;">Give your valuable feedback</h3>
                                <table class="table table-hovered">
                                    <theader>
                                        <tr>
                                        <th>#</th>
                                        <?php 
                                        $curr_month = date("Y-m");
                                        
                                        $sql = "SELECT * FROM `features`";
                                        $features = mysqli_query($conn, $sql);
                                        if($features == true){
                                            
                                            while($feature = $features->fetch_assoc()){
                                                ?>
                                                <th><?php echo $feature['name']; ?></th>
                                                <?php
                                                
                                            }
                                        }
                                        ?>
                                        </tr>
                                    </theader>
                                    <tbody>
                                        <?php 
                                        $employees = $db->select('user', '*', array('role'=>'employee'));
                                        $total_employee = $employees->num_rows;
                                        if($employees == true){
                                            $row_id = 1;
                                            while($employee = $employees->fetch_assoc()){
                                              
                                                $employee_id = $employee['id'];
                                                $user_id = $user['id'];

                                                $sql = "SELECT * FROM `ratings` WHERE (created_at like '%$curr_month%' AND emp_id = $employee_id AND user_id = $user_id )";
                                                $ratings = mysqli_query($conn, $sql);
                                                if($ratings->num_rows > 0){
                                                    $disabled = "disabled";
                                                    $required = "";
                                                }else{
                                                    $disabled = "";
                                                    $required = "required";
                                                }
                                                
                                                ?>
                                            <tr id="row<?php echo $row_id; ?>">
                                                <td><?php echo $employee['name']; ?></td>
                                               
                                                <div class="col-md-12">
                                                
                                                    <!--<form action="../controller/api1/common/insert2.php" class="p-5 bg-white" method="POST" enctype="multipart/form-data">-->
                                                         <?php
                                                            $fetures_id = $db->select('features', 'id');
                                                            if($fetures_id == true){
                                                                $counter = 1;
                                                                while($feture_id = $fetures_id->fetch_assoc()){
                                                                    $fet_id = $feture_id['id'];
                                                                    $sql = "SELECT * FROM `ratings` WHERE (created_at like '%$curr_month%' AND emp_id = $employee_id AND user_id = $user_id AND features_id = $fet_id)";
                                                                    $feature = mysqli_query($conn, $sql)->fetch_assoc();
                                                            ?>
                                                    <td>
                                                        <select class="form-control" name="rating" id="rating<?php echo $counter; ?>" <?php echo $disabled ?> >
                                                            <?php
                                                            if(count($feature) > 0){
                                                                    ?>
                                                                <option><?php echo $feature['rating'] ?></option>

                                                                <?php 
                                                                
                                                             }
                                                                ?>
                                                            <option value="0">Select Position</option>
                                                            <?php 
                                                             for($i = 1; $i<=$total_employee; $i++){ 
                                                            ?>

                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                           <?php } ?>
                                                        </select> 
                                                    </td>
                                                    
                                                    <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>" id="user_id<?php echo $counter; ?>">
                                                    <input type="hidden" name="emp_id" value="<?php echo $employee["id"]; ?>" id="emp_id<?php echo $counter; ?>">
                                                     <input type="hidden" name="features_id" value="<?php echo $feture_id["id"]; ?>" id="features_id<?php echo $counter; ?>">
                                                    
                                                 <?php
                                                 $counter++;
                                                }
                                                $sql = "SELECT remark FROM `ratings` WHERE (created_at like '%$curr_month%' AND emp_id = $employee_id AND user_id = $user_id ) ORDER BY remark DESC";
                                                
                                                $remark = mysqli_query($conn, $sql);
                                                if($remark->num_rows > 0){
                                                    $remarks = $remark->fetch_assoc();
                                                    $rem = $remarks['remark'];
                                                }else{
                                                    $rem = "";
                                                }
                                                ?>
                                                <td>
                                                    <input type="text" name="remark" id="remark<?php echo $row_id; ?>" placeholder="Remark" class="form-control" <?php echo $disabled ?> value="<?php echo $rem; ?>">  
                                                </td>
                                                <?php
                                            }
                                                 ?>   
                                                        
                                                </tr>
                                                </div>
                                                <?php
                                               $row_id++;
                                            }
                                            ?>
                                            <div class="col-md-2">
                                            <input type="button" id="submit" value="Save" onclick="saveRating()"  style="float:left; margin-top: 10px;" class="btn btn-primary py-2 px-4 text-white">
                                            <!--<input type="submit" value="Submit" style="float:right; margin-top: 10px;" class="btn btn-primary py-2 px-4 text-white">-->
                                            </div>
                                        <!--</form>-->
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </DIV>
                    </div>
                </div>
            </div>

        </div>
        <script>
    function saveRating() {
        
       var counter = '<?php echo $counter; ?>';
       counter= counter-1;
       var rownum = '<?php echo $row_id; ?>';
       rownum= rownum-1;
      
       for (var j = 1; j <= rownum; j++) {
        for (var i = 1; i <= counter; i++) {
//            alert(rownum+"=="+i);
         
          var rating = $("#row" + j).find("#rating" +i).find("option:selected").val();
          if(rating == 0){
            // alert("Can't Insert empty value");
            return;
          }
          
          var user_id = $("#row" + j).find("#user_id" +i).val();
          var emp_id = $("#row" + j).find("#emp_id" +i).val();
          var features_id = $("#row" + j).find("#features_id" +i).val();
          var remark = $("#row" + j).find("#remark" +i).val();
         
          $.post("../controller/ajax_insert.php",
                  {
                    remark: remark,
                    rating: rating,  
                    emp_id: emp_id,
                    user_id: user_id,
                    features_id: features_id,
                    loginid: '<?php// echo $user["id"]; ?>',
                    api_key: '<?php// echo $user["api_key"]; ?>',
                    tbname: "ratings"
                  },
                  function (data, status) {
                    // alert(data);
                    if (status == "success") {
                       // alert() 
                      // window.location.href = "rate_employees.php";
                    }
                  });
        }
       }
          

    }
     
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tbody tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description');
        </script>
        <?php include './common/footer_script.php'; ?>
    </body>

</html>