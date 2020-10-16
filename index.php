<html>
<header>
<title><!--TITLE--></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<?php
session_start();
?>
<body>
<div class="Button2" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a style="text-decoration: none;  color:black;" href="logout.php">Αποσύνδεση</a>
</div>
<div class="menubox">
<img  style="margin-bottom:10px;" src="icons/orderup.png">
<?php

if (isset($_SESSION['userID'])){
$sesID = $_SESSION['userID'];
if ($sesID == 1){ 
	$pagetitle = 'Order UP Κεντρικό Μενού Διαχειριστή';
?>
<h3 >Επιλογές Διαχειριστή</h3>
<a href="addproduct.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Εισαγωγή Προϊόντος" ></a>
<a href="productoptions.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Επεξεργασία/Διαγραφή Προϊόντος" ></a>
<a href="addtable.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Εισαγωγή Τραπεζιού" ></a>
<a href="tableoptions.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Επεξεργασία/Διαγραφή Τραπεζιού" ></a>
<a href="orderhistory.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Ιστορικό Παραγγελιών" ></a>

<?php
}
elseif($sesID == 2){
	$pagetitle = 'Order UP Κεντρικό Μενού Ταμία';
?>
<h3 >Επιλογές Ταμία</h3>
<a href="orderstoaccept.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Παραγγελίες" ></a>
<a href="orderhistory.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Ιστορικό Παραγγελιών"></a>
<?php }
elseif($sesID == 3){
	$pagetitle = 'Order UP Κεντρικό Μενού Σερβιτόρου';
?>
<h3 >Επιλογές Σερβιτόρου</h3>
<a href="ordertableselect.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Νέα Παραγγελία" ></a>
<a href="unpaidorders.php" style="text-decoration:none;"><input id="textspace2" type="button" name="submit" class="Button" value="Ιστορικό Παραγγελιών"></a>
<?php 
}
}
else
{
	header("Location: Login.php");
} 
?>

</div>
</body>
</html>
<?php
$pageContents = ob_get_contents ();
ob_end_clean (); 
echo str_replace ('<!--TITLE-->', $pagetitle, $pageContents);
?>