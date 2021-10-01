<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['aid']) && $_SESSION['loggedin']==true && $_SESSION['auth']<=2)
	{
	}else {
	    header('Location: ../login.php');
	}
	
	include("../connect.php");

	$aid = $_SESSION['aid'];
	$query = "SELECT Name FROM Animals WHERE ID='".$aid."'";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$name = $row["Name"];

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	    $result = mysqli_query($db, "SELECT Animal_ID FROM Status WHERE Animal_ID='".$aid."'");
	    if(mysqli_num_rows($result)==0)
	    {
	    	mysqli_query($db, "INSERT INTO Status SET Animal_ID='".$aid."'");	
	    }

	    if(!empty($_POST['act']))
	    {
		$act = $_POST['act'];
		$query = "UPDATE Status SET Activity='".$act."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update activity";
		}
	    }

	    if(!empty($_POST['adopt']))
	    {
		if($_POST['adopt']=="Yes")
		{
		    $adopt = 1;
		}else{
		    $adopt = 0;
		}
		$query = "UPDATE Status SET Adoptable='".$adopt."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update adoptable";
		}
	    }

	    if(!empty($_POST['temp']))
	    {
		$temp = $_POST['temp'];
		$query = "UPDATE Status SET Temperament='".$temp."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update temperament";
		}
	    }

	    if(!empty($_POST['train']))
	    {
		$train = $_POST['train'];
		$query = "UPDATE Status SET Training='".$train."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update training";
		}
	    }

	    if(!empty($_POST['exer']))
	    {
		$exer = $_POST['exer'];
		$query = "UPDATE Status SET Exercising='".$exer."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update exercize";
		}
	    }

	    if(!empty($_POST['feed']))
	    {
		$feed = $_POST['feed'];
		$query = "UPDATE Status SET Feeding='".$feed."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update feeding";
		}
	    } 

	    header('Location: animal_info.php');

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
				Update <?php echo $name?>'s Status
			</h1>
			<p style="color:red"> Whatever you do NOT want changed, leave blank </p>
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
                            <h6 class="mb-0">Activity Level</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="act" class="sr-only">
					Activity in minutes
				</label>
				<select name="act">
					<option disabled selected value> -- select an option -- </option>
					<option value="High">High</option>
					<option value="Medium">Medium</option>
					<option value="Low">Low</option>
				</select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Adoptable</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="adopt" class="sr-only">
					Adoptable
				</label>
				<select name="adopt">
					<option disabled selected value> -- select an option -- </option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Temperament</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="temp" class="sr-only">
					Temperament
				</label>
				<input type="text" name="temp" class="form-control" placeholder="Insert Temperament">
                          </div>
			</div>
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Training</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="train" class="sr-only">
					Training
				</label>
				<select name="train">
					<option disabled selected value> -- select an option -- </option>
					<option value=10>10 minutes</option>
					<option value=20>20 minutes</option>
					<option value=30>30 minutes</option>
				</select>
                          </div>
                        </div>	
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Exercise</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="exer" class="sr-only">
					Exercize
				</label>
				<select name="exer">
					<option disabled selected value> -- select an option -- </option>
					<option value=10>10 minutes</option>
					<option value=20>20 minutes</option>
					<option value=30>30 minutes</option>
					<option value=40>40 minutes</option>
					<option value=50>50 minutes</option>
					<option value=60>60 minutes</option>
				</select>
                          </div>
			</div>
			<hr>
			<div class="row">
			   <div class="col-sm-3">
			      <h6 class="mb-0">Feeding per day</h6>
			   </div>
			   <div class="col-sm-9 text-secondary">
				<label for="feed" class="sr-only">
					Feeding
				</label>
				<select name="feed">
					<option disabled selected value> -- select an option -- </option>
					<option value=1>1 time</option>
					<option value=2>2 times</option>
					<option value=3>3 times</option>
				</select>

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

