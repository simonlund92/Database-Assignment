<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php

$user = $_GET['user'];
$_SESSION["loggedIn"] = $user;


include ('class/database.php');

$database = new database;
$database->connectDatabase();

$sql = "SELECT * FROM user WHERE name = '$user'";
$users = $database->query($sql);
?>

<article class="profilinfo">
<h3>Personal Information</h3>
<p>Name: <?php echo $users[0]['name'];?></p>
<p>Age: <?php echo $users[0]['age'];?></p>
<p>Location: <?php echo $users[0]['location'];?></p>
<p>Superpower: <?php echo $users[0]['superpower'];?></p>

<form action="update.php" method="GET">
  <fieldset>
    <legend>Update Profile:</legend>
    Name: <br>
    <input type="text" name="name" value="<?php echo $users[0]['name'];?>">
    <br>
    Age:<br>
    <input type="text" name="age" value="<?php echo $users[0]['age'];?>">
    <br>
    Location:<br>
    <input type="text" name="location" value="<?php echo $users[0]['location'];?>">
    <br>
    Superpower:<br>
    <input type="text" name="superpower" size="" value="<?php echo $users[0]['superpower'];?>">
    <br>
    <br>
    <input type="submit" value="Update info">
  </fieldset>
</form>
</article>

<article class="comments">
<h3>Profile comments</h3>
<?php  
$sql = "SELECT * FROM `profilecomment` WHERE receiver = '$user'";
$comments = $database->query($sql);
			
	// Loop through all comments
	foreach ($comments as $row ) {
?>	
	<section class="profilecomment">
	<h4>Sender: <?php echo $row['sender'];?></h4>
	<p>Message: <?php echo $row['message'];?></p>
	<form action="deleteComment.php">
	<input type="Submit" name="deleteComment" value="Delete comment">
	<input type="hidden" name="commentId" value="<?php echo $row['id']?>">
	</form>
	</section>

<?php
	}


?>
</article>

<article class="privatemessage">
<h3>Private Messages</h3>
<?php  
$sql = "SELECT * FROM `privatemessage` WHERE receiver = '$user'";
$privateMessages = $database->query($sql);
			
	// Loop through all messages
	foreach ($privateMessages as $row ) {
?>	
	<section class="message">
	<h4>Sender: <?php echo $row['sender'];?></h4>
	<p>Message: <?php echo $row['message'];?></p>
	<form action="deleteMessage.php">
	<input type="Submit" name="deleteMessage" value="Delete message">
	<input type="hidden" name="messageId" value="<?php echo $row['id']?>">
	</form>
	</section>

<?php
	}
?>
</article>
<?php
	$sql = "SELECT name FROM user";
	$users = $database->query($sql);
?>



<article class="otherusers">
	<h1>Other Users!</h1>

			<?php
	// Loop through all users
	foreach ($users as $row ) {
?>	
		<ul><a href="otherProfile.php?name=<?php echo $row['name']?>"><?php echo $row['name'];?></a></ul>
<?php
	}
?>
</article>

</body>
</html>