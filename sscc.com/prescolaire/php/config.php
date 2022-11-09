<?php
class databaseConnection{
	public function __construct(){
		global $conn;
		$conn = new mysqli("localhost", "root", "" , "prescolaire");
		if(!$conn){
			die("Database cannot established connection properly: " . $conn->connect_error());
		}

	}
}

?>
