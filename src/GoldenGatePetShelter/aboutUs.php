<?php
	
	include("connect.php");
	if(mysqli_connect_errno())
	{
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$query = "SELECT * FROM Pet_Shelter";
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
				    <img src="Images/GGPS.png" width="60" height="50">
	                    </a>
			    <a class="py-2 d-none d-md-inline-block" href="index.html">Home</a>
			    <a class="py-2 d-none d-md-inline-block" href="aboutUs.php">About Us</a>
			    <a class="py-2 d-none d-md-inline-block" href="adoptablePets.php">Adoptable Pets</a>
	                    <a class="py-2 d-none d-md-inline-block" href="login.php">Employee Login</a>
	            </div>
	     </nav>
	     <div class="text-center" style="margin: 20px">
		     <h1>GOLDEN GATE PET SHELTER</h1>
	     </div>
             <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
	             <div class="col-md-5 p-lg-5 mx-auto my-5">
		             <h1 class="display-4 font-weight-normal">About Us</h1>
			     <p class="lead font-weight-normal">We are a shelter committed to finding only the best home for our pets</p>
		     </div>
		     <div class="product-device shadow-sm d-none d-md-block"></div>
		     <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
	     </div>
	
	     <!-- LOCATION -->
	     
    		<div class="box">
        	<hr style="margin-top:80px">
        	<div class="text-center mb-4">
                	<h1 class="mb-3 font-weight-normal" style="margin-top:55">
                        	LOCATION
                	</h1>
        	</div>

        	<div class="flex-container">
                	<div class="col-md-0 p-lg-10 mx-auto my-5">
                        	<div class="lead font-weight-normal">
                                	<table border="1px solid black" cellspacing="2" cellpadding="15px" style="margin-left:auto;margin-right:auto">
<?php
        echo '<tr>
                <th> <font face="Arial" size="5em">Name</font></th>
                <th> <font face="Arial" size="5em">Address</font></th>
		<th> <font face="Arial" size="5em">Phone Number</font></th>
		<th> <font face="Arial" size="5dm">Email</font></th>
            </tr>';

        if($res = $db->query($query)){
                while($row = $res->fetch_assoc())
	            {
	                    $name = $row["Name"];
	                    $sName = $row["Street_Name"];
			    $bNum = $row["Building_Number"];
			    $zip = $row["Zip_Code"];
			    $city = $row["City"];
			    $state = $row["State"];
			    $phone = $row["Phone_Number"];
			    $email = $row["Email"];
	
	                echo '<tr>
			    <td>'.$name.'</td>
			    <td>'.$bNum.' '.$sName.' St.<br/>'.$city.', '.$state.', '.$zip.'</td>
			    <td>'.$phone.'</td>
			    <td>'.$email.'</td>
			    </tr>';
                }
            $res->free();
	}
?>
                                	</table>
                        	</div>
                	</div>
        	</div>
    </body>
</html>
