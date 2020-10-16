
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'OrderUP';

$conn = mysql_connect($dbhost , $dbuser , $dbpass);
mysql_select_db($db);
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
?>
