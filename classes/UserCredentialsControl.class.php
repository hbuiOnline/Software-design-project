<?php

class UserCredentialsControl extends UserCredentials
{

  //Properties
  public function validateUserInput($userEmail, $userName, $userPassword, $confirmPassword)
  {
    if (empty($userEmail) || empty($userName) || empty($userPassword) || empty($confirmPassword)) {
      header("Location: ../signup.php?error=emptyfield&uid=" . $userName . "&mail=" . $userEmail);
      exit();
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
      header("Location: ../signup.php?error=invalidemailuid");
      exit();
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) { //This use to check if the email is valid
      header("Location: ../signup.php?error=invalidemail&uid=" . $userName);
      exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
      header("Location: ../signup.php?error=invaliduid&mail=" . $userEmail);
      exit();
    } elseif ($userPassword !== $confirmPassword) { //Check if the password and confirmation match
      header("Location: ../signup.php?error=passwordcheck&uid=" . $userName . "&mail=" . $userEmail);
      exit();
    } else {
      $this->validateUserCreate($userEmail, $userName, $userPassword);
    }
  } //End of validateUserInput

  public function userLoginInput($mailUser, $userPassword)
  {
    if (empty($mailUser) || empty($userPassword)) {
      header("Location: ../index.php?error=emptyfields");
      exit();
    } else {
      $this->userLogin($mailUser, $userPassword);
    }
  } //end of userLoginInput

  public function demoUserLoginInput($demoUsername){
    $this->demoUserLogin($demoUsername);
  } // End demoUserLoginInput

  public function usersPwdUpdateInput($userId, $currentPwd, $newPwd, $confirmNewPwd)
  {
    if (empty($currentPwd) || empty($newPwd) || empty($confirmNewPwd)) {
      header("Location: ../passwordmanager.php?error=emptyfield");
      exit();
    }
    elseif ($newPwd !== $confirmNewPwd) {
      header("Location: ../passwordmanager.php?error=newpwdnotmatch");
      exit();
    }
    else {
      $this->usersPwdUpdate($userId, $currentPwd, $newPwd);
    }

  }//End usersPwdUpdateInput

  public function userResetPwdEmailInput($userEmail){
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) { //This use to check if the email is valid
      header("Location: ../forgotpassword.php?error=invalidemail");
      exit();
    }
    elseif (empty($userEmail)) {
      header("Location: ../forgotpassword.php?error=emptyfield");
      exit();
    }
    else {
      $this->userResetPwdEmail($userEmail);
    }
  } //End userResetPwdEmailInput

  public function userResetPwdInput($selector, $validator, $password, $passwordRepeat)
  {
    if(empty($password) || empty($passwordRepeat) || empty($selector) || empty($validator)){
      header("Location: ../create-newpwd.php?newpwd=empty");
      exit();
    } elseif ($password != $passwordRepeat) {
      header("Location: ../create-newpwd.php?newpwd=pwdnotsame");
      exit();
    }
    $this->userResetPwd($selector, $validator, $password);
  }//End userResetPwdInput

}
