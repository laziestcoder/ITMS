<?php 
include_once 'inc/header.php'; 
include_once 'inc/navigation.php';
?>


<div class="container width">
	<h1 >Welcome to ITMS Admin Panel</h1>
	<br>
	<div class="maincontainer width">
		<div id="insertionStatus"></div>
		<div class="routePickpoint">
		<h2>Add Pick Up Time</h2><br>
		<form action="" method="post">
			<table>
				<tr>
					<td>Pick Up Time</td>
					<td>:</td>
					<td><input size="30" type="time" name="time" id="addpicktime" placeholder="Enter Your Route" />
					</td>						
				</tr>										
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="picksubmit" id="picktimesubmit" value="Add Pick Up Time" /></td>
				</tr>
			</table>
		</form>
		<br>
		<br>
            <?php
            include_once 'adminTask.php';
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

