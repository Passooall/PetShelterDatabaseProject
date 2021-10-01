<?php

	session_start();
	
	if(isset($_SESSION['loggedin']) && isset($_SESSION['id']))
	{
	    unset($_SESSION['loggedin']);
	    unset($_SESSION['id']);
	}

	header("Location: login.php");
	die;
?>
