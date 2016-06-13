<?php
include_once './db_functions.php';

$db = new DB_Functions(); 
$vehicleNumber= $_POST["vehicleNumber"];
$regId = $_POST["regId"];
$res = $db->insertUser($vehicleNumber, $regId);

echo "Vehicle Number ".$vehicleNumber." RegId ".$regId ;
if ($res) {
	echo "GCM Reg Id has been shared successfully with Server";
} else {			 
	echo "Error occurred while sharing GCM Reg Id with Server web app";			          
}
?>