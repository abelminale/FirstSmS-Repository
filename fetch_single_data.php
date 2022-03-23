<?php

//fetch_single_data.php


$username = 'wodametalnet_smsadmin';
$password = 'Woda@metal';
$connection = new PDO( 'mysql:host=localhost;dbname=wodametalnet_sms', $username, $password );


if(isset($_POST["id"]))
{
	
 $query = "
 SELECT * FROM sales_record WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connection->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>
