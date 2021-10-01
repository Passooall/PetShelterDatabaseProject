<?php
    session_start();
    
    include("connect.php");
   
    if(mysqli_connect_errno())
    {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      // something was posted
      $email = $_POST['email'];
      $password = $_POST['password'];
      $pass = hash('sha256', $password);

      $query = "SELECT email, pass, ID, authority FROM Employee WHERE email='".$email."' AND pass='".$pass."'";
      $result = $db->query($query);
      $num = $result->num_rows;
      if($num > 0)
      {
	  $row = $result->fetch_assoc();
	  $id = $row["ID"];
	  $auth = $row["authority"];
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $id;
	  $_SESSION['auth'] = $auth; 
         header('Location: loading.php');
      }else
      {
	  echo "Incorrect username or password";
      }
    }
?>

<html lang="en">
    <head>
        <title>Golden Gate Pet Shelter</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <meta name="keyword" content="golden, gate, pet, animal, shelter, adoption, adopt">
        <meta name="description" content="The login page of the golden gate pet shelter">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">

    </head>
  
    <body class="text-center" style="background-color: white;">

	<nav class="site-header sticky-top py-1 navbar-dark bg-dark">
		<div class="container d-flex flex-column flex-md-row justify-content-between">
			<a class="py-2" href="#" aria-label="Product">
				    <img src="Images/GGPS.png" width="60" height="50">
			</a>
			<a class="py-2 d-none d-md-inline-block" href="index.html">Home</a>
			<a class="py-2 d-none d-md-inline-block" href="aboutUs.php">About Us</a>
			<a class="py-2 d-none d-md-inline-block" href="adoptablePets.php">Adoptable Pets</a>
	                <a class="py-2 d-none d-md-inline-block" href="login.php">Employee Login</a>
		</div>
	</nav>


        <div class="box" >
            <form method="post" class="form-signin">
                <div style="margin: 50px;">
			<img class="mb-4 logo" src="#" alt="" >
			<h1 style="font-family:sans-serif;">Golden Gate Pet Shelter</h1>
			<h3 class="font-weight-normal"> Employee Login </h3>
		</div>
		<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                	<h1 class="h3 mb-3 font-weight-normal">
                    		Please Login
                	</h1>
                	<label for="email" class="sr-only">
                    		Email address
                	</label>
                	<input type="email" name="email" class="form-control" style="margin-bottom:20" placeholder="Email address" required="" autofocus="">
                	<label for="password" class="sr-only">
                    		Password
                	</label>
                	<input type="password" name="password" class="form-control" style="margin-bottom:20" placeholder="Password" required="">
                	<button formaction="" class="btn btn-lg btn-primary btn-block" type="submit">
                    		Login
			</button>
		</div>
            </form>
            <div id="shimai-world" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 2147483647; pointer-events: none; background: transparent;"></div>
        </div>
    </body>

  </html>
