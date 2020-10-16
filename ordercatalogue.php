<html>
<header>
<title>Νέα παραγγελία</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
include ('connect.php');
if (isset($_SESSION['userID'])){
if (!isset($_POST['selected'])){
	$_POST['selected'] = "Ορεκτικά";
}
?>

<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="neworder.php">
<img style="height:40px; height:40px;  " src="icons/backkey.png">
</a>
</div>
<div class="tablecontainer"></br>
<h2>Κατάλογος Προϊόντων</h2>
<font size="4">Επιλογή κατηγορίας:</font>
<form  method="post">
<select id="textspace" name="selected" onchange="this.form.submit();">
<option value="Ορεκτικά"  <?php if($_POST['selected'] == "Ορεκτικά") echo "selected='selected'"; ?>>Ορεκτικά</option>
<option value="Ποτά" <?php if($_POST['selected'] == "Ποτά") echo "selected='selected'"; ?>>Ποτά</option>
<option value="Κυρίως Πιάτα" <?php if($_POST['selected'] == "Κυρίως Πιάτα") echo "selected='selected'"; ?>>Κυρίως Πιάτα</option>
<option value="Γλυκά" <?php if($_POST['selected'] == "Γλυκά") echo "selected='selected'"; ?>>Γλυκά</option>
</select>
</form>
<?php
if (isset($_POST['selected'])){
$select = $_POST['selected'];
$result=mysql_query("SELECT * FROM prodinfo WHERE prodCategory = N'$select'");
echo '<table align="center"  >';
echo '<thead><th>Όνομα προϊόντος</th><th>Τιμή</th><th>Επιλογές</th></thead>';
while($row = mysql_fetch_array($result)){
echo '<tr><td> ' . $row['prodName'].' </td><td> '.$row['prodPrice'].'&euro; </td><td><form method="post" action="addorderproduct.php" ><input type="submit" class="Button" name="ADD"  value="ADD"><input type="hidden" value="'.$row['prodID'].'" name="newID"></form>';
}
echo '</table></br>';

}
}
else{
	header("Location: Login.php");
}
?>
</div>
</body>
</html>
