<?php
// Create connection

include ('connection.php');
session_start();

$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$password=$_POST['password'];
$date=date("Y-m-d");

if(isset($_POST["submit"]))
{
	$get_email="SELECT * from users where email='$email'";
	$statement=$connect->prepare($get_email);
	$statement->execute();
	$count=$statement->rowCount();
	if($count)
	{
		 echo "<script>alert('Email already registered!');</script>";
		 echo "<script>window.open('index.php','_self');</script>";
	}

	else
	{
		$hash=password_hash($password,PASSWORD_DEFAULT);
	$query="INSERT into users(first,last,email,password,date)VALUES('$first','$last','$email','$hash','$date')";
	$statement=$connect->prepare($query);
	if($statement->execute())
	{
		$_SESSION["email"]=$email;
		header("location: ../index.php");
	}
	else
	{
		 echo "<script>alert('Signup unsuccessful');</script>";

		echo "<script>window.open('index.php','_self');</script>";

	}
	}
}


?>