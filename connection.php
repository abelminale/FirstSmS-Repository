<?php 

 $connection=mysqli_connect('localhost','root','','wodametalnet_sms');
if ($connection -> connect_errno) {
  echo "Failed to connect to MySQLi: " . $connection -> connect_error;
  
}

?>