<?php

include('../connection.php');

$sql = $db ->query("SELECT * FROM customer");       //$db is database

$result=$sql->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0){
     foreach($result as $row){
         echo "{$row['customer_name']} <br>";
     }
}else{
    echo "no record found";
}

//while($row=$sql->fetch(PDO::FETCH_OBJ)){             //here row wll fetch data in array 1 by 1
 //  echo "{$row->customer_id}-{$row->customer_name}-{$row->address}-{$row->contact}";
 //  echo "<pre>";
 //  print_r($row);
 //  echo "</pre>";
//}

?>