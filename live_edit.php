
<?php
include_once("connection.php");
$input = filter_input_array(INPUT_POST);
header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {
    $connection->query("UPDATE sales_record SET Project_No='" . $input['Project_No'] . "', RFQ='" . $input['RFQ'] . "', Quotation_Status='" . $input['Quotation_Status'] . "', Contract_Status='" . $input['Contract_Status'] . "', 
	Contract_Signed_Date='" . $input['Contract_Signed_Date'] . "' , Manufacturing='" . $input['Manufacturing'] . "' , Delivery_Due_Date='" . $input['Delivery_Due_Date'] . "'  
, Contract_Amount='" . $input['Contract_Amount'] . "', Collected_Amount='" . $input['Collected_Amount'] . "', Document='" . $input['Document'] . "'	WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'delete') {
    $connection->query("UPDATE sales_record SET deleted=1 WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'restore') {
    $connection->query("UPDATE sales_record SET deleted=0 WHERE id='" . $input['id'] . "'");
}

connection_close($connection);

echo json_encode($input);




?>