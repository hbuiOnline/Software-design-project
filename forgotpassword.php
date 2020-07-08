<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/override3.css">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/LogoNoBackground.png"/>
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
	<link rel="stylesheet" type="text/css" href="css/main2.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="js-tilt" data-tilt>
					<img style="width: 25rem;" src="images/undraw_forgot_password.svg" alt="">
				</div>

				<form class="login100-form validate-form" method="POST" action="includes/resetpwdrequest.inc.php">
					<span class="login100-form-title">
						Forgot Password
					</span>
					<?php
						if (isset($_GET['reset'])) { //when we have something equal to something in URL, use _GET method
							if ($_GET['reset'] == "success") {
								echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
								Reset Password Request Sent!
								</div>';
							}
						}
						elseif(isset($_GET['error'])){
							if ($_GET['error'] == 'invalidemail') {
								echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
								Invalid email address. Please use the format: ex@abc.xyz
							  </div>';
							}
						}
					 ?>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="resetpwd-submit" class="login100-form-btn">
							Reset Password
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Already have an account? Log in
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
						<br>
						<a class="txt2" href="signup.php">
							Create your Account
							<!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
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
