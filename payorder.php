<?php

if (isset($_POST['submitpaid'])){
	include ('connect.php');
	$ID = $_POST['paidorderID'];
	mysql_query("UPDATE orderinfo SET `orderPaid` = '1' WHERE orderID = '$ID'");
	header("Location: unpaidorders.php");
}
?>