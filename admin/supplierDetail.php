<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admins.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
      <div class="nav">
         <div class="logo">
           <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
         </div>
         <ul class="list">
               <li><a href="admin.php">ADMIN</a></li>
               <li><a href="customerDetail.php">CUSTOMER DETAILS</a></li>
               <li><a href="supplierDetail.php" class='active'>SUPPLIER DETAILS</a></li>
               <li><a href="order.php">ORDER</a></li>
               <li><a href="#">Logout</a></li>
           </ul>
      </div>
      <div class="banner">
           <img src="../images/photo1.jpg"/>
      </div>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:100%;margin:auto;">ADD SUPLIERS</button>
  </div>
  <!--------------------------------------------
        //  list of Supplier
   ------------------------------------------------->
   <div class="col-12">
     <div class="card">
         <nav class="navbar ">
         </nav>
          <table class="table table-hover table-bordered">
                <tr class="bg-dark text-white  text-center">
                    <th>Supplier Id</th>
                    <th>Supplier Name</th>
                    <th>Supplier address</th>
                    <th>Contact person</th>
                    <th>Note</th>
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


                $query="SELECT * FROM supliers";
                $q=mysqli_query($con,$query);

                   while($res=mysqli_fetch_array($q))
                {


        ?>
                <tr class="text-center">
                    <td><?php echo $res['suplier_id']; ?></td>
                    <td><?php echo $res['suplier_name']; ?></td>
                    <td><?php echo $res['suplier_address']; ?></td>
                    <td><?php echo $res['contact_person']; ?></td>
                    <td><?php echo $res['note']; ?></td>
                    <td><button class="btn-danger btn"><a href="deleteSupplier.php?id=<?php echo $res['suplier_id']; ?>" class="text-white">Delete</a></button></td>
                    <td><button class="btn-primary btn"><a href="updation.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a></button></td>
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
  <form class="modal-content animate" action="addSupplier.php" method="POST">
    <article class="card-body m-auto"> 
            <div class='row'>
               <div class='col-6'>
                  <label for id="Suplier_name">Supplier Name</label>
                  <input class="form-control" type="text" id="name" name="suplier_name" placeholder='Suplier Name...' required>
               </div>
               <div class='col-6'>
                  <label for id="suplier_address">suplier_address</label>
                  <input class="form-control" type="text" id="suplier_address" name="suplier_address" placeholder='suplier_address...'required></br>
               </div>
            </div>
            <div class='row'>
               <div class='col-6'>
                  <label for id="contact_person">contact_person</label>
                  <input class="form-control"type="text" id="contact_person" name="contact_person" placeholder='contact person...' required>
               </div>
               <div class='col-6'>
                  <label for id="note">note</label>
                  <input class="form-control" type="text" id="note" name="note" placeholder='note...'required></br>
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
  <script src="JS/admin.js"></script>
</body>
</html>