<?php
session_start();

if(!isset($_SESSION['username']))
{
header('location:../a_login.php');
}

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sale");

$query="SELECT * FROM `medicine` WHERE onhand_qty<10";

$q=mysqli_query($con,$query);

$num=mysqli_num_rows($q);


?>

<html>
<head>
<title>Medicine_List</title>
    <link rel="stylesheet" href="../css/admins.css">
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
 
  <style type="text/css">
    .h4{
      margin-top:2px;
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
               <li><a href="admin.php">ADMIN</a></li>
               <li><a href="#" class='active'>Order</a></li>
               <li><a href="#">Logout</a></li>
            </ul>
           
    </div>

<div class="container-fluid">
           <div class="banner">
               <img src="../images/customer6.png"/>
           </div>
        </div>
        <div class="card" style="width:300px;height:50px;border:1px solid dodgerblue;margin:auto">
                <div class="card-body">
                  <h6>Total Medicines in store:
                    <?php
                       $query="SELECT medicine_id FROM medicine ORDER BY medicine_id";
                       $res=mysqli_query($con, $query);
                       
                       $row=mysqli_num_rows($res);
                       echo "$row";
                   ?>
                   </h6>  
                </div>
            </div>
        </br>
     
      </div>
    </div>
   <h4 class="h4">Medicine below 10 Qty</h4>
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
                    <td><?php echo $res['onhand_qty'] ?></td>
                    <td><?php echo $res['price']; ?></td>
                    <td><?php echo $res['profit']; ?></td>
                </tr>

          <?php
        }
           ?>
          </table>
      </div>

  </div>
</div>