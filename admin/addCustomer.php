<?php
 
//connectivity
  $con=mysqli_connect("localhost","root") or die("not connected");
  //select database
  mysqli_select_db($con,"sale");


if(isset($_POST['add']))
{
  $customer_name=$_POST['customer_name'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $medicine_name=$_POST['medicine_name'];
  $expected_date=$_POST['expected_date'];
  $note=$_POST['note'];

 $qry="INSERT INTO `customer`(`customer_name`,`address`, `contact`, `medicine_name`,`expected_date`,`note`) VALUES ('$customer_name','$address','$contact','$medicine_name','$expected_date','$note')";

$res=mysqli_query($con,$qry);

if($res)
{
  ?>
         <script>                   // here script is out of php
                alert('Data Entered Successful');
        </script>

  <?php
    header('location:customerDetail.php');
}
else{
  echo"Data not entered";
}

}

?>