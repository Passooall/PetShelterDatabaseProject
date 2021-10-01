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
	$queryStat = "SELECT * FROM Status WHERE Animal_ID = '".$aid."'";
	$queryHealth = "SELECT * FROM Health_Record WHERE Animal_ID = '".$aid."'";
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
		     <h2 style="text-align:center;margin-bottom:20px"> <?php echo $name ?>'s Status </h2>
			 <table border="1 px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto" >

<?php 
    
    if(mysqli_num_rows($result = $db->query($queryStat))!=0){

	echo ' <tr>
	<th> <font face="Arial" size="5em">Activity</font></th>
	<th> <font face="Arial" size="5em">Adoptable</font></th>
	<th> <font face="Arial" size="5em">Temperament</font></th>
	<th> <font face="Arial" size="5em">Training</font></th>
	<th> <font face="Arial" size="5em">Exercise</font></th>
	<th> <font face="Arial" size="5em">Feeding</font></th>
	</tr>';

        while($row = $result->fetch_assoc())
    	{
		$act = $row["Activity"];
		if($row["Adoptable"]==1)
		{
	    	$adopt = "Yes";
		}else{
	    	$adopt = "No";
		}
		$temp = $row["Temperament"];
		$train = $row["Training"];
		$exer = $row["Exercising"];	
		$feed = $row["Feeding"];

    		echo '<tr>
		<td>'.$act.'</td>
		<td>'.$adopt.'</td>
		<td>'.$temp.'</td>
		<td>'.$train.' min per day</td>
		<td>'.$exer.' min per day</td>
    		<td>'.$feed.' times per day</td>
		</tr>';
    	}	
    	$result->free();
   } else {
   	echo '<h3 style="text-align:center">No status record</h3>';
   }
?>
			</table>
			<div class="box" style="margin-bottom:50px">
			<a href="updateStatus.php" style="margin-top:25px" class="btn btn-lg btn-primary btn-block" type="submit">
				Update Status
			</a>
			</div>
			<hr>
			<h2 style="text-align:center;margin-bottom:20px;margin-top:50px"> <?php echo $name ?>'s Health Record </h2>
			 <table border="1 px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto" >

<?php 
    
    if(mysqli_num_rows($result = $db->query($queryHealth))!=0){

	echo ' <tr>
	<th> <font face="Arial" size="5em">Condition</font></th>
	<th> <font face="Arial" size="5em">History</font></th>
	<th> <font face="Arial" size="5em">Special Needs</font></th>
	<th> <font face="Arial" size="5em">Vet Serial Number</font></th>
	</tr>';

        while($row = $result->fetch_assoc())
    	{
		$cond = $row["Cond"];
		$hist = $row["Hist"];
		$spn = $row["Special_Needs"];
		$sNum = $row["Serial_Number"];	

    		echo '<tr>
		<td>'.$cond.'</td>
		<td>'.$hist.'</td>
		<td>'.$spn.'</td>
		<td>'.$sNum.'</td>
		</tr>';
    	}	
    	$result->free();
   } else {
   	echo '<h3 style="text-align:center">No health record</h3>';
   }
?>
			</table>
			<div class="box">
			<a href="updateHealth.php" style="margin-top:25px" class="btn btn-lg btn-primary btn-block" type="submit">
				Update Health Record
			</a>
			</div>

		     </div>
		     </div>
	     </div>
	     </form>
	     <table style="margin-left:auto;margin-right:auto;margin-top:20px">
		<tr>
			<th><a href="animals.php" class="btn btn-md btn-primary btn-block">Back</a></th>
		</tr>
	     </table>

	</body>
</html>

