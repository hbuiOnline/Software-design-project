<?php
  include 'includes/autoloader.inc.php';

    // $userObj = new UserCredentialsView();
    $clientObj = new ClientProfileView();
    $clientData = $clientObj->getClientData();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password Manager</title>
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
    <link rel="stylesheet" type="text/css" href="css/overmain.css">
    <!--===============================================================================================-->
</head>





<body>
  <div class="container">
    <?php
    include 'navbar.php';
    ?>
    <div class="limiter">
            <div class="wrap-login100">
                <div class="js-tilt" data-tilt>
                    <img style="width: 30rem;" src="images/undraw_my_password_d6kg.svg" alt="IMG">
                </div>

                <form action="includes/passwordmanager.inc.php" class="login100-form validate-form" method="POST">
                    <span class="login100-form-title">
                        Manage Password
                    </span>

                    <?php
                    if (isset($_GET['error'])) { //when we have something equal to something in URL, use _GET method
                      if ($_GET['error'] == "emptyfield") {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please fill in all fields.
                        </div>';
                      } elseif ($_GET['error'] == 'newpwdnotmatch') {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        New passwords are not match.
                        </div>';
                      } elseif ($_GET['error'] == 'sqlerror') {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        SQL Error
                        </div>';
                      } elseif ($_GET['error'] == 'notcurrentpwd') {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        The current password is incorrect.
                        </div>';
                      } elseif ($_GET['error'] == 'nouser') {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Current user is unavailable
                        </div>';
                      }
                    } elseif (isset($_GET['newpwdset'])) {
                      if ($_GET['newpwdset'] == "success") {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Password has been updated successful!
                        </div>';
                      }
                    }

                     ?>

                    <input type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>">
                    <div class="wrap-input100 validate-input" data-validate="Current password is required.">
                        <input class="input100" type="password" name="currentpass" placeholder="Enter Current Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="New password is required.">
                        <input class="input100" type="password" name="newpassword" placeholder="Enter New Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Re-enter new password please.">
                        <input class="input100" type="password" name="newpassword-repeat" placeholder="Re-enter New Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="password-update">
                            Change Password
                        </button>
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
