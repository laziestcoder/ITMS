<?php
include_once 'inc/header.php';
include_once 'inc/navigation.php';
$id = $_GET['id'];
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/classes/Project.php');
$pro = new Project();
$details = $pro->getBusRouteInfo($id);
?>


<div class="container width">
    <h1>Welcome to IIUC Transport Management System</h1>
</div>

<?php include_once 'inc/footer.php'; ?>


</body>
</html>
