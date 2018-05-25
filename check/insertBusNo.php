<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Project.php');

$pro =new Project();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $route = $_POST['route'];
    $point = $_POST['point'];
    $day = $_POST['day'];
    $dbtbl = $_POST['tbl'];
    $check = $pro->busInfoInsert($route,$day,$point,$dbtbl);
}

?>