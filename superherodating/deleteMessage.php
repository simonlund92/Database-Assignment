<?php 

	include('class/database.php');
	$database = new Database;
	$database->connectDatabase();


	$messageId = $_GET['messageId'];



	$sql = "DELETE FROM privatemessage WHERE id = '$messageId'";
	$delete = $database->deleteQuery($sql);

?>
	<button onclick="goBack()">Back to Profile</button>
<script>
function goBack() {
    window.history.back();    
}
</script>

	

