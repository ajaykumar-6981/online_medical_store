<?php
/* Database config */

$db_name		= 'mysql:host=localhost;dbname=sale';
$db_user		= 'root';
$db_password		= '';


/* End config */

$db = new PDO($db_name, $db_user, $db_password);


?>