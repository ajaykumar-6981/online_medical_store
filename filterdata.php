

<?php
session_start();

if(!isset($_SESSION['username']))
{
header('location:a_login.php');
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

   $query .= " WHERE CONCAT(medicine_name,company_name,med_type)
               LIKE '%".$searching."%'";

}
$q=mysqli_query($con,$query);

$num=mysqli_num_rows($q);


?>

<html>
<head>

  <link rel="stylesheet" href="Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">

  <style type="text/css">
    .input-group
    {
      width:600px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
<body>


<div class="container">

          <h1 class="text-black text-center">Filter Table Data</h1>
        </div>

      </br>
 
 <?php
      if(!$num)
      {
          echo '<p style="color: red; text-align: center">
          NO Such Value is There. Try again...
          </p>';
     }
     ?>
  <br class="mb-3">
   <form method="post">
     <div class="input-group">
     <input type="text" name="search-box" class="form-control border-secondary text-black bg-transparent" placeholder="Search.........." placeholder="Enter Email" aria-describedby="button-addon2">
     <div class="input-group-append">
     <button class="btn btn-primary text-white" type="submit" name="submit">Send</button>
   <hr>


     </div>
   </div>

  </form>

          <table class="table table-hover table-bordered">
                <tr class="bg-dark text-white  text-center">
                    <th>medicine_Id</th>
                    <th>medicine_name</th>
                    <th>Price</th>
                    <th>Profit</th>
                    <th>Onhand_qty</th>
                    <th>qty_sold</th>
                    <th>med_type</th>
                    <th>company_name</th>
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
                    <td><?php echo $res['medicine_id']; ?></td>
                    <td><?php echo $res['medicine_name']; ?></td>
                    <td><?php echo $res['price']; ?></td>
                    <td><?php echo $res['profit']; ?></td>
                    <td><?php echo $res['onhand_qty']; ?></td>
                    <td><?php echo $res['qty_sold']; ?></td>
                    <td><?php echo $res['med_type']; ?></td>
                    <td><?php echo $res['company_name']; ?></td>
                </tr>

          <?php
        }
           ?>
          </table>
      </div>

  </div>
</div>
</body>
</html>
