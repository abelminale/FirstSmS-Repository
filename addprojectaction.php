
<?php 
     include 'connection.php';

    session_start();
	$ItemName = $_POST['ItemName'];
	if($ItemName >0)  
 {  
      for($i=0; $i<$ItemName; $i++)  
      {  
   
	$INSERTquery="INSERT INTO `item`(`Item_Name`, `Project_ID`, `UoM`, `Qty`, `Item_Description`)VALUES('".mysqli_real_escape_string($connection,$_POST["ItemNameS"]["$i"]),."''".mysqli_real_escape_string($connection,$_POST["ProjectNo"]["$i"]),."' '".mysqli_real_escape_string($connection,$_POST["UoMS"]["$i"])."' '".mysqli_real_escape_string($connection,$_POST["qtyS"]["$i"])."', '".mysqli_real_escape_string($connection,$_POST["ItemDescS"]["$i"])."')";
$res1= mysqli_query($connection,$INSERTquery);



	  }
 }
	
?>