<html>
<header>
<title>Εισαγωγή Προϊόντος Στον Κατάλογο</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
</header>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
?>
<div class="Button2" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a style="text-decoration: none;  color:black;" href="logout.php">Αποσύνδεση</a>
</div>
<div class="inputBox">

<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="index.php"><img style="height:40px; height:40px;  " src="icons/backkey.png"></a></div>
<div class="headertext"><h2>Εισαγωγή Προϊόντος Στον Κατάλογο</h2></div>
<form method="post">
	<input id="textspace" type="text" placeholder="Όνομα Προϊόντος" name="prodname" style="width:70%;" required>
	<input id="textspace" type="number" step="0.01" min="0" placeholder="Τιμή Προϊόντος" style="width:70%;" name="prodprice" required="number">
	<textarea id="textspace" type="text" placeholder="Περιγραφή Προϊόντος" name="proddesc" style="width:70%;" value="-"></textarea>
	<select id="textspace" name="prodcateg" style="width:70%;" required>
	<option disabled selected value>Κατηγορία</option>
	<option value="Ορεκτικά">Ορεκτικά</option>
	<option value="Κυρίως Πιάτα">Κυρίως Πιάτα</option>
	<option value="Ποτά">Ποτά</option>
	<option value="Γλυκά">Γλυκά</option>
	</select></br>
	<input class="Button" style="margin-top:10px; " type="submit" name="submit" value="Εισαγωγή">
	<h4><font color="green"><div id="success"></div></font></h4>
</form>

<?php
if (isset($_POST['submit'])){
include('connect.php');
$name = $_POST['prodname'];
$price = $_POST['prodprice'];
$desc = $_POST['proddesc'];
$category = $_POST['prodcateg'];
$result = mysql_query("INSERT INTO prodinfo (`prodName`,`prodPrice`,`prodDescr`,`prodCategory`) VALUES (N'$name',N'$price',N'$desc',N'$category')");
if ($result==0){ ?>
	<h4><font color="red">Μη επιτυχής εισαγωγή </br>Παρακαλώ προσπαθήστε ξανά</font></h4>
<?php
}
elseif ($result!=0){ ?>
	<h4><font color="green">Επιτυχής εισαγωγή Προϊόντος</div></font></h4>
<?php
}
}
}
else {
	header("Location: Login.php");
}
?>

</div>
</body>
</html>

