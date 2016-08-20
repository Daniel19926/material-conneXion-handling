<?php
$DB_host = "mysql.hostinger.se";
$DB_user = "u597716772_1";
$DB_pass = "Daniel5%";
$DB_name = "u597716772_1";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	$e->getMessage();
}
?>