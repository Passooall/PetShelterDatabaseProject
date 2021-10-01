<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['loggedin']==true && $_SESSION['auth']==2)
	{
	}else {
	    header('Location: ../login.php');
	}

	if(isset($_SESSION['aid']))
	{
	   unset($_SESSION['aid']);
	}
 	
    	include("../connect.php");
    	if(mysqli_connect_errno())
    	{
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
	}

	$query = "SELECT firstName, middleName, lastName, ID FROM Employee;";


	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$_SESSION['eid'] = $_POST['info'];
		header('location: employee_info.php');
	}


?>

<html lan='en'>
    <head>  
    	<title>Golden Gate Pet Shelter</title>
	<link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
         <meta name="keyword" content="golden, gate, pet, shelter, animal, adoption, adopt">
         <meta name="description" content="The website for the Golden Gate Pet Shelter">
         <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    </head>
    <body>  
	    <nav class="site-header sticky-top py-1 navbar-dark bg-dark">
		    <div class="container d-flex flex-column flex-md-row justify-content-between">
			    <a class="py-2" href="#" aria-label="Product">
				    <img src="../Images/GGPS.png" width="60" height="50">
	                    </a>
			    <a class="py-2 d-none d-md-inline-block" href="supervisorHome.php">Account Info</a>
			    <a class="py-2 d-none d-md-inline-block" href="employee.php">Employees</a>
			    <a class="py-2 d-none d-md-inline-block" href="invoice.php">Create Invoice</a>
	                    <a class="py-2 d-none d-md-inline-block" href="../logout.php">Logout</a>
	            </div>
	     </nav>

	     <form method="POST">
	     <div class="text-center" style="margin: 20px">
		     <h1>GOLDEN GATE PET SHELTER</h1>
	     </div>
	     <hr>
 <!-- Buttons -->	     
	     <table style="margin-left:auto;margin-right:auto">
		<tr>
			<th style="padding:20px"><a href="newEmployee.php" class="btn btn-md btn-primary btn-block">Enter New Employee</a></th>
		</tr>
	     </table>
	     <hr>


             <div class="flex-container">
	        <div class="col-md-0 p-lg-10 mx-auto my-5">
		     <div class="lead font-weight-normal">
			 <h2 style="text-align:center;margin-bottom:20px"> Employees </h2>
			 <table border="1 px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto" >

<?php 
    echo ' <tr>
	<th> <font face="Arial" size="5em">Name</font></th>
	<th> <font face="Arial" size="5em">ID</font></th>
	<th> <font face="Arial" size="5em">Information</font></th>
	</tr>';
    
if($result = $db->query($query)){
    while($row = $result->fetch_assoc())
    {
	$fname = $row["firstName"];
	$mname = $row["middleName"];
	$lname = $row["lastName"];
	$eid = $row["ID"];

    echo '<tr>
	<td>'.$fname.' '.$mname.' '.$lname.'</td>
	<td>'.$eid.'</td>
    	<td> <input class="btn btn-md btn-primary btn-block" type="submit" name="info" value='.$eid.'> </td>
	</tr>';
	
    }
    $result->free();
}
?>
		     </div>
		     </div>
		     <div class="product-device shadow-sm d-none d-md-block"></div>
		     <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
	     </div>
	     </form>
	</body>
</html>

