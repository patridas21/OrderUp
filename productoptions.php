<html>
<header>
<title>Επιλογές Προϊόντων</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
?>
<div class="Button2" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a style="text-decoration: none;  color:black;" href="logout.php">Αποσύνδεση</a>
</div>
<div  style="width:20%; padding:5% 5%;"  class="menubox">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php"><img style="height:40px; height:40px;  " src="icons/backkey.png"></a></div>
<div class="headertext"><h2>Μενού Επιλογών Προϊόντων</h2></div>
<?php
if (isset($_SESSION['userID'])){
include ('connect.php');
$result=mysql_query("SELECT * FROM prodinfo");
echo '<table align="center"  >';
echo '<tr><td><h4>Όνομα προϊόντος</h4></td><td><h4>Κατηγορία</h4></td><td><h4>Επιλογές</h4></td></tr>';
while($row = mysql_fetch_array($result)){
echo '<tr><td> ' . $row['prodName'].' </td><td> '.$row['prodCategory'].' </td><td><form method="get" action="productedit.php" ><input type="submit" class="Button" name="edit"  value="Επεξεργασία"><input type="hidden" value="'.$row['prodID'].'" name="prodID"></form><form method="get" action="deleteproduct.php"><input type="submit" name="delete" class="Button" value="Διαγραφή"><input type="hidden" value="'.$row['prodID'].'" name="tableID"></form>';
}
echo '</table>';
}
else{
	header("Location: Login.php");
}
?>
</div>
</body>
</html>