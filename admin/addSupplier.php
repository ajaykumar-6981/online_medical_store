<?php
  
//connectivity
  $con=mysqli_connect("localhost","root") or die("not connected");
  //select database
  mysqli_select_db($con,"sale");


    if(isset($_POST['create']))
    {
 
        $suplier_name=$_POST['suplier_name'];
        $suplier_address=$_POST['suplier_address'];
        $contact_person=$_POST['contact_person'];
        $note=$_POST['note'];
        

    $sql="INSERT INTO supliers(suplier_name,suplier_address,contact_person,note)
    VALUES('$suplier_name','$suplier_address','$contact_person','$note')";

    $qry=mysqli_query($con,$sql);

    if($qry)
    {
    ?>
         <script>                   // here script is out of php
                alert('Data Entered Successful');
        </script>

  <?php
    header('location:supplierDetail.php');
}

}

?>