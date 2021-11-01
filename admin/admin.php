<?php
 session_start();

 $con=mysqli_connect("localhost","root");
 mysqli_select_db($con,"sale");

 if(!isset($_SESSION['username'])){
     header('location:../a_login.php');
 }


?>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/admins.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
  <div class="nav">
            <div class="logo">
              <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
            </div>
            
            <ul class="list">
               <li><a href="admin.php">ADMIN</a></li>
               <li><a href="order.php">Order</a></li>
               <li><a href="logout.php">Logout</a></li>
            </ul>
            <div id="tooggle">III</div>
        </div>
        
        <div class="banner">
           <img src="../images/medical4.jpg"/>
        </div>
        
      <!---side bar---->
      <div class="side">
            <div class="head">
              <h3 id="demo">ONLINE MEDICAL STORE</h3>
              <span class="close-btn">X</span>
            </div> 
          <ul class="ul" id="list">
            <li><a href="admin.php">ADMIN</a></li>
            <li><a href="medicineDetail.php">MEDICINE DETAILS</a></li>
            <li><a href="customerDetail.php">CUSTOMER DETAILS</a></li>
            <li><a href="supplierDetail.php">SUPPLIER DETAILS</a></li>
            <li><a href="order.php">ORDER</a></li>
            <li><a href="cart.php">CART</a></li>
           
          </ul> 
        </div>
        
  </div>
  <h5 style="text-align:center">WELCOME <?php echo $_SESSION['username'];?></h5>
  <div class="section">
      <div class="row d-flex justify-content-around">
      <div class="col-lg-4,col-md-4,col-sm-6">
            <div class="card" style="border:5px solid cyan;margin:5px 0px">
                <div class="card-body" style="background-color: #ccc">
                  <h5>Total Medicines in store:</h5>
                   <h5 style="color:cyan;text-align:center;">
                   <?php
                       $query="SELECT medicine_id FROM medicine ORDER BY medicine_id";
                       $res=mysqli_query($con, $query);
                       
                       $row=mysqli_num_rows($res);
                       echo "$row";
                   ?>
                   </h5>  
                </div>
            </div>
         </div> 
         <div class="col-lg-4,col-md-4,col-sm-6">
            <div class="card" style="border:5px solid dodgerblue;margin:5px 0px">
                <div class="card-body" style="background-color: #ccc">
                  <h5>Total Registered Admin:</h5>
                   <h5 style="color:dodgerblue;text-align:center;">
                   <?php
                       $query="SELECT admin_id FROM admin ORDER BY admin_id";
                       $res=mysqli_query($con, $query);
                       
                       $row=mysqli_num_rows($res);
                       echo "$row";
                   ?>
                   </h5>  
                </div>
            </div>
         </div> 
         <div class="col-lg-4,col-md-4,col-sm-6">
            <div class="card" style="border:5px solid green;margin:5px 0px">
                <div class="card-body" style="background-color:#ccc">
                   <h5>Total Registered Customer:</h5>
                   <h5 style="color:green;text-align:center;">
                   <?php
                       $query="SELECT customer_id FROM customer ORDER BY customer_id";
                       $res=mysqli_query($con, $query);
                       
                       $row=mysqli_num_rows($res);
                       echo "$row";
                   ?>
                   </h5>  
                </div>
            </div>
         </div>
         <div class="col-lg-4,col-md-4,col-sm-6">
            <div class="card" style="border:5px solid orange;margin:5px 0px">
                <div class="card-body" style="background-color:#ccc">
                   <h5>Total Registered Suppliers:</h5>
                   <h5 style="color:orange;text-align:center;">
                   <?php
                       $query="SELECT suplier_id FROM supliers ORDER BY suplier_id";
                       $res=mysqli_query($con, $query);
                       
                       $row=mysqli_num_rows($res);
                       echo "$row";
                   ?>
                   </h5>  
                </div>
            </div>
         </div>
      </div>
  </div> 
  <script src="../JS/sidebar.js"></script>
  <script src="JS/admin.js"></script>
</body>
</html>