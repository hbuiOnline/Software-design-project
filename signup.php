<!DOCTYPE html>
<html lang="en">

<head>
	<title>Member Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For overriding small elements -->
	<link rel="stylesheet" type="text/css" href="css/override2.css">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/LogoNoBackground.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/overmain.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="container">
		<div class="limiter">
			<div class="wrap-login100 signup">
				<div class="js-tilt" data-tilt>
					<img style="width: 30rem;" src="images/undraw_add_user_ipe3.svg" alt="IMG">

				</div>


				<form class="login100-form validate-form" action="includes/signup.inc.php" method="POST">
					<span class="login100-form-title">
						Member Signup
					</span>

					<?php
					if (isset($_GET['error'])) { //when we have something equal to something in URL, use _GET method
						if ($_GET['error'] == "emptyfield") {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Please fill in all fields.
						  </div>';
						} elseif ($_GET['error'] == 'invalidemailuid') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Invalid username and e-mail.
						  </div>';
						} elseif ($_GET['error'] == 'invalidemail') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Invalid email address. Please use the format: ex@abc.xyz
						  </div>';
						} elseif ($_GET['error'] == 'invaliduid') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Invalid username.
						  </div>';
						} elseif ($_GET['error'] == 'userNameTaken') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Sorry, that username is already taken.
						  </div>';
						} elseif ($_GET['error'] == 'passwordcheck') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Passwords do not match.
						  </div>';
						}
					} elseif (isset($_GET['signup'])) {
						if ($_GET['signup'] == "success") {
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Signup successful!
						  </div>';
						}
					}
					?>

					<div class="wrap-input100" data-validate="Valid email is required: ex@abc.xyz.">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" data-validate="Username is required.">
						<input class="input100" type="text" name="uid" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" data-validate="Password is required.">
						<input class="input100" type="password" name="pwd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" data-validate="Password confirmation is required.">
						<input class="input100" type="password" name="pwd-confirm" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="signup-submit">
							Sign Up
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgotpassword.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="index.php">
							Already have an account? Log in
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
