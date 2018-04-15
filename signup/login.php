<?php
include('connection.php');
$email=$_POST['email'];
$password=$_POST['password'];
$hash=password_hash($password,PASSWORD_DEFAULT);
if(isset($_POST["login"]))
{
	$query="SELECT * from users where email='$email'";
	$statement=$connect->prepare($query);
	$statement->execute();
	  $row = $statement->fetch(PDO::FETCH_ASSOC);
	  $passdb=$row['password'];
	$verify=password_verify($password,$passdb);


	$count=$statement->rowCount();
	if($count && $verify)
	{

		
		$_SESSION["email"]=$email;
		header("location: ../index.php");
	}
	else
	{
		 echo "<script>alert('Invalid Entry');</script>";
		echo "<script>window.open('index.php','_self');</script>";
	}
}

?>