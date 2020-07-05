<?php

include 'autoloader.inc.php';

if (isset($_POST['resetpwd-submit'])) {

  $userEmail = $_POST['email'];
  $userObj = new UserCredentialsControl();

  $userObj->userResetPwdEmailInput($userEmail);

}
else {
  header("Location: ../forgotpassword.php");
}
