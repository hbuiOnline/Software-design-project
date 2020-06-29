<?php

session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/vendor/autoload.php';

class clientProfile extends Dbh
{

  protected function updateProfile($clientUserId, $clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip)
  {

<<<<<<< HEAD
    $sql = "SELECT * FROM clientProfile WHERE clientUserId=?;"; // ? is a placeholder
=======
    $sql = "SELECT * FROM clientProfile WHERE clientUserId = ?"; // ? is a placeholder
>>>>>>> e25ac94f4bb269b3bff78104426af642da632e6a

    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../profilemanager.php?error=sqlError");
      exit();
    } else {
      $stmt->execute([$clientUserId]);
      $resultCheck = $stmt->fetchColumn();

      if ($resultCheck == true) {
        $sql = "UPDATE clientProfile SET clientName = ?, clientAddress1 = ?, clientAddress2 = ?, clientCity = ?, clientState = ?, clientZip = ? WHERE clientUserId = ?;";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
          header("Location: ../profilemanager.php?clientUserId=" . $clientUserId . "&error=sqlerror");
          exit();
<<<<<<< HEAD
        }
        else {
          $stmt->execute([$clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip, $clientUserId]);
          header("Location: ../profilemanager.php?tid=" . $clientUserId . "&editprofile=successupdate");
=======
        } else {
          $stmt->execute([$clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip, $clientUserId]);
          header("Location: ../profilemanager.php?clientUserId=" . $clientUserId . "&editprofile=success");
>>>>>>> e25ac94f4bb269b3bff78104426af642da632e6a
          exit();
        }

      } else {

        $sql = "INSERT INTO clientProfile (clientUserId, clientName, clientAddress1, clientAddress2, clientCity, clientState, clientZip) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
          header("Location: ../profilemanager.php?error=sqlerror");
          exit();
        } else {
          $stmt->execute([$clientUserId, $clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip]);
          header("Location: ../profilemanager.php?&editprofile=successinsert");
          exit();
        }
        // $this->connect()->null;
      }
    }
  }


  protected function clientProfileData()
  {
    $clientProfileData = array();
    $clientUserId = $_SESSION['id'];

    $sql = "SELECT * FROM clientProfile WHERE clientUserId = ?";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt) {
      header("Location: ../clientProfile.php?clientUserId=" . $clientUserId . "&error=sqlerror");
      return NULL;
      exit();
    } else {
      $stmt->execute([$clientUserId]);
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $clientProfileData = array(
          "name" => $row['clientName'],
          "address1" => $row['clientAddress1'],
          "address2" => $row['clientAddress2'],
          "city" => $row['clientCity'],
          "state" => $row['clientState'],
          "zip" => $row['clientZip']
        );
      }
    }
    return $clientProfileData;
  } //End of ticketHistoryData
} // end of class
