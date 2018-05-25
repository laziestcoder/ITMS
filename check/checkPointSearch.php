<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Project.php');

$pro =new Project();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $keyName = $_POST['keyName'];
    $db_table=$_POST['tblName'];
    $row_name=$_POST['rowName'];
    $route = $pro->autoPoint($keyName,$db_table,$row_name);
    //print_r($route);
}

?>