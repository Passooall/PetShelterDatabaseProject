<?php
	session_start();

	include("connect.php");

	if(isset($_SESSION['id']) && $_SESSION['loggedin'] == true && isset($_SESSION['auth']))
	{
	    $auth = $_SESSION['auth'];
	    $id = $_SESSION['id'];

		if($auth == 0)
		{
		    header('Location: Employee/employeeHome.php');
		}
		if($auth == 1)
		{
		    header('Location: Manager/managerHome.php');
		}
		if($auth == 2)
		{
		    header('Location: Supervisor/supervisorHome.php');
		}
	}

	echo "Error logging in. Please try again.";
	header("refresh:10; url=login.php");
?>
