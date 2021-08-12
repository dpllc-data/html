<h2 align="center">Services</h2><br>
<?php

$con = mysqli_connect("localhost:3306", "root", "~Leodis27", "datapandemonium") or die('Sorry, could not connect to database server');

/* $query = "SELECT * from service";   */

$query = "SELECT service_id,service_name,service_rate,service_desc from service order by service_id desc limit 0,5"; 
$result = mysqli_query($con, $query) or die('Sorry, could not get recipes at this time ');

if (mysqli_num_rows($result) == 0)
{
   echo "<h3>Sorry, there are no recipes posted at this time, please try back later.</h3>";
} else
{
   while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
       $service_id = $row['service_id'];
       $service_name = $row['service_name'];
       $service_rate = $row['service_rate'];
       $service_desc = $row['service_desc'];
	   if ($service_id == "10")
	   {
		echo "<b> <a href=\"index.php?content=showrecipe&id=$service_id\">$service_name</a> - Starting rate is currently $$service_rate USD / hr <br></b>\n";
		echo"$service_desc<br><br>\n";
	   }
	   elseif ($service_id == "20")
	   {
		echo "<b> <a href=\"index.php?content=showrecipe&id=$service_id\">$service_name</a> - Starting rate is currently $$service_rate USD per product <br></b>\n";
		echo"$service_desc<br><br>\n";
	   }
	   else
	   {
		 echo "<b> <a href=\"index.php?content=showrecipe&id=$service_id\">$service_name</a> - Starting rate is currently $$service_rate USD for a small to midsized database <br> </b>\n";
		echo"$service_desc<br><br>\n";
	   }
   }	
}

?>