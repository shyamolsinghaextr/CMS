<?php 
	session_start();
	require_once('db_connection.php');
	include 'components/head.php';
	include 'components/navbar.php';
	include 'components/sitebar.php';
	
	$userID = $_SESSION['UserID'];
	$sql = "SELECT * FROM users WHERE id = '$userID'"; 
	$result = mysqli_query($conn, $sql); 
	$user = mysqli_fetch_assoc($result);
	
	if(isset($_POST['Submit'])){
		
		$name = $_POST['name'];
		$username = $_POST['username'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$sql = "UPDATE users SET name = '$name', username = '$username', address = '$address', email ='$email', phone = '$phone', gender = '$gender' WHERE id = $userID";
		$result = mysqli_query($conn, $sql);
		header("Location: profile.php");
	
	}
	

	
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Edit Profile</h2>
        </div>
        <div class="card-body">
            <!-- Edit Profile Form -->
            <form action="profile_edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Address:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Phone:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Gender:</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="gender" required>
                            <option value="Male" <?php if($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if($user['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name= "Submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>
