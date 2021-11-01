<?php
session_start();

if(!isset($_SESSION['customer_name']))
{
header('location:../c_login.php');
}

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sale");

$query="SELECT * FROM medicine";


if(isset($_POST['submit']))
{
 //$search_box=$_POST['search-box'];
 //  echo "submit is working";

 $searching=mysqli_real_escape_string($con,$_POST['search-box']);

  //$query .=" WHERE username LIKE '%".$searching."%'";

   $query .= " WHERE CONCAT(medicine_name,company_name)
               LIKE '%".$searching."%'";


}
$q=mysqli_query($con,$query);

$num=mysqli_num_rows($q);


?>

<html>
<head>
<title>Medicine_List</title>
    <link rel="stylesheet" href="../css/admins.css">
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
 
  <style type="text/css">
    .input-group
    {
      width:600px;
      margin: auto;
     }
    .h1{
      margin-top:5px;
      text:black;
      text-align:center;
      background-color:orange;
    } 
  </style>
</head>
<body>
    <div class="nav">
            <div class="logo">
              <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
            </div>
            
            <ul class="list">
               <li><a href="customer.php">Home</a></li>
               <li><a href="listing.php" class='active'>Medicine Availability</a></li>
               <li><a href="#">Logout</a></li>
            </ul>
           
    </div>

<div class="container-fluid">

          <h1 class="h1">Check the Availability of Medicine</h1>
          <div class="banner">
               <img src="../images/customer6.png"/>
           </div>
        </div>

      </br>

   <?php
      if(!$num)
      {
          echo '<p style="color: red; text-align: center">
          NO Such Medicine Available here.Sorry try next time...
          </p>';
     }
     ?>
  <br class="mb-3">
   <form method="post">
     <div class="input-group">
     <input type="text" name="search-box" class="form-control border-secondary text-black bg-transparent" placeholder="Search.........." placeholder="Enter Email" aria-describedby="button-addon2">
     <div class="input-group-append">
     <button class="btn btn-primary text-white" type="submit" name="submit">Search</button>
   <hr>


     </div>
   </div>

  </form>

          <table class="table table-hover table-bordered">
                <tr class="bg-dark text-white  text-center">
                    <th>medicine_Name</th>
                    <th>Company name</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Profit</th>
                </tr>
        <?php


              //connectivity
            $con=mysqli_connect("localhost","root");
            //select database
            mysqli_select_db($con,"medicine");



              //  $q=mysqli_query($con,$query);

                   while($res=mysqli_fetch_array($q))
                {


        ?>
                <tr class="text-center">
                    <td><?php echo $res['medicine_name']; ?></td>
                    <td><?php echo $res['company_name']; ?></td>
                    <td><?php if($res['onhand_qty']>0){echo 'Available'; } ?></td>
                    <td><?php echo $res['sale_price']; ?></td>
                    <td><?php echo $res['profit']; ?></td>
                </tr>

          <?php
        }
           ?>
          </table>
      </div>

  </div>
</div>