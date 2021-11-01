<?php
   $con=mysqli_connect('localhost','root');
   mysqli_select_db($con,'sale');
   if(!$con){
       die("Connection Faild:" .mysqli_connect_error());  
   }
   if(isset($_POST['search']))
   {
       $txtStartDate=$_POST['txtStartDate'];
       $txtEndDate=$_POST['txtEndDate'];

       $query=mysqli_query($con,"SELECT customer_name FROM sales_order WHERE date BETWEEN '$txtStartDate' AND '$txtEndDate' ORDER BY date");
       $count=mysqli_num_rows($con,$query);
   }

?>
<html>
  <head>
  <link rel="stylesheet" href="css/admins.css">
       <link rel="stylesheet" href="Source/bootstrap-4.0.0-dist/css/bootstrap.min.css">
   
  </head>
  <body>
     <form method='POST'>
     <center><strong>From : <input type="date" name="txtStartDate">
        To:<input type="date" name="txtEndDate">
        <p>
        <input type="submit" name="search" value="Search Medicine...">
        </p>
        </strong></center>   
    <?php
     if($count == "0"){
           echo '<h2>NO Record found !</h2>' ;
         }else{
             while($row=mysqli_fetch_array($query)){
                 $result=$row['customer_name'];
                 $output='<h2>'.$result.'</h2>';
                 echo $output;
             }
         }
    ?>    
     </form>
  </body>
</html>