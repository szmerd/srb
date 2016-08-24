<?php
function dbConnect (){
 	$conn =	null;
 	$host = 'localhost';
 	$db = 	'srb_db';
 	$user = 'root';
 	$pwd = 	'root';
	try {
	   	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
	}
	catch (PDOException $e) {
		echo '<p>Cannot connect to database !!</p>';
		echo '<p>'.$e.'</p>';
	    exit;
	}
	return $conn;
 }

 ?>