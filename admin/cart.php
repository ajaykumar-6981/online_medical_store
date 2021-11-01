<?php
    session_start();
    //database connectivity
    $con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'sale');

    
    if(isset($_POST['add']))
    {
         if(isset($_SESSION["shopping_carts"]))
         {
              $item_array_id = array_column($_SESSION["shopping_carts"], "product_id");
             
              if(!in_array($_GET["id"], $item_array_id))
              {
                 $count=count($_SESSION["shopping_carts"]);
                 $item_array=array(
                     'product_id'   =>$_GET['id'],
                     'item_name'    =>$_POST['hidden_name'],
                     'product_price'=>$_POST['hidden_price'],
                     'item_quantity'=>$_POST['quantity']
                  );

                 $_SESSION['shopping_carts']['$count']=$item_array;
                 echo '<script>window.location="cart.php"</script>';
             }
             else
               {
                   echo '<script>alert("Item is already added to cart")</script>';
                   echo '<script>window.location="cart.php"</script>';
               }
         }
         else
         {
             $item_array=array(
                'product_id'   =>$_GET['id'],
                'item_name'    =>$_POST['hidden_name'],
                'product_price'=>$_POST['hidden_price'],
                'item_quantity'=>$_POST['quantity']
             );
             $_SESSION['shopping_carts'][0]=$item_array;
         }
    }
    if(isset($_GET['action']))
    {
        if($_GET['action']=="delete")
        {
            foreach($_SESSION["shopping_carts"] as $keys => $value)
            {
                if($value['product_id']==$_GET['id'])
                {
                    unset($_SESSION['shopping_carts'][$keys]);
                    echo '<script>alert("Medicine has been Removed...")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
?>
<!------------------------------------------->
<html>
   <head>
       <title>Shopping Cart</title>
       <link rel="stylesheet" href="../css/cart.css">
       <link rel="stylesheet" href="../css/admins.css">
       <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
      
   </head>
   <body>
   <div class="nav">
         <div class="logo">
           <h2><a class="navbar-brand" href="#">ONLINE MEDICAL STORE</a></h2>
         </div>
         <ul class="list">
               <li><a href="admin.php">ADMIN</a></li>
               <li><a href="medicineDetail.php">MEDICINE DETAILS</a></li>
               <li><a href="customerDetail.php">CUSTOMER DETAILS</a></li>
               <li><a href="supplierDetail.php">SUPPLIER DETAILS</a></li>
               <li><a href="#" class="active">CART</a></li>
               <li><a href="#">Logout</a></li>
         </ul>
    </div>
      
 <div class="container-fluid" style="width:100%">
 <h2 style="background-color:#ccc;margin:5px 0px;padding:5px 0px;">Shopping Cart</h2>
 <div class="row">
   <div class="col-lg-8 col-md-12 col-sm-12 bg-light">
     <h4 style="background-color:#ccc;margin:5px 0px;padding:5px 0px;text-align:center;color:dodgerblue;">Select your Medicine</h4>
   <div class="row">
       <?php
          $query="SELECT * FROM medicine ORDER BY medicine_id ASC";
           $result= mysqli_query($con,$query);
           if(mysqli_num_rows($result)> 0)
            {

               while($row= mysqli_fetch_array($result))
               {
        ?>
            <div class="col-md-3">
         
              <form method="POST" action="cart.php?action=add&id=<?php echo $row["medicine_id"] ?>">
              
                 <div class="product">
                 
                    <img src="<?php echo $row['image'];?>" class="img-responsive">
                    <h5 class="text-info"><?php echo $row['medicine_name']; ?></h5>
                    <h5 class="text-danger"><?php echo $row['price']; ?></h5>
                    <small><s><?php echo $row['sale_price']; ?></s></small>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["medicine_name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                </div>
              </form>
            </div>  
          <?php
           }
          }
         ?>
        <div style="clear:both"></div>
     <hr>
   </div> 
 </div> 
   <!-----------------shopping cart details---------------------------> 

   <div class="col-lg-4 col-md-12 col-sm-12">    
       
          <h4 class="title2"style="background-color:#ccc;margin:5px 0px;padding:5px 0px">Shopping Cart Details</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="30%">Medicine Name</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Item</th>
                </tr>
                
        <?php 
          if(!empty($_SESSION['shopping_carts']))
          {
            $total=0;
               foreach($_SESSION['shopping_carts'] as $keys=> $value)
               {
        ?>
                <tr>
                   <td><?php echo $value['item_name']; ?></td>
                   <td><?php echo $value['item_quantity']; ?></td>
                   <td>$<?php echo $value['product_price']; ?></td>
                   <td>$<?php echo number_format($value['item_quantity']* $value['product_price'], 2); ?></td>
                   <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]?>"><span class="text-danger">Remove Item</a></td> 
                </tr>  
         <?php
            $total=$total + ($value["item_quantity"]* $value["product_price"]);
               }
               ?>
               <tr>
                   <td colspan="3" align="right">Total</td>
                   <td align='right'>$<?php echo number_format($total, 2); ?></td>
                   <td></td>
                </tr>
               <?php
          }   
          
        ?>  
        <!-----------------shopping cart details--------------------------->  
      
     </div>
     <div onclick="window.print()"><button class="btn btn-primary btn-block">Print</button></div>
</div>
</div>
 </body>
</html>