<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Project.php');

$pro =new Project();

if($_SERVER["REQUEST_METHOD"]=="POST"){ 

	$tbl =$_POST['tblName'];
	$row =$_POST['rowName'];
	$pro->getValuedData($tbl,$row);
}
?>