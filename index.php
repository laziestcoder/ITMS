<?php
include_once 'inc/header.php';
include_once 'inc/navigation.php';
?>


<div class="container width">
    <h1>Welcome to IIUC Transport Management System</h1>
    <br>
    <div class="maincontainer width">
        <div id="insertionStatus"></div>
        <div class="routePickpoint">
            <h2>Route and Pick Up Point Information</h2><br>
            <?php
            include_once 'busForm.php';
            ?>
        </div>
    </div>

    <div class="sidebar width">
        <?php
        include_once 'sidebar.php';

        ?>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>


</body>
</html>