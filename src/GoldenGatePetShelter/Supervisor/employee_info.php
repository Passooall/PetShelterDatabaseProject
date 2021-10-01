<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['eid']) && $_SESSION['loggedin']==true && $_SESSION['auth']<=2)
	{
	}else {
	    header('Location: ../login.php');
	}
	
    	include("../connect.php");
    	if(mysqli_connect_errno())
    	{
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
    	}

	$eid = $_SESSION['eid'];
	$query = "SELECT * FROM Employee WHERE ID = '".$eid."'";
	$queryA = "SELECT Care_Log.Animal, Care_Log.Animal_ID, Animals.Shelter_Section FROM Care_Log INNER JOIN Animals ON Care_Log.Animal_ID=Animals.ID WHERE Employee_ID='".$eid."'";
	
	$queryName = "SELECT firstName FROM Employee WHERE ID='".$eid."'";
	$result = mysqli_query($db, $queryName);
	$row = $result->fetch_assoc();
	$name = $row["firstName"];	

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
			   
	     <div class="text-center" style="margin: 20px">
		     <h1>GOLDEN GATE PET SHELTER</h1>
	     </div>
	     <hr>
             <div class="flex-container">
	        <div class="col-md-0 p-lg-10 mx-auto my-5">
		     <div class="lead font-weight-normal">
		     <h2 style="text-align:center;margin-bottom:20px"> <?php echo $name ?>'s Information</h2>
			 <table border="1 px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto" >

<?php 
    
    if(mysqli_num_rows($result = $db->query($query))!=0){

	echo ' <tr>
	<th> <font face="Arial" size="5em">Name</font></th>
	<th> <font face="Arial" size="5em">Address</font></th>
	<th> <font face="Arial" size="5em">Phone Number</font></th>
	<th> <font face="Arial" size="5em">SSN</font></th>
	<th> <font face="Arial" size="5em">Email</font></th>
	<th> <font face="Arial" size="5em">Wage</font></th>
	<th> <font face="Arial" size="5em">Role</font></th>
	</tr>';

        while($row = $result->fetch_assoc())
    	{
		$fname = $row["firstName"];
		$mname = $row["middleName"];
		$lname = $row["lastName"];
		$sname = $row["streetName"];
		$hnum = $row["houseNumber"];	
		$zip = $row["zipCode"];
		$city = $row["city"];
		$state = $row["state"];
		$phone = $row["phoneNumber1"];
		$ssn = $row["SSN"];
		$email = $row["email"];
		$pay = $row["payment"];
		$auth = $row["authority"];
		if($auth == 0){
			$auth = "Employee";
		}
		if($auth==1){
			$auth = "Manager";
		}
		if($auth==2){
			$auth = "Supervisor";
		}

    		echo '<tr>
		<td>'.$fname.' '.$mname.' '.$lname.'</td>
		<td>'.$hnum.' '.$sname.'<br>'.$city.', '.$state.', '.$zip.'</td>
		<td>'.$phone.'</td>
		<td>'.$ssn.'</td>
		<td>'.$email.'</td>
		<td>$'.$pay.' an hour</td>
		<td>'.$auth.'</td>
		</tr>';
    	}	
    	$result->free();
   } else {
   	echo '<h3 style="text-align:center">No status record</h3>';
   }
?>
			</table>	
		     </div>
		     </div>
	     </div>
	


	<hr style="margin-top:80px">
	<div class="text-center mb-4">
		<h1 class="mb-3 font-weight-normal" style="margin-top:55">
			Animal Assignments
		</h1>
	</div>
	
	<div class="flex-container">
		<div class="col-md-0 p-lg-10 mx-auto my-5">
			<div class="lead font-weight-normal">
				<table border="1px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto">
<?php
	echo '<tr>
	    <th> <font face="Arial" size="5em">Animal Name</font></th>
	    <th> <font face="Arial" size="5em">Animal ID</font></th>
	    <th> <font face="Arial" size="5em">Room Number</font></th>
	    </tr>';
		
	if($res = $db->query($queryA)){
	    while($row = $res->fetch_assoc())
	    {
		$name = $row["Animal"];
		$aid = $row["Animal_ID"];
		$rNum = $row["Shelter_Section"];

		echo '<tr>
		    <td>'.$name.'</td>
		    <td>'.$aid.'</td>
		    <td>'.$rNum.'</td>
		    </tr>';
	    }
	    $res->free();
	}
?>
				</table>
			</div>
		</div>
	</div>

	     <table style="margin-left:auto;margin-right:auto;margin-top:20px">
		<tr>
			<th><a href="employee.php" class="btn btn-md btn-primary btn-block">Back</a></th>
		</tr>
	     </table>

	</body>
</html>

