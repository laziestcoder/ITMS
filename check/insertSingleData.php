<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Project.php');

$pro =new Project();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$data = $_POST['value'];
	$dbtbl = $_POST['tblName'];
	$tblRow = $_POST['rowName'];
	$check = $pro->checkSingleInsert($data,$dbtbl,$tblRow);
}

?>