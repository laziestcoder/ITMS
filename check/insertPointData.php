<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Project.php');

$pro =new Project();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$data = $_POST['value'];
	$data2 = $_POST['value1'];
	$dbtbl = $_POST['tblName'];
	$tblRow = $_POST['rowName'];
	$tblRow1 = $_POST['rowName1'];
	$check = $pro->checkPointInsert($data,$data2,$dbtbl,$tblRow,$tblRow1);
}

?>