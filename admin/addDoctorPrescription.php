<?php
  
//connectivity
  $con=mysqli_connect("localhost","root") or die("not connected");
  //select database
  mysqli_select_db($con,"sale");


if(isset($_POST['create']))
{
 $customer_name=$_POST['customer_name'];
 $address=$_POST['address'];
 $contact=$_POST['contact'];
 $doctor_name=$_POST['doctor_name'];
 $doctor_prescription=$_POST['doc_prescription'];
 
 $sql="INSERT INTO doctor(customer_name,address,contact,doctor_name,doctor_prescription)
 VALUES('$customer_name','$address','$contact','$doctor_name','$doctor_prescription')";

$qry=mysqli_query($con,$sql);

if($qry)
{
  ?>
         <script>                   // here script is out of php
                alert('Data Entered Successful');
        </script>

  <?php
    header('location:cart.php');
}

}

?>