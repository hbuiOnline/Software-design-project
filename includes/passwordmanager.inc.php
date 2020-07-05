<?php

include 'autoloader.inc.php';

if (isset($_POST['password-update'])) {

  $userObj = new UserCredentialsControl();

  $userId = $_POST['uid'];
  $currentPwd = $_POST['currentpass'];
  $newPwd = $_POST['newpassword'];
  $confirmNewPwd = $_POST['newpassword-repeat'];

  $userObj->usersPwdUpdateInput($userId, $currentPwd,$newPwd, $confirmNewPwd);

}
elseif (isset($_POST['createnewpwd'])) {

  $userObj = new UserCredentialsControl();

  $selector = $_POST['selector'];
  $validator = $_POST['validator'];
  $password = $_POST['newpwd'];
  $passwordRepeat = $_POST['confirm-newpwd'];

  $userObj->userResetPwdInput($selector, $validator, $password, $passwordRepeat);

}
else {
  header("Location: ../passwordmanager.php");
}
