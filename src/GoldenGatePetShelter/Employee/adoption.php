<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['loggedin']==true && $_SESSION['auth']==0)
	{
	}else {
	    header('Location: ../login.php');
	}
	
	include("../connect.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	    $fname = $_POST['fname'];
 	    $mname = $_POST['mname'];
	    $lname = $_POST['lname'];
	    $sname = $_POST['sname'];
	    $hnum = $_POST['hnum'];
	    $zip = $_POST['zip'];
	    $city = $_POST['city'];
	    $state = $_POST['state'];
	    $phone = $_POST['phone'];
	    $email = $_POST['email'];
	    $method = $_POST['method'];
	    $id="";
	    for($i=0; $i<8; $i++)
	    {
		$id .= rand(0,9);
	    }
	    $aid = $_POST['aid'];

	    $result = mysqli_query($db, "SELECT Adoption_Fee FROM Animals WHERE ID='".$aid."'");
	    $row = $result->fetch_assoc();
	    $amount=$row['Adoption_Fee'];

	    mysqli_query($db, "INSERT INTO Adopter SET ID='".$id."', First_Name='".$fname."', Middle_Name='".$mname."',  Last_Name='".$lname."', Street_Name='".$sname."', House_Number='".$hnum."', Zipcode='".$zip."', City='".$city."', State_USA='".$state."', Phone_Number='".$phone."', Email='".$email."', Amount='".$amount."', Method='".$method."'");

	    mysqli_query($db, "INSERT INTO Adopted SET Adopter_ID='".$id."', Animal_ID='".$aid."', Taken=NULL, Returned=NULL");
		
	    $_SESSION['adoptID'] = $id;
	    $_SESSION['aid'] = $aid;
	   
	    header('Location: adoptionSuccess.php');

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
				Adoption Form
			</h1>
		</div>
		
		<form method="post">
		<div class="container">
		<div class="main-body">
		<div class="row gutters-sm">
                  <div class="col-md-8">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">First Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="fname" class="sr-only">
					First Name
				</label>
				<input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Middle Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="mname" class="sr-only">
					Middle Name
				</label>
				<input type="text" name="mname" class="form-control" placeholder="Enter Middle Name">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Last Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="lname" class="sr-only">
					Last Name
				</label>
				<input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                          </div>
			</div>
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Street Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="sname" class="sr-only">
					Street Name
				</label>
				<input type="text" name="sname" class="form-control" placeholder="Enter Street Name">
                          </div>
                        </div>	
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">House Number</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="hnum" class="sr-only">
					House Number
				</label>
				<input type="text" name="hnum" class="form-control" placeholder="Enter House Number">
                          </div>
			</div>
			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Zip Code</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="zip" class="sr-only">
					Zip Code
				</label>	
			<input type="text" name="zip" class="form-control" placeholder="Enter Zip Code">
		  </div>
			</div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">City</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="city" class="sr-only">
					City
				</label>
				<input type="text" name="city" class="form-control" placeholder="Enter City">
                          </div>
                        </div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">State</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="rnum" class="sr-only">
					State
				</label>
				<select name="state">
					<option disabled selected value> -- select an option -- </option>
					<option value="Alabama">Alabama</option>
					<option value="Alaska">Alaska</option>
					<option value="Arizona">Arizona</option>
					<option value="Arkansas">Arkansas</option>
					<option value="California">California</option>
					<option value="Colorado">Colorado</option>
					<option value="Connecticut">Connecticut</option>
					<option value="Delaware">Delaware</option>
					<option value="Florida">Florida</option>
					<option value="Georgia">Georgia</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Idaho">Idaho</option>
					<option value="Illinois">Illinois</option>
					<option value="Indiana">Indiana</option>
					<option value="Iowa">Iowa</option>
					<option value="Kansas">Kansas</option>
					<option value="Kentucky">Kentucky</option>
					<option value="Louisiana">Louisiana</option>
					<option value="Maine">Maine</option>
					<option value="Maryland">Maryland</option>
					<option value="Massachusetts">Massachusetts</option>
					<option value="Michigan">Michigan</option>
					<option value="Minnesota">Minnesota</option>
					<option value="Mississippi">Mississippi</option>
					<option value="Missouri">Missouri</option>
					<option value="Montana">Montana</option>
					<option value="Nebraska">Nebraska</option>
					<option value="Nevada">Nevada</option>
					<option value="New Hampshire">New Hampshire</option>
					<option value="New Jersey">New Jersey</option>
					<option value="New Mexico">New Mexico</option>
					<option value="New York">New York</option>
					<option value="North Carolina">North Carolina</option>
					<option value="North Dakota">North Dakota</option>
					<option value="Ohio">Ohio</option>
					<option value="Oklahoma">Oklahoma</option>
					<option value="Oregon">Oregon</option>
					<option value="Pennsylvania">Pennsylvania</option>
					<option value="Rhode Island">Rhode Island</option>
					<option value="South Carolina">South Carolina</option>
					<option value="South Dakota">South Dakota</option>
					<option value="Tennessee">Tennessee</option>
					<option value="Texas">Texas</option>
					<option value="Utah">Utah</option>
					<option value="Vermont">Vermont</option>
					<option value="Virginia">Virginia</option>
					<option value="Washington">Washington</option>
					<option value="West Virginia">West Virginia</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Wyoming">Wyoming</option>
				</select>
                          </div>
                        </div>
			
			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Phone Number</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="phone" class="sr-only">
					Phone Number
				</label>
				<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
                          </div>
                        </div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Email</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="email" class="sr-only">
					Email
				</label>
				<input type="text" name="email" class="form-control" placeholder="Enter Email">
                          </div>
                        </div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Payment Method</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="method" class="sr-only">
					Method
				</label>
				<select name="method">
					<option value="Cash">Cash</option>
					<option value="Card">Card</option>
				</select>
                          </div>
                        </div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Animal</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="aid" class="sr-only">
					Animal ID
				</label>
				<select name="aid">
					<?php
						$sql=mysqli_query($db, "SELECT Name, ID FROM Adoptable_Animals");
						while($row = $sql->fetch_assoc())
						{
						    $oaid = $row['ID'];
						    echo "<option value='".$oaid."'>".$row['Name']." (ID: ".$oaid.")</option>";
						}
					?>
				</select>
                          </div>
                        </div>

			</div>
		    </div>
		    <button formaction="" class="btn btn-lg btn-primary btn-block" type="sumbit">
			Complete
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

