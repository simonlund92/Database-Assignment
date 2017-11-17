<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>processing</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	
	// check what is received through GET
	
	include('class/database.php');
	$database = new Database;
	$database->connectDatabase();

	$user = $_SESSION['loggedIn'];


	$sql = "UPDATE `user` SET `name`= ?,
							  `age`= ?,
							  `location`= ?,
							  `superpower`= ? 
							  WHERE `name` = '$user'";
	
	// Secondly, add values
	$values = array(
		$_GET['name'],
		$_GET['age'],
		$_GET['location'],
		$_GET['superpower']
	);

	// Call prepared function to execute the above
	$database->prepared($sql,$values);

?>
<?php echo "Your profile has been updated!" ?><br>
<button onclick="goBack()">Back to Profile</button>
<script>
function goBack() {
    window.history.back();    
}


</script>


</body>
</html>

