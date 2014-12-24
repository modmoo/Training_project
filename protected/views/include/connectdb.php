<?php
$username = "root";
$password = "admin";
$hostname = "localhost"; 
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) or die(mysql_error());
mysql_query ('SET NAMES utf8');
$selected = mysql_select_db("training_db",$dbhandle) or die(mysql_error());
?>