<?php
  
  //connectivity
  $con=mysqli_connect("localhost","root") or die("not connected");
  //select database
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

$nums=mysqli_num_rows($q);


?>
             
<html>
<head>
  <title>flt</title>
  <link rel="stylesheet" href="Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/admins.css">
  <link rel="stylesheet" href="css/modal.css"> 
</head>
<body>
<body>
  <div class="container-fluid">
      <div class="nav">
         <div class="logo">
           <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
         </div>
         <ul class="list">
               <li><a href="admin.php">ADMIN</a></li>
               <li><a href="#" class='active'>MEDICINE DETAILS</a></li>
               <li><a href="customerDetail.php">CUSTOMER DETAILS</a></li>
               <li><a href="supplierDetail.php">SUPPLIER DETAILS</a></li>
               <li><a href="#">Logout</a></li>
           </ul>
      </div>
      <div class="banner">
           <img src="../images/medicine.jpeg"/>
      </div>
      <div class="banntext"> 
         <button onclick="document.getElementById('id01').style.display='block'">ADD MEDICINES</button> 
         
      </div>   
   </div>
   <div class="container">

          <h1 class="text-black text-center">Filter Table Data</h1>
        </div>

      </br>
 
 <?php
      if(!$nums)
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

  <!--------------------------------------------
        //  list of medicine
   ------------------------------------------------->
   <div class="col-12">
     <div class="card">
         
       <table class="table table-hover table-bordered">
                <tr class="bg-dark text-white  text-center">
                    <th>Medicine Code</th>
                    <th>Medicine Name</th>
                    <th>Price</th>
                    <th>Profit</th>
                    <th>Onhand_qty</th>
                    <th>Sold_qty</th>
                    <th>Expiry_date</th>
                    <th>company_name</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
        <?php
                            
                 while($res=mysqli_fetch_array($nums))
                {

        ?>
                <tr class="text-center">
                    <td><?php echo $res['medicine_code']; ?></td>
                    <td><?php echo $res['medicine_name']; ?></td>
                    <td><?php echo $res['price']; ?></td>
                    <td><?php echo $res['profit']; ?></td>
                    <td><?php echo $res['onhand_qty']; ?></td>
                    <td><?php echo $res['qty_sold']; ?></td>
                    <td><?php echo $res['expiry_date']; ?></td>
                    <td><?php echo $res['company_name']; ?></td>
                    <td><button class="btn-danger btn"><a href="deleteMedicine.php?id=<?php echo $res['medicine_id']; ?>" class="text-white">Delete</a></button></td>
                    <td><button class="btn-primary btn"><a href="updationMedicine.php?id=<?php echo $res['medicine_id']; ?>" class="text-white">Update</a></button></td>
                </tr>

          <?php
        }
           ?>
          </table>
      </div>

  </div>
 <!-----------------------ADD MEDICINES MODAL--------------------------------->
  <!--Step 1:Adding HTML-->
	

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="addMedicine.php" method="POST">
    <article class="card-body m-auto"> 
            <div class='row'>
               <div class='col-6'>
                  <label for id="product_code">medicine Code</label>
                  <input class="form-control" type="text" id="medicine_code" name="medicine_code" placeholder='medicine_code...'required></br>
               </div>
               <div class='col-6'>
                  <label for id="medicine_name">Medicine Name</label>
                  <input class="form-control"type="text" id="medicine_name" name="medicine_name" placeholder='medicine_name...' required>
               </div>
            </div>

            <div class='row'>
               <div class='col-6'>
                  <label for id="price">Price</label>
                  <input class="form-control" type="text" id="price" name="price" placeholder='price...'required></br>
               </div>
               <div class='col-6'>
                  <label for id="profit">Profit</label>
                  <input class="form-control" type="text" id="profit" name="profit" placeholder='profit...'required></br>
               </div>
            </div>  

            <div class='row'>
               <div class='col-6'>
                  <label for id="onhand_qty">Onhand qty</label>
                  <input class="form-control" type="text" id="onhand_qty"name="onhand_qty" placeholder='onhand_qty...' required>
               </div>
               <div class='col-6'>
                  <label for id="sold_qty">Sold Qty</label>
                  <input class="form-control" type="text" id="sold_qty" name="sold_qty" placeholder='sold qty...'required>
               </div>
            </div>   
            <div class='row'>   
               <div class='col-6'>
                  <label for id="date">Expiry date</label>
                  <input class="form-control" type="date" name="expiry_date" placeholder='expiry date'required></br>
               </div>
               <div class='col-6'>
                  <label for id="company_name">Company Name</label>
                  <input class="form-control" type="text" name="company_name" placeholder='company name...'required></br>
               </div>
            </div>	
          
            <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="create">Add</button>
            </div>
      </article>
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

</body>
</html>

<!---------------->
   
              
