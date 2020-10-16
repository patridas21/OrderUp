<html>
<header>
<title>Order UP Login Page</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='pagestyle.css?' rel='stylesheet' type='text/css'>
<script>
function valid()
{
var user=document.login.user.value;
var user=user.trim();
var pass=document.login.pass.value;
if(user == '')
{
document.getElementById('error').innerHTML="Please Enter Username";
return false;
}
if(pass == '')
{
document.getElementById('error').innerHTML="Please Enter Password";
return false;
}
}
</script>
</header>
<body>
<div class="LoginBox">
<img  style="margin-bottom:10px;" src="icons/orderup.png">
<form name="login" method="post" id="loginform" action="" onsubmit="return valid()">
<input class="textspace" id="username" type="text" placeholder="Username" name="user" ></br>
<input class="textspace" id="password" type="password" placeholder="Password" name="pass" ></br></br>
<input id="textspace" type="submit" name="submit" class="Button" value="Log In" >
<h4><font color="red"><div id="error"></div></font></h4>
</form>
</div>
</body>
</html>

<?php
include('connect.php');
if (isset($_POST['submit'])){
$username = $_POST['user'];
$password = $_POST['pass'];
$auth = false;
$result = mysql_query("SELECT * FROM userinfo");
while($row = mysql_fetch_array($result))
{
	if($username == $row['Username'] && $password == $row['Password'])
	{
		$auth = true;
		$sesID = $row['ID'];
	}

}
if ($auth == true)
{
	session_start();
	$_SESSION['userID'] = $sesID;
    header("Location: index.php ");
}
}
?>
