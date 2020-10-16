<html>
<header>
<title>Νέα παραγγελία</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
$fullprice = 0;
$fullorder = '';
include ('connect.php');
$tablenum = $_SESSION['tablenumber'];
?>
<div class="inputBox">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="ordertableselect.php">
<img style="height:40px; height:40px;  " src="icons/backkey.png">
</a>
</div>
<div style="font-size:25px; display: inline-block; background-color:#ff3333; box-shadow:2px 2px 2px black; margin-bottom:10px; padding:10px;">Τραπέζι Νο.<?php echo $tablenum; ?></div>
<a href="ordercatalogue.php" style="text-decoration:none;">
<input id="textspace2" type="button" name="submit" class="Button" value="Προσθήκη Προϊόντος" >
</a>
<?php
//Prosthesi proiontos ston katalogo paragelias
if (isset($_SESSION['order'])){
$orderDet = array();
$orderDet = $_SESSION['order'];
$arrlength = count($orderDet);
echo '<table align="center"  >';
echo '<tr><td><h4>Όνομα προϊόντος</h4></td><td><h4>Ποσότητα</h4></td><td><h4>Τιμή</h4></td><td><h4>Σχόλια</h4></td></tr>';
foreach($orderDet as $key => $r) {
	foreach($r as $v){
$checkID = $v['id'];
if ($v['comments'] == ''){
	$comments = '';
}
else{
	$comments = $v['comments'];
}
$result = mysql_query("SELECT * FROM prodinfo WHERE prodID = '$checkID'");
while($row = mysql_fetch_array($result)){
echo '<tr><td> ' . $row['prodName'].' </td><td>' .$v['quantity']. '</td><td> '.$row['prodPrice'] * $v['quantity'].' </td><td> '.$comments.' </td><td><form method="post" class="myform" id="myform" name="myform" action="neworder.php"><input type="submit" name="delete" class="Button" value="Διαγραφή"><input type="hidden" value="'.$row['prodID'].'" name="pID"><input type="hidden" value="'.$v['quantity'].'" name="pID"><input type="hidden" value="'.$key.'" name="key1"></form></td></tr>';
$fullprice = $fullprice + $row['prodPrice'] * $v['quantity'];
$_SESSION['fullprice'] = $fullprice;
}
}
}
echo '<tr><td>' . '<h4>Πληρωτέο ποσό</h4>' . '</td><td>' . $fullprice ; 
echo '</table>';
if (!empty($_SESSION['order'])){
?>
<form method="get" action="saveorder.php">
<input class="Button" style="margin-top:10px;"  type="submit" name="submitorder" value="Ολοκλήρωση παραγγελίας">
</form>
<?php
}
}
else{
	echo "<h2>Νέα παραγγελία</h2></br><h4>Πατήστε <<Προσθήκη Προϊόντος>> για να συνεχίσετε</h4>";
}
}
else{
	header("Location: Login.php");
}
?>

</div>
</body>
</html>
<?php // diagrafi epilegmenou proiontos apo ton katalogo paraggelias
if (isset($_POST['delete'])){
	
	unset($orderDet[$_POST['key1']]);
	$id = $_POST['pID'];
	$result = mysql_query("SELECT prodPrice FROM prodinfo WHERE prodID = '$id' ");
	$row = mysql_fetch_array($result);
	$fullprice = $fullprice - $row['prodPrice'];
	$_SESSION['fullprice'] = $fullprice;
	$_SESSION['order'] = $orderDet;
	header("Location: neworder.php");
}


?>