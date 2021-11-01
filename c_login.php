<?php
 
 $con=mysqli_connect("localhost","root");
 mysqli_select_db($con,"sale");

 if(isset($_SESSION['customer_name'])){             //if session is set then we don't need to login again
     header('location:Customer/customer.php');     
 }


//isset checks whether submit button is set or not
if(isset($_POST['submit']))
{
  
  $email=mysqli_real_escape_string($con,$_POST['email']);   //use function to make username more secure         
  $password=$_POST['password'];


  $sql="SELECT customer_id,email,customer_name FROM customer WHERE email='{$email}' AND password='{$password}'";
 // echo $sql; 
 // die();
  $res=mysqli_query($con,$sql) or die("Query Failed");
  
  if(mysqli_num_rows($res) > 0)
   {
       while($row=mysqli_fetch_assoc($res)){
             session_start();
             $_SESSION["email"]=$row['email'];
             $_SESSION["customer_id"]=$row['customer_id'];
             $_SESSION["customer_name"]=$row['customer_name'];

             header('location:customer/customer.php');
       }
   
  }else{
      echo '<div class="alert alert-danger">User not matched!</div>';
  }

}


?>




<html>
<head>
  <title>customer login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/loginpage.css">
   
</head>
<body>
<section class="bgimage">
  <div class='info' style="margin: 0px 140px;text-align:center">
   <h1 style="background-color:white;text-align:center">LOGIN PAGE</h1> 
   <div class="imgbox">
   <img class="img" src="images/img_avatar.png" width="200px" height="200px">
   </div>
   <a href="a_login.php" style='color:green;display:block;background-color:white;text-align:center'>Login for Admin</a>
  </div>
    <div class="container">
      <div class="row">
         <div class="col-12 mx-auto">
           <div class="p-3 bg-grey">
            <h3>Login form for Customer</h3>

                <label>Login with your Account</label>
                
                <hr class="mb-3">
                <u>Fill up the forms</u>
            <form name="myForm" id="form" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return validateLogin()" method="post">
               
                <label for id="email">Email:</label>
                <input class="form-control" type="text" name="email" id="email" required></br>

                <label for id="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password" required></br>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                <hr>
                <p>Not have an Account?<a href="c_registration.php">SignUp</a></p>
            </form>
        </div>
    </div>
   </div>
 </div>
 <script>
     function validateLogin()
     {
     const form=document.getElementById('form').value;
     const email=document.getElementById('email').value;
     const password=document.getElementById('password').value;

     if(email=''){
       alert("please enter your email");
       return false;
     }elseif(email.length<4){
      alert("please enter min 5 characters");
       return false;
     }
     else{
        return true;
     }
     if(password=''){
       alert("please enter your password");
       return false;
     }else{
        return true;
     }
 </script>
</section>
</body>
</html>
