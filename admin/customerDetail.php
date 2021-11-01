<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admins.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="nav">
         <div class="logo">
           <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
         </div>
         <ul class="list">
         <li><a href="admin.php">ADMIN</a></li>
               <li><a href="medicineDetail.php">MEDICINE DETAILS</a></li>
               <li><a href="#" class='active'>CUSTOMER DETAILS</a></li>
               <li><a href="supplierDetail.php">SUPPLIER DETAILS</a></li>
               <li><a href="cart.php">SALE</a></li>
               <li><a href="#">Logout</a></li>
           </ul>
      </div>
     

      <div class="banner">
           <img src="../images/customer6.png"/>
      </div>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:100%;margin:auto;">ADD CUSTOMER</button>
  </div>
  <!--------------------------------------------
        //  list of students
   ------------------------------------------------->
   <div class="col-12">
   <nav class="navbar ">
   </nav>
      </div> 
          <table class="table table-hover table-bordered">
                <tr class="bg-dark text-white  text-center">
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Medicine Name</th>
                    <th>Expected date</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
        <?php
               session_start();

               echo "Welcome " .$_SESSION['username']. "</br>";
               if(!isset($_SESSION['username']))
               {
                  header('location:a_login.php');
               }
              // include 'connection.php';

              //connectivity
            $con=mysqli_connect("localhost","root") or die("not connected");
            //select database
            mysqli_select_db($con,"sale");


                $query="SELECT * FROM customer";
                $q=mysqli_query($con,$query);

                   while($res=mysqli_fetch_array($q))
                {


        ?>
                <tr class="text-center">
                    <td><?php echo $res['customer_name']; ?></td>
                    <td><?php echo $res['address']; ?></td>
                    <td><?php echo $res['contact']; ?></td>
                    <td><?php echo $res['medicine_name']; ?></td>
                    <td><?php echo $res['expected_date']; ?></td>
                    <td><button class="btn-danger btn"><a href="deleteCustomer.php?id=<?php echo $res['customer_id']; ?>" class="text-white">Delete</a></button></td>
                    <td><button class="btn-primary btn"><a href="updationCustomer.php?id=<?php echo $res['customer_id']; ?>" class="text-white">Update</a></button></td>
                </tr>

          <?php
        }
           ?>
          </table>
      </div>

  
    <!--------modal to add customer---------->
   
  
	<!--Step 1:Adding HTML-->
	<div id="id01" class="modal">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
		<form class="modal-content animate" method='POST' action="addCustomer.php">
			<div class="container">
			    <article class="card-body m-auto"> 
			        <div class='row'>
						<div class='col-6'>
							<label for id="name">Customer Name</label>
		                    <input class="form-control" type="text" id="name"name="customer_name" placeholder='customername...' required>
							<small></small>
						</div>
						<div class='col-6'>
						    <label for id="address">Address</label>
		                    <input class="form-control" type="text" id="address" name="address" placeholder='address...'required></br>
						</div>
                    </div>
                    <div class='row'>
						<div class='col-6'>
							<label for id="contact">Contact</label>
		                    <input class="form-control"type="numbers" id="contact" name="contact" placeholder='contact...' required>
						</div>
						<div class='col-6'>
						    <label for id="medicine">Medicine Name</label>
                            <input class="form-control" type="text" id="medicine" name="medicine_name" placeholder='medicine name...'required></br>
						</div>
                    </div>         
				    <div class='row'>
						<div class='col-6'>
						    <label for id="note">Note</label>
		                    <textarea class="form-control" rows="3" column="8" type="text" name="note" required></textarea></br>
					    </div>
						<div class='col-6'>
						    <label for id="date">Expected date</label>
                            <input class="form-control" type="date" name="expected_date" placeholder='expected date'required></br>
						</div>
                    </div>	
                    	
                    <div class="clearfix">
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					<button type="submit" class="signupbtn" name="add">ADD</button>
				</div>
				</article>
			</div>
		</form>
	</div>

	<!--close the modal by just clicking outside of the modal-->
	<script>
		var modal = document.getElementById('id01');

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
    <!------------------->
</div>    
  <script src="JS/admin.js"></script>
</body>
</html>