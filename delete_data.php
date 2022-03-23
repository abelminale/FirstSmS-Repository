<?php

//delete_data.php


$username = 'wodametalnet_smsadmin';
$password = 'Woda@metal';
$connect = new PDO( 'mysql:host=localhost;dbname=wodametalnet_sms', $username, $password );


if(isset($_POST["id"]))
{
 $query = "
 DELETE FROM sales_record 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>