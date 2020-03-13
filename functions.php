<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB()
{
	// connect to the DB and returns a reference to the DB
	// require_once('protected/config.php');
	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}else{
		return $conn;
	}
}

function runQuery($db, $query) {

	// takes a reference to the DB and a query and returns the results of running the query on the database
	if(isset($query) && !empty($query)){
		$result = $db->query($query);
		if(!empty($result) && isset($result)){
			return $result;
		}else{
			echo "query is empty";
		}
	}

}

function printOption($statement, $count){
	echo "<option value='".$count."'>".$statement."</option>";
}


?>
