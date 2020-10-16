<html>
<header>
<title>Επεξεργασία προϊόντος</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
include ('connect.php');
$tID = $_GET['prodID'];
$result = mysql_query("SELECT * FROM prodinfo WHERE prodID = '$tID'");
$row = mysql_fetch_assoc($result);
?>
<div class="Button2" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a style="text-decoration: none;  color:black;" href="logout.php">Αποσύνδεση</a>
</div>
<div class="inputBox">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php"><img style="height:40px; height:40px;  " src="icons/backkey.png"></a></div>
<div class="headertext"><h2>Επεξεργασία Προϊόντος</h2></div>
<form method="post">
	Όνομα προϊόντος:<input id="textspace" type="text"  placeholder="Όνομα Προϊόντος" name="prodname" value="<?php echo $row['prodName']; ?>" required>
	Τιμή προϊόντος:<input id="textspace" type="number" step="0.01" min="0" placeholder="Τιμή Προϊόντος" name="prodprice" required="number" value="<?php echo $row['prodPrice']; ?>">
	Περιγραφή προϊόντος:<textarea id="textspace" type="text" placeholder="Περιγραφή Προϊόντος" name="proddesc" required><?php echo $row['prodDescr']; ?></textarea>
	<select id="textspace" name="prodcateg" required>
	<option disabled selected value>Κατηγορία</option>
	<option value="Ορεκτικά" <?php if($row['prodCategory'] == "Ορεκτικά") echo "selected='selected'"; ?>>Ορεκτικά</option>
	<option value="Κυρίως Πιάτα" <?php if($row['prodCategory'] == "Κυρίως Πιάτα") echo "selected='selected'"; ?>>Κυρίως Πιάτα</option>
	<option value="Ποτά" <?php if($row['prodCategory'] == "Ποτά") echo "selected='selected'"; ?>>Ποτά</option>
	<option value="Γλυκά" <?php if($row['prodCategory'] == "Γλυκά") echo "selected='selected'"; ?>>Γλυκά</option>
	</select></br>
	<input class="Button" style="margin-top:10px;" type="submit" name="submit" value="Αποθήκευση Αλλαγών">
	<h4><font color="green"><div id="success"></div></font></h4>
</form>
</div>
<?php 
if (isset($_POST['submit'])){
	$pname = $_POST['prodname'];
	$pprice = $_POST['prodprice'];
	$pdesc = $_POST['proddesc'];
	$pcateg = $_POST['prodcateg'];
	$result=mysql_query("UPDATE prodinfo SET prodName=N'$pname' , prodPrice='$pprice', prodCategory=N'$pcateg' , prodDescr=N'$pdesc' WHERE prodID = '$tID'");
	if ($result){
		header("Location: productoptions.php");
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