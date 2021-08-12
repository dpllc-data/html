<?php


$con = mysqli_connect("localhost:3306", "root", "~Leodis27", "datapandemonium") or die('Sorry, could not connect to the database or server');


$customer_email = $_POST['customer_email'];


$customer_password = $_POST['customer_password'];


$customer_password2 = $_POST['customer_password2'];


$customer_fname = $_POST['customer_fname'];


$customer_lname = $_POST['customer_lname'];


$customer_phone = $_POST['customer_phone'];


$baduser = 0;


// Check if userid was entered


if (trim($customer_email) == '')


{


   echo "<h2>Sorry, you must enter an email address.</h2><br>\n";


   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


   $baduser = 1;


}


//Check if password was entered


if (trim($customer_password) == '')


{


   echo "<h2>Sorry, you must enter a password.</h2><br>\n";


   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


   $baduser = 1;


}


//Check if password and confirm password match


if ($customer_password != $customer_password2)


{

   echo $customer_password2 . "<br>";
   echo "<h2>Sorry, the passwords you entered did not match.</h2><br>\n";


   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


   $baduser = 1;


}


//Check if userid is already in database


$query = "SELECT customer_email from customer where customer_email = '$customer_email'";


$result = mysqli_query($con, $query);


$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


if ($row['customer_email'] == $customer_email)


{


   echo "<h2>Sorry, that user name is already taken.</h2><br>\n";


   echo "<a href=\"index.php?content=register\">Try again</a><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


   $baduser = 1;


}


if ($baduser != 1)


{

	$hashed = hash('sha512', $customer_password);

   //Everything passed, enter userid in database


   $query = "INSERT into customer (customer_email, customer_password, customer_fname, customer_lname, customer_phone) VALUES ('$customer_email', '$hashed', '$customer_fname','$customer_lname', '$customer_phone');";
   
   //$query = "SELECT * from customer";


   $result = mysqli_query($con, $query) or die ("Bad query $query");
   
   //echo $customer_email , $customer_password, $customer_fname , $customer_lname , $customer_phone;
   
   //echo "<br>";
   //echo $query;
   //echo "<br>";

   if ($result)


   {


      $_SESSION['valid_recipe_user'] = $customer_email;

	  echo "<b>Email: </b>" . $customer_email . "<br>";
	  echo "<b>You pass has been encrypted </b>" . "<br>"; 
	  echo "<b>First Name: </b>" . $customer_fname . "<br>"; 
	  echo "<b>Last Name: </b>" . $customer_lname . "<br>"; 
	  echo "<b>Phone Number: </b>" . $customer_phone . "<br>";
	  
      echo "<br>";
      echo "<br>";	  
	  
      echo "<h2>Your information has been accepted!</h2>\n";

	  echo "<h2>We will reach out to you promptly and within 24 hours.</h2>\n";
      echo "<br>";
      echo "<br>";
	  
      //echo "<a href=\"index.php\">Return to Home</a>\n";


      echo "<b> PRIVACY POLICY:  </b> We are committed to keeping your data confidential. We do not sell, rent, or lease our contact data or lists to third parties, and we will not provide your personal information to any third party individual, government agency, or company at any time unless compelled to do so by law.</p>";	  
	  
	

      exit;


   } else


   {


      echo "<h2>Sorry, there was a problem processing your login request</h2><br>\n";


      echo "<a href=\"index.php?content=register\">Try again</a><br>\n";


      echo "<a href=\"index.php\">Return to Home</a>\n";


   }


}


?>

