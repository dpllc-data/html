<?php


$con = mysqli_connect("localhost:3306", "root", "~Leodis27", "datapandemonium") or die('Sorry, could not connect to the database or server');


$customer_email = $_POST['customer_email'];


$customer_password = $_POST['customer_password'];

$hashed = hash('sha512', $customer_password);

$query = "SELECT customer_email from customer where customer_email = '$customer_email' and customer_password = '$hashed'";


$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) == 0)


{


    echo "<h2>Sorry, your user account was not validated.</h2><br>\n";


    echo "<a href=\"index.php?content=login\">Try again</a><br>\n";


    echo "<a href=\"index.php\">Return to Home</a>\n";


} else


{   


   $_SESSION['valid_recipe_user'] = $customer_email;


   echo "<h2>Your user account has been validated.</h2><br>\n";


   echo "<a href=\"index.php\">Return to Home</a>\n";


}


?>