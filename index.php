<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
  <?php
  
  session_start();
  
  if(isset($_SESSION["Login"])){
	  header("Location: dashboard.php");
  }
  
  require_once('db_connection.php');
  
    $error = "";
    $success = "";
    
    if (isset($_POST['submit'])) {
		
        $phone = $_POST['phone'];
        $password = $_POST['password'];
    
        if(empty($phone)) {
            $error = 'Please fill in your phone number.';
        }
        else if(empty($password)) {
            $error = 'Please fill in your password.';
        }
        else if(strlen($password) < 8 || strlen($password) > 20) {
            $error = 'Password must be 8-20 characters long.';
        }
        else{
			
			$sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$password'"; 
			$result = mysqli_query($conn, $sql); 
			$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
			foreach ($user as $user_data) {
				echo "Login successful. Welcome ".$user_data['name']."<br>";
				$_SESSION["Login"] = "logged in";
				$_SESSION["UserID"] = $user_data['id'];
				header("Location: dashboard.php");
			}
			
		}
    }
    ?>

    <section class="vh-100 background-section">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong pt-0" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                <form method="POST" action="">
                  <h3 class="mb-4 text-warning fw-bold">LOG IN</h3>

                  <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                  <?php elseif ($success): ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?>
                    </div>
                  <?php endif; ?>
      
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-warning fs-5" for="typeTextX-2">Email or Phone</label>
                    <input type="text" name="phone" id="typeTextX-2" class="form-control form-control-lg" value="<?php if (isset($phone)) { echo $phone; } ?>" placeholder="Enter Your Email or Phone"/>
                  </div>
      
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-warning fs-5" for="typePasswordX-2">Password</label>
                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" value="<?php if (isset($password)) { echo $password; } ?>" placeholder="Enter Your Password"/>
                  </div>

                  <div class="d-flex justify-content-end">
                    <p class="small mb-1 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                  </div>
      
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg btn-block" type="submit" name="submit">Login</button>
      
                  <hr class="my-4 text-warning">

                  <div class="second d-flex justify-content-center text-center mt-1 pt-1">
                    <p class="mb-0 text-warning">Create new account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a></p>
                  </div>

                  <p class="text-warning fs-4 m-0 p-0">or</p>

                  <div class="social-icon">
                    <a href="!#"><i class="fa-brands fa-google"></i></a>
                    <a href="!#"><i class="fa-brands fa-facebook"></i></a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <script src="Assets/js/bootstrap.min.js"></script>
</body>
</html>