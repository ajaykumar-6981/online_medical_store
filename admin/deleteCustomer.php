<?php

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'sale');

$id=$_GET['id'];

$q="delete from customer where customer_id=$id";

mysqli_query($con,$q);
header('location:customerDetail.php');
?>