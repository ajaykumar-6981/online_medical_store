<?php
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sale");

if(isset($_POST['submit']))
{
  $id=$_GET['id'];
  $medicine_code=$_POST['medicine_code'];
  $medicine_name=$_POST['medicine_name'];
  $price=$_POST['price'];

  $query="UPDATE medicine SET medicine_code='$medicine_code',medicine_name='$medicine_name',price='$price' WHERE medicine_id=$id";

  $res=mysqli_query($con,$query);
  if($res)
  {
    header('location:medicineDetail.php');
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
  
  <style rel="stylesheet" type="text/css">
    .container
    {
      width:100%;
      height: 100vh;
    }
     .box{
        margin:auto;
        width:100%;
        padding:3%;
        background-color: lightgrey;
      }
  </style>


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
               <li><a href="#" class="active">UPDATE MEDICINE</a></li>
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

                <label id="medicine_code">Medicine code</label>
                <input class="form-control" type="text" name="medicine_code"></br>

                <label id="medicine">Medicine_name:</label>
                <input class="form-control" type="text" name="medicine_name"></br>
                <label  id="price">Price</label>
                <input class="form-control" type="text" name="price"></br>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>

              </form>
        </div>
      </div>
    </div>  
  </div>  
</body>
</html>
