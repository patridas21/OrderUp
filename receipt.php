<html>
<header>
<title>Απόδειξη Παραγγελίας</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
if (isset($_GET['accepted'])){
	$ID = $_GET['oID'];
    include ('connect.php');
	mysql_query("UPDATE orderinfo SET orderAccepted = '1' WHERE orderID = '$ID'");
	$result = mysql_query("SELECT * FROM orderinfo WHERE orderID = '$ID'");
    $row = mysql_fetch_array($result);
    $timestamp = $row['orderTimestamp'];
    $datetime = explode(" ",$timestamp);
    $details = $row['orderDetails'];
    $info = explode(",", $details);
	?>
<div class="tablecontainer" style="padding:30px;">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php">
<img style="height:40px; height:40px;  " src="icons/backkey.png">
</a>
</div>
<font size="6" style="color:green;">Η Παραγγελία Έγινε Αποδεκτή!</font></br>
<font size="6">Παραγγελία:<?php echo $ID ; ?></font></br>
Τραπέζι Νο. <?php echo $row['tableNumber']; ?></br>
Ώρα αποστολής : <?php echo $datetime['1']; ?></br>
Λεπτομέριες : <table><th>Προϊόντα</th><th>Σχόλια</th><th>Τιμή</th><?php showDetails($info); ?><tr><td style="background-color:grey;"><font size="5"><b>Σύνολο</b></font></td><td style="background-color:grey;"><font size="5"><b><?php echo $row['orderTotal']; ?>&euro;</b></font></td></tr></table>
<div style="padding:20px;"></div>
<a href="orderstoaccept.php"><input type="button" class="Button" value="Επιστροφή"></a>
</div>
</body>
</html>
<?php
}
elseif(isset($_GET['rejected'])){
	$ID = $_GET['oID'];
	mysql_query("DELETE FROM orderinfo WHERE orderID = '$ID'");
	header("Location: orderstoaccept.php");
}
}
else{
	header("Location: Login.php");
}
?>

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
		echo "<tr><td>" . $info[$x] . " " . "* <b>" . $row['prodName'] ."</b></td><td> ". $comments . "</td><td>" . $row['prodPrice'] * $info[$x] ."&euro;</td></tr>" ;
	}
}
}
?>

<style>
table{
	width:100%;
	
	border:solid grey 2px;
	background-color: grey;
}
td{
	border-style: none solid none none grey;
	
}
tr{
	border:none;
	
}
</style>