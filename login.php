<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
   <link href="css/style.css" rel="stylesheet">
   <style>
      body {
         font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
         height: 100;
      }

      * {
         box-sizing: border-box;
      }

      h1 {
         text-align: center;
      }

      form {
         max-width: 950px;
         margin: auto;
      }

      .fieldContainer {
         display: flex;
         width: 100%;
         margin-bottom: 15px;
      }

      .icon {
         font-size: 23px;
         padding: 10px;
         background: #000;
         color: white;
         min-width: 50px;
         text-align: center;
      }

      .field {
         font-size: 16px;
         width: 100%;
         padding: 10px;
         outline: none;
         color: black;
      }

      .field:focus {
         border: 2px solid dodgerblue;
      }

      .btn {
         font-size: 16px;
         background-color: green;
         color: white;
         padding: 10px 16px;
         border: none;
         cursor: pointer;
         width: 20%;
         opacity: 0.9;
         border-radius: 8px;
         text-align: center;
      }

      .btn:hover {
         opacity: 1;
      }

      .btn1 {

         background-color: green;
         color: white;
         padding: 10px 16px;
         border: none;
         cursor: pointer;

         opacity: 0.9;
         border-radius: 8px;
      }

      .btn1:hover {
         opacity: 1;
      }

      #btn3 {

         background-color: green;
         color: white;
         padding: 10px 16px;
         background-color: green;
         width: 120px;

         opacity: 0.9;
         border-radius: 8px;
      }

      #btn2 {

         background-color: green;
         color: white;
         padding: 10px 16px;
         border: none;
         cursor: pointer;

         opacity: 0.9;
         border-radius: 8px;
      }

      .btn2:hover {
         opacity: 1;
      }

      table {

         border-collapse: collapse;
         width: 100%;
      }

      th {
         background-color: #eee;

         text-align: center;
         padding: 15px;
      }

      .navbar {
         width: 100%;
         background-color: #43a047;
         ;
         overflow: auto;
      }

      .navbar a {
         float: left;
         padding: 10px;
         color: white;
         text-decoration: none;
         font-size: 20px;

      }

      footer {
         margin-top: 26%;
      }
   </style>
</head>

<body>
   <div class="container-fluid">

      <div class="navbar">
         <a class="" href="#"><i class="glyphicon glyphicon-circle-arrow-left" style='font-size:28px; color:#fff;'></i>&nbsp;&nbsp;&nbsp; Login</a>

      </div>

      <div class="container" style="margin-top:30px;">
         <?php
         if (isset($_GET['status_number'])) {
         ?>
            <h2 style="color:red;"><?php echo $_GET['status_message'] ?></h2>
         <?php
         }
         ?>

         <div class="row">
            <form method="POST" action="controller/loginControll.php" id="my_form">
               <div class="fieldContainer">
                  <i class="fa fa-mobile icon"></i>
                  <input class="field" type="text" placeholder="Mobile Number" name="userid" />
               </div>

               <div class="fieldContainer">
                  <i class="fa fa-key icon"></i>
                  <input class="field" type="password" placeholder="Password" name="password" />
               </div>

               <input type="hidden" class="field" placeholder="" name="tbname" value="user" />
               <table>
                  <tr>
                     <td colspan="2" align="center">
                        <button type="submit" id="btn3">Login</button><br><br>
                     </td>
                  </tr>
               </table>

               <table align="center" cellpadding="15">
                  <tr>
                     <td colspan="2" align="center">
                        <a href="#" style="color:#fff;"><button type="button" id="btn2">Forget Password</button></a>
                        <a href="registration.php" style="color:#fff;"><button type="button" id="btn2">Register</button></a>
                     </td>
                  </tr>
               </table>

            </form>
         </div>
      </div>
      <!---------Footer-------------->
      <?php include 'common/footer.php'; ?>
      <!-- end footer -->
   </div>
</body>

</html>