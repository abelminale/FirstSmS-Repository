<?php  
//action.php
include_once("connection.php");

$input = filter_input_array(INPUT_POST);

$Project_ID = mysqli_real_escape_string($connection, $input["Project_ID"]);
$Item_Name = mysqli_real_escape_string($connection, $input["Item_Name"]);
$UoM = mysqli_real_escape_string($connection, $input["UoM"]);

$Qty = mysqli_real_escape_string($connection, $input["Qty"]);


$Item_Description = mysqli_real_escape_string($connection, $input["Item_Description"]);

if($input["action"] === 'edit')
{
	


	
 $query = "
 UPDATE item 
 SET Project_ID = '".$Project_No."', 
 Item_Name = '".$Item_Name."', 
  UoM = '".$UoM."' ,
  Qty = '".$Qty."' ,
  Item_Description = '".$Item_Description."' 
   
 WHERE id = '".$input["id"]."'
 ";


 mysqli_query($connection, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM item 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connection, $query);
}

echo json_encode($input);

?>