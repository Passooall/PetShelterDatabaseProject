<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['aid']) && $_SESSION['loggedin']==true && $_SESSION['auth']<=2)
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

	$aid = $_SESSION['aid'];
	$query = "SELECT * FROM Adopter INNER JOIN Adopted ON Adopter.ID=Adopted.Adopter_ID WHERE Adopted.Animal_ID = '".$aid."'";
	$queryName = "SELECT Name FROM Animals WHERE ID='".$aid."'";
	$result = mysqli_query($db, $queryName);
	$row = $result->fetch_assoc();
	$name = $row["Name"];

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
			    <a class="py-2 d-none d-md-inline-block" href="managerHome.php">Account Info</a>
			    <a class="py-2 d-none d-md-inline-block" href="animals.php">Animals</a>
			    <a class="py-2 d-none d-md-inline-block" href="employee.php">Employees</a>
	                    <a class="py-2 d-none d-md-inline-block" href="../logout.php">Logout</a>
	            </div>
	     </nav>
			   
	     <form method="POST">
	     <div class="text-center" style="margin: 20px">
		     <h1>GOLDEN GATE PET SHELTER</h1>
	     </div>
	     <hr>
             <div class="flex-container">
	        <div class="col-md-0 p-lg-10 mx-auto my-5">
		     <div class="lead font-weight-normal">
		     <h2 style="text-align:center;margin-bottom:20px"> <?php echo $name ?>'s Adopter </h2>
			 <table border="1 px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto" >

<?php 
    
    if(mysqli_num_rows($result = $db->query($query))!=0){

	echo ' <tr>
	<th> <font face="Arial" size="5em">Name</font></th>
	<th> <font face="Arial" size="5em">Address</font></th>
	<th> <font face="Arial" size="5em">City</font></th>
	<th> <font face="Arial" size="5em">State</font></th>
	<th> <font face="Arial" size="5em">Zip Code</font></th>
	<th> <font face="Arial" size="5em">Phone Number</font></th>
	<th> <font face="Arial" size="5em">Email</font></th>
	<th> <font face="Arial" size="5em">Paid</font></th>
	<th> <font face="Arial" size="5em">Payment Method</font></th>
	</tr>';

        while($row = $result->fetch_assoc())
    	{
		$fname = $row["First_Name"];
		$mname = $row["Middle_Name"];
		$lname = $row["Last_Name"];
		$sname = $row["Street_Name"];	
		$hnum = $row["House_Number"];
		$zip = $row["Zipcode"];
		$city = $row["City"];
		$state = $row["State_USA"];
		$phone = $row["Phone_Number"];	
		$email = $row["Email"];
		$amt = $row["Amount"];
		$meth = $row["Method"];

    		echo '<tr>
		<td>'.$fname.' '.$mname.' '.$lname.'</td>
		<td>'.$hnum.' '.$sname.'</td>
		<td>'.$city.'</td>
		<td>'.$state.'</td>
		<td>'.$zip.'</td>
		<td>'.$phone.'</td>
		<td>'.$email.'</td>
		<td>$'.$amt.'</td>
		<td>'.$meth.'</td>
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
	     </form>
	     <table style="margin-left:auto;margin-right:auto;margin-top:20px">
		<tr>
			<th><a href="adopted_animals.php" class="btn btn-md btn-primary btn-block">Back</a></th>
		</tr>
	     </table>

	</body>
</html>

