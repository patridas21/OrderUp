<html>
<header>
<title>Νέα παραγγελία-Επιλογή τραπεζιού</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
?>
<div class="inputBox">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php">
<img style="height:40px; height:40px;  " src="icons/backkey.png">
</a>
</div>
<h2>Νέα παραγγελία-Επιλογή τραπεζιού</h2>
<?php
//if (isset($_SESSION['userID'])){
include ('connect.php');
$result=mysql_query("SELECT * FROM tableinfo");
echo '<table align="center" class="table-order" border="0" >';
while($row = mysql_fetch_array($result)){
echo '<tr><td> Τραπέζι Νο.' . $row['tableNumber'].' </td><td><form method="post" action="" ><input type="submit" class="Button" name="selectedtable"  value="Επιλογή"><input type="hidden" value="'.$row['tableID'].'" name="tableID"></form>';
}
echo '</table>';
?>
</div>

<?php
if (isset($_POST['selectedtable'])){
	$id= $_POST['tableID'];
	$result = mysql_query("SELECT tableNumber FROM tableinfo WHERE tableID = '$id'");
	$row = mysql_fetch_array($result);
	$_SESSION['tablenumber'] = $row['tableNumber'];
	header("Location: neworder.php");
}
}
else{
	header("Location: Login.php");
}
?>

</body>
</html>