<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>
	.color{
		background-color: #5A639C;
		/*display: flex;
		justify-content: center;
		align-items: center;*/
		color:white;
		}
	.wrong{
		text-shadow: -1px 0 red, 0 1px red, 1px 0 red, 0 -1px red;
		
	}
		
	.transition {
		  width: 500px;
		  height: 40px;
		  background: #E2BBE9;
		  transition: width 2s;
		}
	.transition:focus {
		  width: 700px;
		}
	.hover:hover{
			background:white;
		}
	.sub{
			background:#E2BBE9; height:50px; width:110px;
		}
	.sub:hover{	
			background-color:white;
		}
	</style>
		
</head>

<body class='color' >

	<?php
	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']," ");
		$lname = trim($_POST['lname']," ");
		$date = $_POST['date'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$gender= $_POST['gender'];
		
			
		if(empty($fname) or !preg_match("/^[a-zA-Z ]*$/", $fname) or strlen($fname) > 50){
			$error['fname'] = 'Sudhu Alphabet Bebohar korun<br>';
		}
		else if(empty($lname) or !preg_match("/^[a-zA-Z ]*$/", $lname) or strlen($lname) > 50){
			$error['lname'] = 'Sudhu Alphabet Bebohar Korun<br>';
		}
		else if(empty($date)){
			$error['date'] = 'Apnar Date Of Birth Din<br>';
		}
		else if ($_POST['gender'] == 'select') {
			$error['gender']='Please select a gender<br>';
		} 
		
		else if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL) or strlen($email) > 40){
			$error['email'] = 'Apnar Email address din<br>';
		}
		else if(empty($phone) or preg_match("/^[a-zA-Z ]*$/", $phone) or strlen($phone) != 11){
			$error['phone'] = 'Apnar 11 digite Er Mobile Number Din<br>';
		}
		else if(substr($phone, 0, 1) != 0 and substr($phone, 1, 1) != 1){
			$error['phone']='Sothik number din<br>';
		}

		else if(empty($password) or strlen($password) < 8 or strlen($password) > 20){
			$error['password'] = '8-20 digite Er Password Din<br>';
		}
		else if(empty($password2) or strlen($password2) < 8 or strlen($password2) > 20){
			$error['password2'] = 'Confirm your password<br>';
		}
		else if($password!=$password2){
			$error['password2'] = 'Not Match password<br>';
		}
		else {
			$done ='Dhonnobad Apnar Ragistration Sofol Hoyese';
		}
	}
	?>
	<?php

	if(!isset($done)){?>
		<div class="container color ps-5">
			<form class="mt-3 ms-5 p-5" method="POST" action="">
				<div><h2>Create An Account</h2></div>
				<div class="mb-5"><h5>Register Here</h5></div>
				<div>
						<?php
							if(isset($error['fname'])){
								echo '<label  class="form-label wrong" for="fname">'.$error['fname'].'</label>'.'<br>';
							}
							else if(isset($_POST['submit']) and !isset($error['fname']) and !empty($fname)){
								echo' <label for="fname" class="form-label ">First name <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
							}
							else{
								echo' <label for="fname" class="form-label ">First name</i> </label>'.'<br>';
							}
						?>
						<input type="text" class="transition border border-light border-2 hover" id="fname" name="fname" 
						value="<?php if(isset($_POST['submit']) and !isset($error['fname'])){echo $fname;}?>" placeholder="Enter Your Name"><br><br>
				</div>
				<div>
					  <?php
							if(isset($error['lname'])){
							echo '<label  class="form-label wrong" for="lname">'.$error['lname'].'</label>'.'<br>';
							}
							else if(isset($_POST['submit']) and !isset($error['lname']) and !empty($lname)){
								echo' <label for="lname" class="form-label ">Last Name <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
							}
							else{
								echo' <label for="lname" class="form-label ">Last Name</label>'.'<br>';
							}
						?>
						<input type="text" class="transition border border-light border-2 hover" id="lname" name="lname" 
						value="<?php if(isset($_POST['submit']) and !isset($error['lname'])){echo $lname;}?>" placeholder="Enter Your Name"><br><br>
				</div>
				<div>
					  <?php
							if(isset($error['date'])){
							echo '<label  class="form-label wrong" for="date">'.$error['date'].'</label>'.'<br>';
							}
							else if(isset($_POST['submit']) and !isset($error['date']) and !empty($date)){
								echo' <label for="date" class="form-label ">Date of Birth <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
							}
							else{
								echo' <label for="date" class="form-label ">Date of Birth</label>'.'<br>';
							}
						?>
						<input type="date" class="transition border border-light border-2 hover" id="date" name="date"
						value="<?php if(isset($_POST['submit']) and !isset($error['date'])){echo $date;}?>"><br><br>
				</div>
				<div>
					 <?php
							if( isset($error['gender'])){
							echo '<label  class="form-label wrong" for="date">'.$error['gender'].'</label>'.'<br>';
							}
							else if(isset($_POST['submit']) and !isset($error['gender']) and !empty($gender)){
								echo' <label for="gender" class="form-label ">Gender <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
							}
							else{
								echo' <label for="gender" >Gender</label>'.'<br>';
							}
						?>
			
					<select class='transition border border-light border-2 hover' id="gender" name="gender" ><br><br>
					<option value="select" <?php if(isset($_POST['submit'])and !isset($error['gender'])){echo ($gender == 'select') ? 'selected' : '';} ?>>Select Gender</option>
					<option value="male" <?php if(isset($_POST['submit']) and !isset($error['gender'])){echo ($gender == 'male') ? 'selected' : '';} ?>>Male</option>
					<option value="female" <?php if(isset($_POST['submit'])and !isset($error['gender'])){echo ($gender == 'female') ? 'selected' : '';} ?>>Female</option>
					<option value="other" <?php if(isset($_POST['submit'])and !isset($error['gender'])){echo ($gender == 'other') ? 'selected' : '';} ?>>Other</option>
					</select><br><br>
				</div>
				<div>
					<?php
						if(isset($error['email'])){
						echo '<label  class="form-label wrong" for="email">'.$error['email'].'</label>'.'<br>';
						}
						else if(isset($_POST['submit']) and !isset($error['email']) and !empty($email)){
							echo' <label for="email" class="form-label ">Email Address <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
						}
						else{
							echo' <label for="email" >Email Address</label>'.'<br>';
						}
					?>
					
					<input class='transition border border-light border-2 hover' type="email" id="email" name="email"
					value="<?php if(isset($_POST['submit']) and !isset($error['email'])){echo $email;}?>" placeholder="Enter Your email"><br><br>
				</div>
				<div>
					<?php
						if(isset($error['phone'])){
						echo '<label  class="form-label wrong" for="phone">'.$error['phone'].'</label>'.'<br>';
						}
						else if(isset($_POST['submit']) and !isset($error['phone']) and !empty($phone)){
							echo' <label for="phone" class="form-label ">Phone No<i class="fa-regular fa-square-check"></i> </label>'.'<br>';
						}
						else{
							echo' <label for="phone" >Phone No</label>'.'<br>';
						}
					?>
					
					<input class='transition border border-light border-2 hover' type="text" id="phone" name="phone" 
					value="<?php if(isset($_POST['submit']) and !isset($error['phone'])){echo $phone;}?>" placeholder="Enter Your 11 digite mobile no"><br><br>
				</div>
				<div>
					<?php
						if(isset($error['password'])){
						echo '<label  class="form-label wrong" for="password">'.$error['password'].'</label>'.'<br>';
						}
						else if(isset($_POST['submit']) and !isset($error['password']) and !empty($password)){
							echo' <label for="password" class="form-label ">Password <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
						}
						else{
							echo' <label for="password" >Password</label>'.'<br>';
						}
					?>
					
					<input class='transition border border-light border-2 hover' type="password" id="password" name="password"
					value="<?php if(isset($_POST['submit']) and !isset($error['password'])){echo $password;}?>" placeholder="set password"><br><br>
				</div>
				<div>
					<?php
						if(isset($error['password2'])){
						echo '<label  class="form-label wrong" for="password2">'.$error['password2'].'</label>'.'<br>';
						}
						else if(isset($_POST['submit']) and !isset($error['password2']) and !empty($password2)){
							echo' <label for="password2" class="form-label ">Confirm Password <i class="fa-regular fa-square-check"></i> </label>'.'<br>';
						}
						else{
							echo' <label for="password2" >Confirm Password</label>'.'<br>';
						}
					?>
					
					<input class='transition border border-light border-2 hover' type="password" id="password2" name="password2"
					value="<?php if(isset($_POST['submit']) and !isset($error['password2'])){echo $password2;}?>" placeholder="Confirm password"><br><br>
				</div>
				
				<button type="submit" name="submit" class="sub">Registar</button>
			</form>
		</div>
	<?php }?>
	<?php
if(isset($done)){
	echo $done.'<br><br><br>';
    echo 'first name : '.$fname.'<br>','Last name : '.$lname.'<br>','Birth : '.$date.'<br>','email : '.$email.'<br>',
	'Phone : '.$phone.'<br>','Gender : '.$gender.'<br>';
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>