<?php 
class database {

	public $connection;


	public function connectDatabase(){
		$servername = "localhost";
		$username = "root";
		$password = "";

		try {
   			$this->connection = new PDO("mysql:host=$servername;dbname=superherodating", $username, $password);
    		// set the PDO error mode to exception
    		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		// echo "Connected successfully"; 
    	}
		catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
    		die();
    	}

	}

	public function closeDatabase(){
		$conn = null; 
	}

	// To be used for all SELECT and DELETE (no prepared statements)
	public function query($sql) {
		$query = $this->connection->query($sql);
		return $query->fetchAll();
	}

	// To be used for all prepared statements
	// 	$sql [string] - The sql to be prepared with palceholders
	// 	$values [array] - The values to binded to the placeholders
	public function prepared($sql,$values) {
		try {
			$statement = $this->connection->prepare($sql);
			$statement->execute($values);
		}
		catch(PDOException $e) {
		    echo "Could not perform prepared statements: " . $e->getMessage();
		    die();
	    }

	}

	public function deleteQuery($sql) {
		$this->connection->query($sql);
		echo "You have successfully deleted the comment!";
	}


}


?>