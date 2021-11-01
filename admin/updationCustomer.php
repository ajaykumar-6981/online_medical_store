<?php
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sale");

if(isset($_POST['submit']))
{
  $id=$_GET['id'];
  $customer_name=$_POST['customer_name'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $medicine_name=$_POST['medicine_name'];
  $expected_date=$_POST['expected_date'];

  $query="UPDATE customer SET customer_name='$customer_name',address='$address',contact='$contact',medicine_name='$medicine_name',expected_date='$expected_date' WHERE customer_id=$id";

  $res=mysqli_query($con,$query);
  if($res)
  {
    header('location:customerDetail.php');
    ?>
    <script>
    alert("Data Updated successfully");
    </script>
    <?php
}

}
?>

<html>
<head>
  <title>Update Medicine</title>
  <link rel="stylesheet" href="../css/admins.css">
  <link rel="stylesheet" href="../css/updation.css">
  <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body>
  <div class=="container">
     <div class="row">
        <div class="col-lg-12">
          <div class="nav">
             <div class="logos">
               <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
             </div>
            <ul class="list">
               <li><a href="admin.php">ADMIN</a></li>
               <li><a href="#" class="active">UPDATE DETAILS</a></li>
               <li><a href="#">CUSTOMER DETAILS</a></li>
               <li><a href="#">SUPPLIER DETAILS</a></li>
               <li><a href="#">SALE</a></li>
            </ul>
           </div>
           
        </div> 
      </div>  
     <div class="box">
        <div class="row">
          <div class="col-lg-6">
             <div class="banners">
              <img src="../images/medical2.jpeg"/>
             </div>
          </div> 
          <div class="col-lg-6 mx-auto">
            <h3><center>Update form</center></h3>

                <hr class="mb-3">
                <u><center>Fill up the forms</center></u>
              <form method="post">

                <label id="customer_name">Customer_name:</label>
                <input class="form-control" type="text" name="customer_name"></br>

                <label id="">Address</label>
                <input class="form-control" type="text" name="address"></br>
                <label  id="contact">Contact</label>
                <input class="form-control" type="text" name="contact"></br>
                <label  id="medicine_name">Medicine_name</label>
                <input class="form-control" type="text" name="medicine_name"></br>
                <label  id="date">Expected Date</label>
                <input class="form-control" type="date" name="expected_date"></br>


                <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>

              </form>
        </div>
      </div>
    </div>  
  </div>  
</body>
</html>
