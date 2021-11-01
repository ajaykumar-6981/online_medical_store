<html>
<head>
     <title>Sales</title>
     <link rel="stylesheet" href="../css/sale.css">
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
               <li><a href="medicineDetail.php">MEDICINE DETAILS</a></li>
               <li><a href="customerDetail.php">CUSTOMER DETAILS</a></li>
               <li><a href="#" class='active'>SALE</a></li>
               <li><a href="./logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div class="banner">
           <img src="../images/medical5.jpg"/>
        </div>

    <div class="col-12">
        <div class="card">
         
            <table class="table table-hover table-bordered">
                <tr class="bg-dark text-white  text-center">
                    <th>product_Name</th>
                    <th>Category/Description</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>profit</th>
                    <th>Action</th>
                </tr>
        
                <tr class="text-center">
                    <td><?php //echo $res['product_name']; ?></td>
                    <td><?php// echo $res['price']; ?></td>
                    <td><?php //echo $res['profit']; ?></td>
                    <td class='text-left'>Total amount</td>
                    <td class='text-left'>Total profit</td>
                    <td><?php //echo $res['expiry_date']; ?></td>
                </tr>
                <tr class="text-center">
                    <td>TOTAL</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php //echo $res['qty_sold']; ?></td>
                    <td><?php //echo $res['expiry_date']; ?></td>
                </tr>
            </table>
        </div>
        <button class="btn btn-primary btn-block" type="submit" name="save">Save</button>

    </div>
</div>    
</body>           
</html>    