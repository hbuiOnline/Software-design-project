<?php

session_start();

class clientProfile extends Dbh
{

  protected function updateProfile($clientUserId, $clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip)
  {

    $sql = "SELECT * FROM clientProfile WHERE clientUserId = ?"; // ? is a placeholder

    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../profilemanager.php?error=sqlError");
      exit();
    } else {
      $stmt->execute([$clientUserId]);

      //setting session variable

      // if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      //   $_SESSION['client'] = $row['clientId'];
      // }

      $resultCheck = $stmt->fetchColumn();
      if ($resultCheck == true) {
        $sql = "UPDATE clientProfile SET clientName = ?, clientAddress1 = ?, clientAddress2 = ?, clientCity = ?, clientState = ?, clientZip = ? WHERE clientUserId = ?";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
          header("Location: ../profilemanager.php?clientUserId=" . $clientUserId . "&error=sqlerror");
          exit();
        } else {
          $stmt->execute([$clientName, $clientAddress1, $clientAddress2, $clientCity, $clientState, $clientZip, $clientUserId]);

          //setting client session variable
          $sql = "SELECT * FROM clientProfile WHERE clientUserId = ?;";
          $stmt = $this->connect()->prepare($sql);

          if (!$stmt) {
            header("Location: ../profilemanager.php?error=sqlError");
            exit();
          } else {
            $stmt->execute([$_SESSION['id']]);

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $_SESSION['client'] = $row['clientId'];              
            }
          }

          header("Location: ../profilemanager.php?clientUserId=" . $clientUserId . "&editprofile=success");
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

          //setting client session variable
          $sql = "SELECT * FROM clientProfile WHERE clientUserId = ?;";
          $stmt = $this->connect()->prepare($sql);

          if (!$stmt) {
            header("Location: ../profilemanager.php?error=sqlError");
            exit();
          } else {
            $stmt->execute([$_SESSION['id']]);

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $_SESSION['client'] = $row['clientId'];              
            }
          }

          header("Location: ../profilemanager.php?&editprofile=success");
          exit();
        }
        $this->connect()->null;
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
