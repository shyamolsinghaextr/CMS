<?php 
	session_start();
	require_once('db_connection.php');
	include 'components/head.php';
	include 'components/navbar.php';
	include 'components/sitebar.php';
	
	$userID = $_SESSION['UserID'];
	$sql = "SELECT * FROM users WHERE id = '$userID'"; 
	$result = mysqli_query($conn, $sql); 
	$user_data = mysqli_fetch_assoc($result);
?>


<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>User Profile</h2>
        </div>
        <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">ID:</label>
                    <div class="col-sm-9"><?php echo $user_data['id']; ?></div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Name:</label>
                    <div class="col-sm-9"><?php echo $user_data['name']; ?></div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Username:</label>
                    <div class="col-sm-9"><?php echo $user_data['username']; ?></div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Address:</label>
                    <div class="col-sm-9"><?php echo $user_data['address']; ?></div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Email:</label>
                    <div class="col-sm-9"><?php echo $user_data['email']; ?></div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Phone:</label>
                    <div class="col-sm-9"><?php echo $user_data['phone']; ?></div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 fw-bold">Gender:</label>
                    <div class="col-sm-9"><?php echo $user_data['gender']; ?></div>
                </div>
				
				<div class="text-center">
					<a href='profile_edit.php' class="btn btn-primary">Profile Edit</a>
                </div>
        </div>
    </div>
</div>



<?php include 'components/footer.php';?>