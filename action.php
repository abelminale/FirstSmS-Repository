<?php  
//action.php
include_once("connection.php");

$input = filter_input_array(INPUT_POST);

$Project_No = mysqli_real_escape_string($connection, $input["Project_No"]);
$RFQ = mysqli_real_escape_string($connection, $input["RFQ"]);
$Quotation_Status = mysqli_real_escape_string($connection, $input["Quotation_Status"]);

$Contract_Status = mysqli_real_escape_string($connection, $input["Contract_Status"]);


$Contract_Signed_Date = mysqli_real_escape_string($connection, $input["Contract_Signed_Date"]);
$Manufacturing = mysqli_real_escape_string($connection, $input["Manufacturing"]);
$Delivery_Due_Date = mysqli_real_escape_string($connection, $input["Delivery_Due_Date"]);
$Contract_Amount = mysqli_real_escape_string($connection, $input["Contract_Amount"]);
$Collected_Amount = mysqli_real_escape_string($connection, $input["Collected_Amount"]);
$Document = mysqli_real_escape_string($connection, $input["Document"]);
if($input["action"] === 'edit')
{
	


	
 $query = "
 UPDATE sales_record 
 SET Project_No = '".$Project_No."', 
 RFQ = '".$RFQ."', 
  Quotation_Status = '".$Quotation_Status."' ,
  Contract_Status = '".$Contract_Status."' ,
  Contract_Signed_Date = '".$Contract_Signed_Date."' ,
    Manufacturing = '".$Manufacturing."' ,
	  Delivery_Due_Date = '".$Delivery_Due_Date."' ,
	    Contract_Amount = '".$Contract_Amount."' ,
		  Collected_Amount = '".$Collected_Amount."' ,
  Document = '".$Document."' 
  
 WHERE id = '".$input["id"]."'
 ";


 mysqli_query($connection, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM sales_record 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connection, $query);
}

echo json_encode($input);

?>