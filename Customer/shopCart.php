<?php
   include('../connection.php');

if(isset($_SESSION['cart']))
{
    $product_id=array_column($_SESSION['cart'],'product_id');

     $result=$db->getData();
      //$db ->query("SELECT * FROM products");   

    //  $result=$db->fetchAll(PDO::FETCH_ASSOC); 

    while($row=mysqli_fetch_assoc($result))
    {
       foreach($product_id as $id){
              if($row['product_id']==$id){
                 echo "{$row[0]}-{$row[1]}-{$row[2]}-{$row[3]}";
                 $total=$total +(int)$row['price'];
                }
          }
    }
}
  
?>

<html>
  <head>
        <link rel="stylesheet" href="css/admins.css">
       <link rel="stylesheet" href="../Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  </head>
<body>
<div class="container" style="width:65%">
<div class="row">
    <div class="col-lg-6">
        <div class="row">
      
            <div class="col-md-3">
         
              <form method="POST" action="shopCart.php?action=add&id=<?php echo $row["product_id"] ?>">
              
                 <div class="product">
                 
                    <img src="<?php echo $row['image'];?>" class="img-responsive">
                    <h5 class="text-info"><?php echo $row['product_name']; ?></h5>
                    <h5 class="text-danger"><?php echo $row['price']; ?></h5>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                </div>
              </form>
            </div>  
          </div>
          </div> 
    </div>   
    <div class="col-lg-6">
       <div class="pt-4">
           <h6>PRICE DETAILS</h6>
           <hr>
           <div class="row">
           <div class="col-lg-6">
               <?php
                 if(isset($_SESSION['cart'])){
                       $count=count($_SESSION['cart']);
                       echo"<h6>Price($count items)</h6>"; 
                 }else{
                     echo "<h6>Price(0 tems)</h6>";
                 }
                
               ?>
               <h6>Delvery Charges</h6>
               <hr>
               <h6>Amount Payable<?php echo $total;?></h5>
           </div>
           </div>
       </div>
</div>       
</body>
</html>
