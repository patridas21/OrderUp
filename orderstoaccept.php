<?php
$page = $_SERVER['PHP_SELF'];    
$sec = "10";
?>
<html>
<header>
<title>Νέες Παραγγελίες</title>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">   <!--refresh meta apo 10 sec -->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
<link href='specialtables.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
include ('connect.php');
?>

<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php">
<img style="height:40px; height:40px;  " src="icons/backkey.png">
</a>
</div>
<div class="tablecontainer"></br>
<h3>Νέες Παραγγελίες</h3>
<div>Επιλέξτε Παραγγελία για περισσοτερες λεπτομέριες</div></br>
<a href="orderhistory.php"><input type="button" style="margin-bottom:10px;" value="Πλήρες Ιστορικό" class="Button"></a>
<div style="width:auto; padding:auto; left:50px;">
<table align="center">
<thead><th>Κωδικός Παραγγελίας</th><th>Αριθμός Τραπεζιού</th><th>Ημερομηνία</th><th>Πληρωτέο Ποσό</th><th>Περισσότερα</th></thead>
<?php
$result = mysql_query("SELECT * FROM orderinfo WHERE orderAccepted = 0");
while($row = mysql_fetch_array($result)){ 
	$details = $row['orderDetails'];
	$info = explode(",", $details);
    $arrlenght = count($info);
	?>
<tr><td><?php echo $row['orderID'] ; ?></td><td><?php echo $row['tableNumber']; ?></td><td><?php echo $row['orderTimestamp'] ; ?></td><td><?php echo $row['orderTotal'] ; ?></td><td><form method="post" action="acceptorder.php"><input type="submit" class="Button" name="submitpaid" value="Λεπτομέριες"><input type="hidden" name="neworderID" value="<?php echo $row['orderID'];?>"></form></td></tr>

<?php
}
}
else{
	header("Location: Login.php");
}
?>
</table>
</br>
</div>
</div>
</body>
</html>


