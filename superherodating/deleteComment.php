<?php 

	include('class/database.php');
	$database = new Database;
	$database->connectDatabase();

	$commentId = $_GET['commentId'];


	$sql = "DELETE FROM profilecomment WHERE id = '$commentId'";
	$delete = $database->deleteQuery($sql);


?>
	<button onclick="goBack()">Back to Profile</button>
<script>
function goBack() {
    window.history.back();    
}
</script>

	


 