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

		<h2>Add Bus Stop Point</h2><br>

		<form action="" method="post">
			<table>
				<tr>
					<td>Route</td>
					<td>:</td>
					<td><input size="30" type="text" name="route" id="route" placeholder="Enter Your Route" />
					</td>						
				</tr>					

				<tr>
					<td>Point Name</td>
					<td>:</td>
					<td><input size="30" type="text" name="point" id="addpoint" placeholder="Enter Your Pick Up Point"/>
					</td>
				</tr>										
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="pointsubmit" id="pointsubmit" value="Add Pick Up Point" />
					</td>
				</tr>
			</table>
		</form>
		<br>
			<br>
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
