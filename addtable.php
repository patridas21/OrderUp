<html>
<header>
<title>Εισαγωγή Τραπεζιού</title>
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
<div class="headertext"><h2>Εισαγωγή Τραπεζιού</h2></div>
<form method="post">
	<input id="textspace" type="text" placeholder="Αριθμός Τραπεζιού" name="tablenum">
	<input id="textspace" type="text" placeholder="Χωρητικότητα Τραπεζιού" name="tablecap"></br>
	<input class="Button" style="margin-top:10px;" type="submit" name="submit" value="Εισαγωγή">
</form>

<?php
if (isset($_POST['submit'])){
include('connect.php');
$num = $_POST['tablenum'];
$capacity = $_POST['tablecap'];
$result = mysql_query("INSERT INTO tableinfo (`tableNumber`,`tableCapacity`) VALUES (N'$num',N'$capacity')");
if ($result==0){ ?>
	<h4><font color="red">Μη επιτυχής εισαγωγή </br>Παρακαλώ προσπαθήστε ξανά</font></h4>
<?php
}
elseif ($result!=0){ ?>
	<h4><font color="green">Επιτυχής εισαγωγή Τραπεζιού</div></font></h4>
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