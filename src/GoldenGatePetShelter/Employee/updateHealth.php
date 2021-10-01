<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['aid']) && $_SESSION['loggedin']==true && $_SESSION['auth']==0)
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
	    $result = mysqli_query($db, "SELECT Animal_ID FROM Health_Record WHERE Animal_ID='".$aid."'");
	    if(mysqli_num_rows($result)==0)
	    {
	    	mysqli_query($db, "INSERT INTO Health_Record SET Animal_ID='".$aid."'");	
	    }

	    if(!empty($_POST['cond']))
	    {
		$cond = $_POST['cond'];
		$query = "UPDATE Health_Record SET Cond='".$cond."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update condition";
		}
	    }

	    if(!empty($_POST['hist']))
	    {
		$hist = $_POST['hist'];
		$query = "UPDATE Health_Record SET Hist='".$hist."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update history";
		}
	    }

	    if(!empty($_POST['spn']))
	    {
		$spn = $_POST['spn'];
		$query = "UPDATE Health_Record SET Special_Needs='".$spn."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update special needs";
		}
	    }

	    if(!empty($_POST['sNum']))
	    {
		$sNum = $_POST['sNum'];
		$query = "UPDATE Health_Record SET Serial_Number='".$sNum."' WHERE Animal_ID='".$aid."'";
		if(!mysqli_query($db, $query))
		{
		    echo "ERROR: Could not update serial number";
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
			    <a class="py-2 d-none d-md-inline-block" href="employeeHome.php">Account Info</a>
			    <a class="py-2 d-none d-md-inline-block" href="animals.php">Animals</a>
			    <a class="py-2 d-none d-md-inline-block" href="adoption.php">Adoption Form</a>
	                    <a class="py-2 d-none d-md-inline-block" href="../logout.php">Logout</a>
	            </div>
	     </nav>
	     
	     <div class="box">
		<div class="text-center mb-4">
			<h1 class="mb-3 font-weight-normal" style="margin-top:55">
				Update <?php echo $name?>'s Health Record
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
                            <h6 class="mb-0">Condition</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="cond" class="sr-only">
					Condition
				</label>
				<select name="cond">
					<option disabled selected value> -- select an option -- </option>
					<option value="Poor">Poor</option>
					<option value="Good">Good</option>
					<option value="Excellent">Excellent</option>
				</select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">History</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="hist" class="sr-only">
					History
				</label>
				<input type="text" name="hist" class="form-control" placeholder="Insert History">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Special Needs</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="spn" class="sr-only">
					Special Needs
				</label>
				<input type="text" name="spn" class="form-control" placeholder="Insert Special Needs">
                          </div>
			</div>
			<hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Serial Number</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
				<label for="sNum" class="sr-only">
					Serial Number
				</label>
				<input type="text" name="sNum" class="form-control" placeholder="Insert Serial Number">
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

