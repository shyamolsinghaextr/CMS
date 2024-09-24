<?php include 'components/head.php';?>
<?php include 'components/navbar.php';?>
<?php include 'components/sitebar.php';?>

<?php 

	session_start();
	require_once('db_connection.php');
	
	
	$sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['UserID']);
    mysqli_stmt_execute($stmt);
    $user = mysqli_stmt_get_result($stmt);
	$user = mysqli_fetch_all($user, MYSQLI_ASSOC);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
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
?>


<?php include 'components/footer.php';?>