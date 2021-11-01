<?php

    //connectivity
  $con=mysqli_connect("localhost","root") or die("not connected");
  //select database
  mysqli_select_db($con,"sale");


if(isset($_POST['create']))
{
 $customer_name=$_POST['customer_name'];
 $medicine_name=$_POST['medicine_name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $address=$_POST['address'];
 $expected_date=$_POST['expected_date'];
 $contact=$_POST['contact'];
 $note=$_POST['note'];
 
 $sql="INSERT INTO customer(customer_name,email,password,address,contact,medicine_name,expected_date,note)
 VALUES('$customer_name','$email','$password','$address','$contact','$medicine_name','$expected_date','$note')";

$qry=mysqli_query($con,$sql);

if($qry)
{
  ?>
         <script>                   // here script is out of php
                alert('Data Entered Successful');
        </script>

  <?php
}

}

?>


<html>
  <head>
    <title>Customer Registration</title>
    <link rel='styleesheet' href='css/registration.css'>
    <link rel="stylesheet" href="Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  </head>
  <body>
     <div class="container">
       <div class="card bg-light">
          <article class="card-body mx-auto" style="max-width:auto">
             <form class="c_registration.php" id='form' method="post">
        		<h2 class="card-title mt-3 text-center">Create Account</h2>

	                <div class="row">
	                   <div class="col-lg-12">
	                        <h4>Registration form</h4>
	                            <u>Fill up the forms with correct values</u>
		                          <hr class="mb-3">
                               
							   <div class='row'>
							        <div class='col-6'>
								        <label for id="name">Customer Name</label>
		                                <input class="form-control" type="text" id="name"name="customer_name" placeholder='customername...'>
							        </div>
								   <div class='col-6'>
								        <label for id="medicine">Medicine Name</label>
		                                <input class="form-control" type="text" id="medicine" name="medicine_name" placeholder='medicine...'required></br>
								   </div>
                               </div>
                               <div class='row'>
							       <div class='col-6'>
								       <label for id="email">Email</label>
		                               <input class="form-control"type="text" id="email" name="email" placeholder='email...' required>
							        </div>
								   <div class='col-6'>
								       <label for id="password">Password</label>
		                               <input class="form-control"type="password" id="password" name="password" placeholder='password..' required></br>
								    </div>
                               </div>
							   <div class='row'>
							       <div class='col-6'>
								       <label for id="address">Address</label>
                                       <input class="form-control" type="text" id="address" name="address" placeholder='address...'required>
							           
									</div>
								   <div class='col-6'>
								       <label for id="date">Expected date</label>
                                       <input class="form-control" type="date" name="expected_date" placeholder='expected date'required></br>
								   </div>
                               </div>	
							   <div class='row'>
							       <div class='col-6'>
								      <label for id="contact">Contact</label>
		                              <input class="form-control" type="text" name="contact" required/>
								   </div>
								   <div class='col-6'>
								      <label for id="note">Note</label>
		                              <textarea class="form-control" rows="3" column="8" type="text" name="note" required></textarea></br>
								   </div>
                               </div>	
							   
		                     <button class="btn btn-primary btn-block" type="submit" name="create">Sign Up</button>

                         <p>Have an Account?<a href="c_login.php">Sign in</a></p>
		               </div>
	                </div>

       </form>
     </article>
    </div>
   </div>
  
</body>

</html>
