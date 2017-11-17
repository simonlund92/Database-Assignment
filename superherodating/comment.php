<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>comment</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	
	// check what is received through GET
	
	include('class/database.php');
	$database = new Database;
	$database->connectDatabase();

	$user = $_SESSION['loggedIn'];


	$sql = "INSERT INTO profilecomment ( 
							sender, 
							receiver, 
							message 							 					
						) 
			VALUES (?,?,?)";
	

	// Secondly, add values
	$values = array(
		$user,
		$_GET['receiver'],
		$_GET['comment']
	);
	// Call prepared function to execute the above
	$database->prepared($sql,$values);

?>
<?php echo "You have successfuly posted a comment!" ?><br>
<button onclick="goBack()">Back to <?php echo $_GET['receiver'] ?> Profile</button>
<script>
function goBack() {
    window.history.back();    
}


</script>


</body>
</html>

