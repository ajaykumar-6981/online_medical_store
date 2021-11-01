<?php
  $con=mysqli_connect('localhost','root');
  mysqli_select_db($con,'sale');

  if(isset($_POST['submit'])){
      
      if(isset($_id)){
          $c_id=$_id;
      }
      $name=$_POST['name'];
      $new_pass=$_POST['new_password'];
      $confirm_pass=$_POST['c_password'];
      
      if($new_pass==$confirm_pass){
        $update_qry="UPDATE `customer` SET `password`='$new_pass' WHERE customer_name='$name'";

        $res=mysqli_query($con,$update_qry);
  
        if($res){
            echo"Password Updated";
        }else{
            echo"Password not Updated";
        }
      }
      
  }
?>
<html>
  <head>
    <title>Reset password</title>
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  </head>
  <body>
   <div class="container bg-light">
     <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your name.."><br>
        <label>New Password:</label>
        <input type="text" name="new_password" class="form-control" placeholder="Enter your new password.."><br>
        <label>Confirm Password:</label>
        <input type="text" name="c_password" class="form-control" placeholder="Enter your confirm password.."><br>
     
        <button class="btn btn-primary"name="submit">Update password</button>

     </form>
   </div>  
  </body>
</html>