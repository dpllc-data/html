<?php
	include 'includes/dbh.inc.php';
	include 'includes/user.inc.php';
	include 'includes/viewuser.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>title</title>
</head>
<body>
<?php
	$users = new ViewUser();
	$sers -> showAllUsers();
?>
</body>
</html>