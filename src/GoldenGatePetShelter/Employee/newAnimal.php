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
	    $name = $_POST['name'];
 	    $species = $_POST['species'];
	    $sex = $_POST['sex'];
	    $breed = $_POST['breed'];
	    $color = $_POST['color'];
	    $pat = $_POST['pat'];
	    $alt = $_POST['alt'];
	    $rnum = $_POST['rnum'];
	    $fee = $_POST['fee'];
	    $DOB = NULL;
	    $weight = NULL;
	    $euth = "No";
	    $arrive = NULL;
	    $id="";
	    for($i=0; $i<8; $i++)
	    {
		$id .= rand(0,9);
	    }

	    mysqli_query($db, "INSERT INTO Animals SET Name='".$name."', DOB='".$DOB."',  Sex='".$sex."', Species='".$species."', Breed='".$breed."', Color='".$color."', Pattern='".$pat."', Altered='".$alt."', Weight='".$weight."', ID='".$id."', Shelter_Section='".$rnum."', Adoption_Fee='".$fee."', Euthanized='".$euth."', Date_of_Euthanization=NULL, Arrival_Date='".$arrive."'");

	    header('Location: success.php');

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
				New Animal Entry
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
                            <h6 class="mb-0">Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="name" class="sr-only">
					Name
				</label>
				<input type="text" name="name" class="form-control" placeholder="Enter Name">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Sex</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="sex" class="sr-only">
					Sex
				</label>
				<select name="sex">
					<option disabled selected value> -- select an option -- </option>
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Species</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="species" class="sr-only">
					Species
				</label>
				<select name="species">
					<option disabled selected value> -- select an option -- </option>
					<option value="Dog">Dog</option>
					<option value="Cat">Cat</option>
					<option value="Rodent">Rodent</option>
					<option value="Lizard">Lizard</option>
					<option value="Bird">Bird</option>
				</select>
                          </div>
			</div>
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Breed</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="breed" class="sr-only">
					Breed
				</label>
				<input type="text" name="breed" class="form-control" placeholder="Enter Breed">
                          </div>
                        </div>	
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Color</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="color" class="sr-only">
					Color
				</label>
				<input type="text" name="color" class="form-control" placeholder="Enter Color">
                          </div>
			</div>
			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Pattern</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="pat" class="sr-only">
					Pattern
				</label>
				<select name="pat">
					<option disabled selected value> -- select an option -- </option>
					<option value="Solid">Solid</option>
					<option value="Striped">Striped</option>
					<option value="Spotted">Spotted</option>
					<option value="Patches">Patches</option>
				</select>

                          </div>
			</div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Altered</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="alt" class="sr-only">
					Altered
				</label>
				<select name="alt">
					<option disabled selected value> -- select an option -- </option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
                          </div>
                        </div>

			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Room Number</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="rnum" class="sr-only">
					Room Number
				</label>
				<select name="rnum">
					<option disabled selected value> -- select an option -- </option>
					<option value=1>1 (Dogs)</option>
					<option value=2>2 (Dogs)</option>
					<option value=3>3 (Dogs)</option>
					<option value=4>4 (Cats)</option>
					<option value=5>5 (Cats)</option>
					<option value=6>6 (Birds)</option>
					<option value=7>7 (Birds)</option>
					<option value=8>8 (Lizards)</option>
					<option value=9>9 (Lizards)</option>
					<option value=10>10 (Rodents)</option>
				</select>
                          </div>
                        </div>
			
			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Adoption Fee</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="fee" class="sr-only">
					Adoption Fee
				</label>
				<select name="fee">
					<option disabled selected value> -- select an option -- </option>
					<option value=2.0>$2</option>
					<option value=5.0>$5</option>
					<option value=10.0>$10</option>
					<option value=20.0>$20</option>
					<option value=30.0>$30</option>
					<option value=40.0>$40</option>
					<option value=50.0>$50</option>
					<option value=60.0>$60</option>
					<option value=70.0>$70</option>
					<option value=80.0>$80</option>
					<option value=90.0>$90</option>
				</select>

                          </div>
                        </div>



			</div>
		    </div>
		    <button formaction="" class="btn btn-lg btn-primary btn-block" type="sumbit">
			Enter Animal
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

