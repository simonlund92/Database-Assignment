<!DOCTYPE html>
<html>
<head>
	<title>Superhero Dating</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 
	include ('class/database.php');

	$database = new database;
	$database->connectDatabase();
?>
<article class="login">
<h1>Welcome!</h1>
<h3>Sign in as:</h3>
<?php
	
	$sql = "SELECT name FROM user";
	$users = $database->query($sql);
?>
	<form action="profile.php" method="GET">	
	<select name="user">
<?php
	// Loop through all users
	foreach ($users as $row) {
?>	
		<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php
	}
?>
	</select>
	<input type="submit" value="Sign in">
	</form>
	</article>
</body>
</html>


