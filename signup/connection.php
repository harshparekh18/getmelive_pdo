<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "getmelive";

try
{
	$connect=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $error)
{
	$message=$error->getMessage();
	echo $message;


}