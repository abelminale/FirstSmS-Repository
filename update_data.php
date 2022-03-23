<?php

//update_data.php


$username = 'wodametalnet_smsadmin';
$password = 'Woda@metal';
$connect = new PDO( 'mysql:host=localhost;dbname=wodametalnet_sms', $username, $password );



 
 if($_POST['action'] == $_POST['edit'])
 {
  $data = [
   ':Project_No'   => $_POST['Project_No'],
   ':RFQ'   => $RFQ,
   ':Quotation_Status'  => $_POST['Quotation_Status'],
   ':Contract_Amount'  => $_POST['Contract_Amount'],
   ':Contract_Signed_Date' => $_POST['Contract_Signed_Date'],
   ':Manufacturing'   => $_POST['Manufacturing'],
   ':Collected_Amount'  => $_POST['Collected_Amount'],
    ':Contract_Amount'  => $_POST['Contract_Amount'],
	 ':Document'  => $_POST['Document'],
	
	  ':Delivery_Due_Date'  => $_POST['Delivery_Due_Date'],
   ':id'   => $_POST["id"]
  ];

  $query = "
  UPDATE sales_record 
 
  SET RFQ = :RFQ,
   Project_No =:Project_No,
  Quotation_Status = :Quotation_Status,
  Contract_Status = :Contract_Status, 
  Contract_Signed_Date= :Contract_Signed_Date,
  Manufacturing = :Manufacturing, 
  Contract_Amount = :Contract_Amount, 
  Collected_Amount = :Collected_Amount,
  Document = :Document,
  Delivery_Due_Date = :Delivery_Due_Date,
 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
   echo json_encode($_POST);
 }
 if($_POST['action'] == $_POST['delete'])
 {
	 
	 $query = "
 DELETE FROM sales_record 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute(); 
 echo json_encode($_POST);
 

}

?>