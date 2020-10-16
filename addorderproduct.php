<html>
<head>
<title>Προσθήκη Προϊόντος</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
<script>
var plus = function() {
   var count = Number(document.getElementById("count").value); 
   count++;
   document.getElementById("count").value = count;
   document.getElementById("quantity").value = count;
  }
var minus = function(){
	var count = Number(document.getElementById("count").value); 
	if (count > 1) {
		
		count--;
        document.getElementById("count").value = count;
        document.getElementById("quantity").value = count;
      }  
}
</script>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['userID'])){
include ('connect.php');
?>

<div class="inputBox" style="">
<div class="Buttonback" style="box-shadow:5px 5px 5px black; right:20px; position:fixed;">
<a href="ordercatalogue.php">
<img style="height:40px; height:40px;  " src="icons/backkey.png">
</a>
</div>
<?php
$newprodID = $_POST['newID'];
$result=mysql_query("SELECT * FROM prodinfo WHERE prodID = '$newprodID'");
$row = mysql_fetch_array($result);
?>
<font size="5"><b>Προσθήκη προϊόντος στον κατάλογο</b></font>
<table align="center">
<tr><td><font style="font-size:20px;">Όνομα:</font></td><td><?php echo $row['prodName']; ?></td></tr></br>
<tr><td><font style="font-size:20px;">Τιμή:</font></td><td><?php echo $row['prodPrice']; ?></td></tr></br>
<tr><td><font style="font-size:20px;">Περιγραφή:</font></td><td><?php echo $row['prodDescr']; ?></td></tr></br>
</table>
<font style="font-size:20px;">Ποσότητα:</font></br>
<div id="input_div">
    <input type="button" value="-" id="minus" onclick="minus()">
    <input type="text" style="width:30px; text-align: center;" size="8" value="1" name="count"  id="count">
    <input type="button" value="+" id="plus" onclick="plus()">
</div>
</br>
<form type="get" action="#">
<textarea name = "prodComments" id="textspace" type="text" placeholder="Σχόλια"></textarea></br>
<input type="hidden" id="quantity" name="quantity" value="1">
<input type="hidden" name="ID" value="<?php echo $newprodID; ?>"></br>
<input class="Button" style="margin-top:10px;" type="submit" name="submitproduct" value="Προσθήκη">
</form>

<?php
if (!isset($_SESSION['order'])){
	
	$_SESSION['order'] = array();
	$_SESSION['itt'] = 0;
}
//prosthesi proiontos kai leptomeriwn
if (isset($_GET['submitproduct'])){
$prodID = $_GET['ID'];
$comments = $_GET['prodComments'];
if ($_GET['prodComments'] == ''){
	$comments = 0;
}
$addtoorder = array('data' => array('id' => $prodID ,'quantity' => $_GET['quantity'] , 'comments' => $comments));
array_push($_SESSION['order'] , $addtoorder);
$_SESSION['itt'] = $_SESSION['itt'] + 1;
if (isset($_SESSION['ordereditID'])){
header("Location: editorder.php");
}
else{
header("Location: neworder.php");
}
}
}
else{
  header("Location: Login.php");
}
?>
</div>
</body>
</html>

