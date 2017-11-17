<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_GET['name'] ?> Profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
include ('class/database.php');

$database = new database;
$database->connectDatabase();

$user = $_GET['name'];


$sql = "SELECT * FROM user WHERE name = '$user'";
$users = $database->query($sql);
?>




<article class="profilinfo">
<h3>Personal Information</h3>
<p>Name: <?php echo $users[0]['name'];?></p>
<p>Age: <?php echo $users[0]['age'];?></p>
<p>Location: <?php echo $users[0]['location'];?></p>
<p>Superpower: <?php echo $users[0]['superpower'];?></p>
</article>
<hr>
<article class="privatemessage">
<h4>Send a private message to <?php echo $user; ?></h4>
<form action="message.php">
	<textarea rows="4" cols="50" name="message"></textarea>
	<input type="hidden" name="receiver" value="<?php echo $user ?>">
    <input type="submit" value="Send message">
</form>
</article>

<article class="comments">
<h3>Profile comments</h3>
<section>
<?php  
$sql = "SELECT * FROM `profilecomment` WHERE receiver = '$user'";
$comments = $database->query($sql);
			
	// Loop through all users
	foreach ($comments as $row ) {
?>	
	<section class="profilecomment">
	<h4>Sender: <?php echo $row['sender'];?></h4>
	<p>Message: <?php echo $row['message'];?></p>
	</section>

<?php
	}


?>
</section>


<h4>Write a comment on <?php echo $user; ?> profile</h4>
<form action="comment.php">
	<textarea rows="4" cols="50" name="comment"></textarea>
	<input type="hidden" name="receiver" value="<?php echo $user ?>">
    <input type="submit" value="Send comment">
</form>
</article>
</body>
</html>
