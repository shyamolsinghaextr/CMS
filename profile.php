<?php 

	include 'components/head.php';
	include 'components/navbar.php';
	include 'components/sitebar.php';
	
	session_start();
	require_once('db_connection.php');
	
	
	$userID = $_SESSION['UserID'];
	$sql = "SELECT * FROM users WHERE id = '$userID'"; 
	$result = mysqli_query($conn, $sql); 
	$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	foreach($user as $user_data) {
		echo $user_data['id'].'<br>';
		echo $user_data['name'].'<br>';
		echo $user_data['username'].'<br>';
		echo $user_data['address'].'<br>';
		echo $user_data['email'].'<br>';
		echo $user_data['phone'].'<br>';
		echo $user_data['gender'].'<br>';
		echo $user_data['password'].'<br>';
	}
	
	include 'components/footer.php';
?>