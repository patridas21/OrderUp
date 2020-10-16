<html>
<header>
<title>Επεξεργασία Τραπεζιού</title>
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
<div class="Button2" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a style="text-decoration: none;  color:black;" href="logout.php">Αποσύνδεση</a>
</div>
<div class="inputBox">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php"><img style="height:40px; height:40px;  " src="icons/backkey.png"></a></div>
<div class="headertext"><h2>Επεξεργασία Τραπεζιού</h2></div>
<form method="post">
	<p><font>Αριθμός Τραπεζιού:</font><input id="textspace" type="text" placeholder="Αριθμός Τραπεζιού" name="tablenum" value="<?php echo $row['tableNumber']; ?>" required>
	<font>Χωρητικότητα:</font><input id="textspace" type="text" placeholder="Χωρητικότητα Τραπεζιού" name="tablecap" value="<?php echo $row['tableCapacity']; ?>" required></br></p>
	<input class="Button" style="margin-top:10px;" type="submit" name="submit" value="Αποθήκευση Αλλαγών">
</form>
</div>
<?php 
if (isset($_POST['submit'])){
	$tablenumber = $_POST['tablenum'];
	$tablecapacity = $_POST['tablecap'];
	$result=mysql_query("UPDATE tableinfo SET tableNumber=N'$tablenumber' , tableCapacity = N'$tablecapacity' WHERE tableID = '$tID'");
	if ($result){
		header("Location: tableoptions.php");
	}
	else{
		echo "<script>javascript: alert('Οι αλλαγές δεν αποθηκεύτικαν')></script>";
	}
}
} 
else{
	header("Location: login.php");
}
?>
</body>
</html>