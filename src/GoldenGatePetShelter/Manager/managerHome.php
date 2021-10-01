<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['loggedin']==true && $_SESSION['auth']==1)
	{
	}else {
	    header('Location: ../login.php');
	}
	
	include("../connect.php");

	$id = $_SESSION['id'];
	$query = "SELECT firstName, middleName, lastName, streetName, houseNumber, zipCode, city, state, phoneNumber1, email FROM Employee WHERE ID='".$id."'";
	$queryC = "SELECT Care_Log.Animal, Care_Log.Animal_ID, Animals.Shelter_Section FROM Care_Log INNER JOIN Animals ON Care_Log.Animal_ID=Animals.ID WHERE Employee_ID='".$id."'";

	$result = mysqli_query($db, $query);

	if(mysqli_num_rows($result) == 0)
	{
		echo "ERROR: Info can't be found";
	} else {
		$row = mysqli_fetch_assoc($result);
		$fName = $row["firstName"];
		$mName = $row["middleName"];
		$lName = $row["lastName"];
		$sName = $row["streetName"];
		$hNum = $row["houseNumber"];
		$zip = $row["zipCode"];
		$city = $row["city"];
		$state = $row["state"];
		$phone = $row["phoneNumber1"];
		$email = $row["email"];
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
			    <a class="py-2 d-none d-md-inline-block" href="managerHome.php">Account Info</a>
			    <a class="py-2 d-none d-md-inline-block" href="animals.php">Animals</a>
			    <a class="py-2 d-none d-md-inline-block" href="employee.php">Employees</a>
	                    <a class="py-2 d-none d-md-inline-block" href="../logout.php">Logout</a>
	            </div>
	     </nav>
	     
	     <div class="box">
		<div class="text-center mb-4">
			<h1 class="mb-3 font-weight-normal" style="margin-top:55">
				Manager Account Info
			</h1>
		</div>

		<div class="container">
		<div class="main-body">
		<div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                          <img src="Images/default_profile_pic.jpg" alt="Admin" class="rounded-circle" width="150">
                          <div class="mt-3">
			  <h4> <?php echo $fName." ".$lName ?></h4>
			    <?php echo "ID: ".$id ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<?php echo $fName." ".$mName." ".$lName ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<?php echo $email ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<?php echo $phone ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<?php echo $hNum." ".$sName ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">city/state/zip</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<?php echo $city.", ".$state.", ".$zip ?>
                          </div>
                        </div>
                      </div>
		    </div>
		    <button formaction="" class="btn btn-lg btn-primary btn-block" type="sumbit">
			<a href="editProfile.php" style="color:white">
			Edit Info
			</a>
		    </button>
                    </div>
                  </div>
                </div>
          </div>
	</div>

<!-- ASSIGNED ANIMIALS -->
     <div class="box">
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
		
	if($res = $db->query($queryC)){
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
	

     </div>
</body>
</html>

