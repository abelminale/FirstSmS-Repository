<?php

//fetch.php


//database_connection.php

$username = 'wodametalnet_smsadmin';
$password = 'Woda@metal';
$connection = new PDO( 'mysql:host=localhost;dbname=wodametalnet_sms', $username, $password );

$query = '';
$output = array();
$query .= "SELECT * FROM sales_record ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE Project_No LIKE "%'.$_POST["search"]["value"].'%" OR RFQ LIKE "%'.$_POST["search"]["value"].'%" OR Document LIKE "%'.$_POST["search"]["value"].'%" OR Contract_Status LIKE "%'.$_POST["search"]["value"].'%" OR Contract_Amount LIKE "%'.$_POST["search"]["value"].'%"OR Delivery_Due_Date LIKE "%'.$_POST["search"]["value"].'%" OR Collected_Amount LIKE "%'.$_POST["search"]["value"].'%" OR Manufacturing LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["Project_No"];
 $sub_array[] = $row["RFQ"];
 $sub_array[] = $row["Quotation_Status"];
 $sub_array[] = $row["Contract_Status"];
 
 
 $sub_array[] = $row["Contract_Signed_Date"];
 
  $sub_array[] = $row["Manufacturing"];
   $sub_array[] = $row["Delivery_Due_Date"];
     $sub_array[] = $row["Contract_Amount"];
	   $sub_array[] = $row["Collected_Amount"];
	     $sub_array[] = $row["Document"];
		 
 $sub_array[] = '<button type="button" name="view" id="'.$row["id"].'" class="btn btn-primary btn-xs view">View</button>';
 $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}

function get_total_all_records($connection)
{
 $statement = $connection->prepare("SELECT * FROM sales_record");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = array(
 "draw" => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($connection),
 "data"    => $data
);
echo json_encode($output);
?>

