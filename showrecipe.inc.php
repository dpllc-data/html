<?php
$con = mysqli_connect("localhost:3306", "root", "~Leodis27", "datapandemonium") or  die('Sorry, could not connect to server');

$service_id = $_GET['id'];

$query = "SELECT service_id,service_name,service_rate,service_desc, yt_video_id from service where service_id = '$service_id'";

$result = mysqli_query($con, $query) or die('Sorry, could not find record requested');
$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('No records retrieved');
// echo "$service_id<br><br>\n";

//while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
 //  {
$service_name = $row['service_name'];
$service_desc = $row['service_desc'];
$yt_video_id = $row['yt_video_id'];
       //$comment = nl2br($comment);

       //echo "$date  - posted by  $poster<br>\n";
       //echo "$comment\n";
      // echo "<br><br>\n";
 // }
echo "<h2>$service_name</h2>";
echo "$service_desc<br><br>";
$url = 'https://www.youtube.com/watch?v='.$yt_video_id;
echo '<br>';
echo '<a href="'.$url.'">'.$url.'</a>';
echo '<br>';
echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . stripslashes($row['yt_video_id']) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
//echo "$yt_video_id";

//$video = <iframe width="560" height="315" src="https://youtu.be/fMTvi3Rys-o" frameborder="0" allowfullscreen></iframe>;
//echo $video;
// $title = $row['service_name'];
// $poster = $row['service_desc'];


// $shortdesc = $row['shortdesc'];
// $ingredients = $row['ingredients'];
// $directions = $row['directions'];

// $ingredients = nl2br($ingredients);
// $directions = nl2br($directions);

//echo "<h2>$title</h2>\n";

//echo "$poster <br><br>\n";
// echo "$shortdesc<br><br>\n";
// echo "<h3>Ingredients:</h3>\n";
// echo "$ingredients<br><br>\n";

// echo "<h3>Directions:</h3>\n";
// echo "$directions";
//echo "<br><br>\n";

// query = "SELECT count(commentid) from comments where recipeid = $recipeid";
// $result = mysqli_query($con, $query);
// $row=mysqli_fetch_array($result);
/*
if ($row[0] == 0)
{
   echo "No service selected yet.&nbsp;&nbsp;\n";
//   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";
//   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
   echo "<hr>\n";
} else
{
	
   $totrecords = $row[0];

   echo "$totrecords comments posted\n";

   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";

   echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";

   echo "<hr>\n";

   echo "<h2>Comments:</h2>\n";


   $totrecords = @$row[0];
   if (!isset($_GET['page']))

      $thispage = 1;

   else

      $thispage = $_GET['page'];

   $recordsperpage = 5;

   $offset = ($thispage - 1) * $recordsperpage;

   $totpages = ceil($totrecords / $recordsperpage);

   $query = "SELECT service_id,service_name,service_rate,service_desc from service where service_id = '$service_id'";

   $result = mysqli_query($con, $query) or die('Could not retrieve comments');
   
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
       $service_name = $row['service_name'];
//       $poster = $row['poster'];
//       $comment = $row['comment'];
//       $comment = nl2br($comment);

//       echo "$date  - posted by  $poster<br>\n";

       echo "<br><br>\n";
   }
   
   echo "$service_name\n";
   
    if ($thispage > 1)

   {

      $page = $thispage - 1;

      $prevpage = "<a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Prev</a>";

   } else

   {

      $prevpage = "";

   }

  $bar = '';

   if ($totpages > 1)

   { 

      for($page = 1; $page <= $totpages; $page++)

      {

         if ($page == $thispage)      

         {

            $bar .= " $page ";

         } else

         {

            $bar .= " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">$page</a> ";

         }

      }

   }

   if ($thispage < $totpages)

   {

      $page = $thispage + 1;

      $nextpage = " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Next</a>";

   } else

   {

      $nextpage = "";

   }

   echo "GoTo: " . $prevpage . $bar . $nextpage;
*/

?>