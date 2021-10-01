<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['loggedin']==true && $_SESSION['auth']==0)
	{
	}else {
	    header('Location: ../login.php');
	}
	
	include("../connect.php");

	$id = $_SESSION['id'];
	$query = "SELECT firstName, middleName, lastName FROM Employee WHERE ID='".$id."'";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$fName = $row["firstName"];
	$mName = $row["middleName"];
	$lName = $row["lastName"];

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	    if(!empty($_POST['email']))
	    {
		$email = $_POST['email'];
		$query = "UPDATE Employee SET email='".$email."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update email";
		}
	    }

	    if(!empty($_POST['phone']))
	    {
		$phone = $_POST['phone'];
		$query = "UPDATE Employee SET phoneNumber1='".$phone."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update phone";
		}
	    }

	    if(!empty($_POST['hNum']))
	    {
		$hNum = $_POST['hNum'];
		$query = "UPDATE Employee SET houseNumber='".$hNum."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update house number";
		}
	    }

	    if(!empty($_POST['sName']))
	    {
		$sName = $_POST['sName'];
		$query = "UPDATE Employee SET streetName='".$sName."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update street name";
		}
	    }

	    if(!empty($_POST['city']))
	    {
		$city = $_POST['city'];
		$query = "UPDATE Employee SET city='".$city."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update city";
		}
	    }

	    if(!empty($_POST['state']))
	    {
		$state = $_POST['state'];
		$query = "UPDATE Employee SET state='".$state."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update state";
		}
	    }

	    if(!empty($_POST['zip']))
	    {
		$zip = $_POST['zip'];
		$query = "UPDATE Employee SET zipCode='".$zip."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update zip code";
		}
	    }

	    if(!empty($_POST['pass']))
	    {
		$password = $_POST['pass'];
		$pass = hash('sha256', $password);
		$query = "UPDATE Employee SET pass='".$pass."' WHERE ID='".$id."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update password";
		}
	    }

	    header('Location: employeeHome.php');

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
			    <a class="py-2 d-none d-md-inline-block" href="employeeHome.php">Account Info</a>
			    <a class="py-2 d-none d-md-inline-block" href="animals.php">Animals</a>
			    <a class="py-2 d-none d-md-inline-block" href="adoption.php">Adoption Form</a>
	                    <a class="py-2 d-none d-md-inline-block" href="../logout.php">Logout</a>
	            </div>
	     </nav>
	     
	     <div class="box">
		<div class="text-center mb-4">
			<h1 class="mb-3 font-weight-normal" style="margin-top:55">
				Employee Account Info
			</h1>
			<p style="color:red"> Whatever you do NOT want changed, leave blank </p>
		</div>
		
		<form method="post">
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
				<label for="email" class="sr-only">
					New Email
				</label>
				<input type="text" name="email" class="form-control" placeholder="New Email">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="phone" class="sr-only">
					New Phone
				</label>
				<input type="text" name="phone" class="form-control" placeholder="New Phone">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">House Number</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="hNume" class="sr-only">
					New House Number
				</label>
				<input type="text" name="hNum" class="form-control" placeholder="New House Number">
                          </div>
			</div>
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Street Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="sName" class="sr-only">
					StreetName
				</label>
				<input type="text" name="sName" class="form-control" placeholder="New Street Name">
                          </div>
                        </div>
			
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">City</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="city" class="sr-only">
					New City
				</label>
				<input type="text" name="city" class="form-control" placeholder="New City">
                          </div>
			</div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">State</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="state" class="sr-only">
					New State
				</label>
				<input type="text" name="state" class="form-control" placeholder="New State">
                          </div>
                        </div>

			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Zip Code</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="zip" class="sr-only">
					New Zip Code
				</label>
				<input type="text" name="zip" class="form-control" placeholder="New Zip Code">
                          </div>
                        </div>
			
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Password</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="pass" class="sr-only">
					New Password
				</label>
				<input type="text" name="pass" class="form-control" placeholder="New Password">
                          </div>
                        </div>

                      </div>
		    </div>
		    <button formaction="" class="btn btn-lg btn-primary btn-block" type="sumbit">
			Update Info
		    </button>
                    </div>
                  </div>
                </div>
          </div>
	</div>
	</form>
     </div>
</body>
</html>

