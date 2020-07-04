<?php

class ClientProfileControl extends ClientProfile
{

  public function updateProfileInput($clientUserId, $clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip)
  {
    if (!preg_match("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName)) {
      header("Location: ../profilemanager.php?error=invalidname");
      exit();
    } elseif (!preg_match("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $clientAddress1)) {
      header("Location: ../profilemanager.php?error=invalidaddress");
      exit();
    } elseif (!preg_match("/^[0-9]{0,100}$/", $clientAddress2)) {
      header("Location: ../profilemanager.php?error=invalidaddress2");
      exit();
    } elseif (!preg_match("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,100}$/", $clientCity)) {
      header("Location: ../profilemanager.php?error=invalidcity");
      exit();
    } elseif (!preg_match("/^[A-Z]{2}$/", $clientState)) {
      header("Location: ../profilemanager.php?error=invalidstate");
      exit();
    } elseif (!preg_match("/^[0-9]{5,9}$/", $clientZip)) {
      header("Location: ../profilemanager.php?error=invalidzip");
      exit();
    } else {
      $this->updateProfile($clientUserId, $clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip);
    }
  } //End of validateUserInput


}
