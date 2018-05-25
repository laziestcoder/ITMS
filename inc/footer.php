 <div class ="footer " style="border: 1px;border-color: black; border-style: solid;">
			<h4>Copyright &copy; <?php echo date("Y");?></h4>
     Today is
     <?php
     //$timezone = date_default_timezone_get();
     //echo "The current server timezone is: " . $timezone;
     date_default_timezone_set("Asia/Dhaka");
     echo date("l, d-m-Y");
     echo date(" h:i:s a",time()); ?>
     <br/><br/><br/>
     <div id=""></div>

</div>

<?php
include_once 'dateAndTime.php';
?>