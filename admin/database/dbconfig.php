<?php 

$server_name="localhost";
$db_username="root";
$db_password="";
$db_name="adminpanel";

$connction=mysqli_connect($server_name,$db_username,$db_password);
$dbconfig=mysqli_select_db($connction,$db_name);
?>