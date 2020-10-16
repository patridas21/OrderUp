<html>
<header>
<title>Ιστορικό Παραγγελιών</title>
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
<h3>Αποπληρωμένες Παραγγελίες </br> Ιστορικό Παραγγελιών</h3>
<table align="center">
<thead><th>Κωδικός Παραγγελίας</th><th>Αριθμός Τραπεζιού</th><th>Λεπτομέρειες Παραγγελίας</th><th>Ημερομηνία</th><th>Πληρωτέο Ποσό</th></thead>
<?php
$result = mysql_query("SELECT * FROM orderinfo WHERE orderPaid = 1");
while($row = mysql_fetch_array($result)){ 
	$details = $row['orderDetails'];
	$info = explode(",", $details);
    $arrlenght = count($info);
	?>
<tr><td><?php echo $row['orderID'] ; ?></td><td><?php echo $row['tableNumber']; ?></td><td><table style="width:100%;" align="center"><?php showDetails($info); ?></table></td><td><?php echo $row['orderTimestamp'] ; ?></td><td><?php echo $row['orderTotal'] ; ?></td></tr>

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
</body>
</html>



<?php
function showDetails($info){
	$arrlenght = count($info);
	for ($x=0; $x < $arrlenght; $x=$x + 3)
	{
	if (isset($info[$x+1])){
		$pid = $info[$x+1];
		$result = mysql_query("SELECT * FROM prodinfo WHERE prodID = '$pid'");
		$row = mysql_fetch_array($result);
	if ($info[$x+2] == '0'){
	    $comments = '';
    }
    else{
	    $comments =  $info[$x + 2];
    }
		echo "<tr><td>" . $info[$x] . " " . "* <b>" . $row['prodName'] ."</b></br> ". $comments . "</td></tr>" ;
	}
}
}
?>