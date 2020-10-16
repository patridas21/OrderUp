<html>
<header>
<title>Διαγραφή Τραπεζιού</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
include ('connect.php');
$tID = $_GET['tableID'];
$result = mysql_query("SELECT * FROM tableinfo WHERE tableID = '$tID'");
$row = mysql_fetch_assoc($result);
?>
<div class="inputBox">
	<h3>Eίστε σίγουροι πως θέλετε να διαγράψετε το Τραπέζι Νο.<?php echo $row['tableNumber'] ?>; </h3>
	<form method="post">
	<input type="submit" class="Button" name="yes" value="ΝΑΙ">
	<input type="submit" class="Button" name="no" value="ΟΧΙ">
	</form>
</div>
<?php
if (isset($_POST['yes'])){
	
		mysql_query("DELETE FROM tableinfo WHERE tableID = '$tID'");
		header("Location: tableoptions.php ");
	}
	elseif(isset($_POST['no'])){
		header("Location: tableoptions.php ");
	}
}
else{
	header("Location: Login.php ");
}
?>
</body>
</html>