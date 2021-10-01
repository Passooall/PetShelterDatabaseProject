<?php
    include("connect.php");
   
    if(mysqli_connect_errno())
    {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
    }

      // something was posted
      $email = "egabbott7@ucoz.ru";
      $password = "password3";

      $query = "SELECT email, pass, ID, authority FROM Employee WHERE email='".$email."' AND pass='".$password."'";
      $result = $db->query($query);
      $num = $result->num_rows;
      if($num == NULL){
	  echo "NULL";
      }else{
	  echo $num;
      }
      echo "Hello";

?>
