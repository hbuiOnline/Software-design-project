
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link rel="stylesheet" type="text/css" href="css/main2.css">

	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="js-tilt" data-tilt>
					<img style="width: 25rem;" src="images/signin_undraw.svg" alt="">
				</div>

				<form class="login100-form validate-form" action="includes/login.inc.php" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

					<?php
					if (isset($_GET['error'])) { //when we have something equal to something in URL, use _GET method
						if ($_GET['error'] == "emptyfields") {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Please fill in all fields.
						  </div>';
						} elseif ($_GET['error'] == 'wrongpwd') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Incorrect password.
						  </div>';
						} elseif ($_GET['error'] == 'nouser') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							That username is not recognized.
						  </div>';
						} elseif ($_GET['error'] == 'sqlerror') {
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Database error.
						  </div>';
						}
					} elseif (isset($_GET['newpwd'])) {
						if ($_GET['newpwd'] == "passwordupdated") {
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
							Password has been reset!
						  </div>';
						}
					}

					?>

					<div class="wrap-input100" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login-submit">
							Log In
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

						<a class="txt2" href="signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					<!-- <div class="text-center p-t-10">

						<a class="txt2" href="fuelquoteform.php">
							Demo User
						</a>

					</div> -->
				</form>

				<!-- No need the Demo For now -->
				<form class="login100-form" action="includes/login.inc.php" method="POST">
					<input type="hidden" name="demousername" value="demoUser">
					<button class="login100-form-btn" type="submit" name="demo-login">
						Demo User
					</button>
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
