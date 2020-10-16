<html>
<header>
<title>Ολοκλήρωση Παραγγελίας</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<div class="inputBox">
<font style="font-size:25px;"><b>Λεπτομέριες Παραγγελίας</b></font>
<?php
include('connect.php');
session_start();
if (isset($_SESSION['userID'])){
$fullorder = '';
$orderDet = $_SESSION['order'];
$finalprice = $_SESSION['fullprice'];
$tablenum = $_SESSION['tablenumber'];
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
$fullorder .= $v['quantity'] .",". $checkID .",".$v['comments']."," ;
echo '<tr><td> ' . $row['prodName'].' </td><td> '.$v['quantity'].' </td><td> '.$row['prodPrice'].' </td><td> '.$comments.' </td></tr>';
}
}
}
echo '<tr><td>' . '<h4>Πληρωτέο ποσό</h4>' . '</td><td>' . $finalprice .'</td></tr>'; 
echo '</table>';
$result = mysql_query("INSERT INTO orderinfo (`orderDetails`,`orderTotal`,`tablenumber`) VALUES (N'$fullorder',N'$finalprice' ,'$tablenum')");
if($result){
	$result2 = mysql_query("SELECT * FROM orderinfo ORDER BY orderID DESC LIMIT 1 ");
	$row2 = mysql_fetch_array($result2);
	$orderID = $row2['orderID'];
	unset($_SESSION['order']);
	unset($_SESSION['fullprice']);
	unset($_SESSION['tablenumber']);
	?>
    
   
   <img src="icons/greentick.png" style="width:75px; height:75px;">
   <h3>Η Παραγγελία Ολοκληρώθηκε με επιτυχία!</h3>
   <h4>Κωδικός Παραγγελίας:<?php echo $orderID; ?> </h4>
   <a href="index.php" style="text-decoration:none;">
   <input id="textspace2" type="button" name="submit" class="Button" value="Επιστροφή Στο Αρχικό Μενού" >
   </a>
 
<?php
}

else{
?>
	<div class="inputBox">
   <img src="icons/exclamation.png" style="width:75px; height:75px;">
   <h3>Kάτι πήγε λάθος!!!</h3>
   <a href="index.php" style="text-decoration:none;">
   <input id="textspace2" type="button" name="submit" class="Button" value="Επιστροφή Στο Αρχικό Μενού" >
   </a>
   </div>
<?php
}
}
else{
   header("Location: Login.php");
}

?>
  </div></body></html>