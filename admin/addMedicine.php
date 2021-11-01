<?php
  
//connectivity
  $con=mysqli_connect("localhost","root") or die("not connected");
  //select database
  mysqli_select_db($con,"sale");


if(isset($_POST['create']))
{
 
 $medicine_code=$_POST['medicine_code'];
 $medicine_name=$_POST['medicine_name'];
 $price=$_POST['price'];
 $profit=$_POST['profit'];
 $onhand_qty=$_POST['onhand_qty'];
 $sold_qty=$_POST['sold_qty'];
 $expiry_date=$_POST['expiry_date'];
 $company_name=$_POST['company_name'];

 $sql="INSERT INTO medicine(medicine_code,medicine_name,price,profit,onhand_qty,qty_sold,expiry_date,company_name)
 VALUES('$medicine_code','$medicine_name','$price','$profit','$onhand_qty','$sold_qty','$expiry_date','$company_name')";

$qry=mysqli_query($con,$sql);

if($qry)
{
  ?>
         <script>                   // here script is out of php
                alert('Data Entered Successful');
        </script>

  <?php
    header('location:medicineDetail.php');
}

}

?>