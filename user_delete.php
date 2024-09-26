<?php 

	session_start();
	require_once('db_connection.php');
	include 'components/head.php';
	include 'components/navbar.php';
	include 'components/sitebar.php';
	
	if(isset($_GET['id'])){	
		$userID = $_GET['id'];
		$sql = "DELETE FROM users WHERE id = '$userID'"; 
		$result = mysqli_query($conn, $sql); 
		header("Location: users.php");
	}

?>