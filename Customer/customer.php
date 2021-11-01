<?php
   session_start();

   $con=mysqli_connect("localhost","root");
   mysqli_select_db($con,"sale");
  
  if(!isset($_SESSION['customer_name'])){             //if session is set then we don't need to login again
      header('location:../c_login.php');     
  }
  

?>

<html>
<head>
    <title>Customer |Portal</title>
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="nav">
         <div class="logo">
           <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
         </div>
         <ul class="list">
               <li><a href="customer.php">Home</a></li>
               <li><a href="listing.php">Medicine Availability</a></li>
               <li><a href="reset_pass.php?id=<?php echo $_SESSION['customer_name']; ?>">Change Password</a></li>
               <li><a href="contactus.php">Feedback</a></li>
               <li><a href="Cart.php">Cart</a></li>
               <li><a href="../logout.php">Logout</a></li>
           </ul>
        </div>
      </div> 
    </div> 
      <div class="banner">
           <img src="../images/studentbanner.jpg"/>
      </div>

  </div>
  <!--------------------------------------------
        //  list of customers
   ------------------------------------------------->
   <div class="section">
      <div class="row d-flex justify-content-around">
        <div class="col-lg-4,col-md-4,col-sm-6">
            <div class="card" style="border:5px solid dodgerblue;margin:5px 0px">
                <div class="card-body" style="background-color: #ccc">
                  <h5>Total Medicines in store:</h5>
                   <h5 style="color:dodgerblue;text-align:center;">
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
       </div>
   </div>      
 
  <script src="JS/admin.js"></script>
</body>
</html>