<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/override2.css">
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="js-tilt" data-tilt>
					<img style="width: 25rem;" src="images/undraw_forgot_password.svg" alt="">
				</div>

        <?php
					//These two values are get from the url through get method
          $selector = $_GET['selector'];
          $validator = $_GET['validator'];

          if (empty($selector) || empty($validator)) {
            echo "Could not validate your request!";
          }
          else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {//Verify if the token are in the correct format
              ?>

              <!-- Dothing this to make the html format easier to see in the text editor -->
              <form class="login100-form validate-form" method="POST" action="includes/passwordmanager.inc.php">
      					<span class="login100-form-title">
      						Password Reset
      					</span>

                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
      					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
      						<input class="input100" type="password" name="newpwd" placeholder="New Password">
      						<span class="focus-input100"></span>
      						<span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
      						</span>
      					</div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
      						<input class="input100" type="password" name="confirm-newpwd" placeholder="Confirm Password">
      						<span class="focus-input100"></span>
      						<span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
      						</span>
      					</div>

      					<div class="container-login100-form-btn">
      						<button type="submit" name="createnewpwd" class="login100-form-btn">
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

              <?php

            }
          }
        ?>



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
