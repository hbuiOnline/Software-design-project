<?php

session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/vendor/autoload.php';

class UserCredentials extends Dbh
{

  protected function validateUserCreate($userEmail, $userName, $userPassword)
  {
    $sql = "SELECT userName FROM userCredentials WHERE userName=?"; // ? is a placeholder

    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../signup.php?error=sqlError");
      exit();
    } else {
      $stmt->execute([$userName]);
      $resultCheck = $stmt->fetchColumn();

      if ($resultCheck == true) {
        header("Location: ../signup.php?error=userNameTaken&mail=" . $userEmail);
        exit();
      } else {
        $sql = "INSERT INTO userCredentials (userName, userEmail, userPassword) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt) {
          header("Location: ../signup.php?error=sqlError");
          exit();
        } else {
          $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);
          $stmt->execute([$userName, $userEmail, $hashedPwd]);
          header("Location: ../signup.php?signup=success");
          exit();
        }
        $this->connect()->null;
      }
    }
  } //End of validateUserCreate

  protected function userLogin($mailUser, $userPwd)
  {

    $sql = "SELECT * FROM userCredentials WHERE userName = ? OR userEmail = ?;";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../index.php?error=sqlError");
      exit();
    } else {
      $stmt->execute([$mailUser, $mailUser]);

      if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pwdCheck = password_verify($userPwd, $row['userPassword']);

        if ($pwdCheck == false) {
          header('Location: ../index.php?error=wrongpwd');
          exit();
        } elseif ($pwdCheck == true) {
          session_start();


          $_SESSION['id'] = $row['userId'];
          $_SESSION['username'] = $row['userName'];
          $_SESSION['email'] = $row['userEmail'];
          //initialize the quote into the $_SESSION
          $_SESSION['ppg'] = "";
          $_SESSION['subtotal'] = "";
          $_SESSION['tax'] = "";
          $_SESSION['total'] = "";
          $_SESSION['gallons'] = "";
          $_SESSION['deliveryDate'] = "";

          $sql = "SELECT * FROM clientProfile WHERE clientUserId = ?;";
          $stmt = $this->connect()->prepare($sql);

          if (!$stmt) {
            header("Location: ../index.php?error=sqlError");
            exit();
          } else {
            $stmt->execute([$_SESSION['id']]);

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $_SESSION['client'] = $row['clientId'];
              header("Location: ../profilemanager.php?login=success&clientId=" . $_SESSION['client']);
              exit();
            }
          }

          header("Location: ../profilemanager.php?login=success");
          exit();
        } else {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
      } else {
        header("Location: ../index.php?error=nouser");
        exit();
      }
    }
  } //End of userLogin

  protected function demoUserLogin($demoUsername)
  {
    $sql = "SELECT * FROM userCredentials WHERE userName = ?;";

    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../index.php?error=sqlError");
      exit();
    } else {
      $stmt->execute([$demoUsername]);
      if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        session_start();
        $_SESSION['id'] = $row['userId'];
        $_SESSION['username'] = $row['userName'];
        $_SESSION['email'] = $row['userEmail'];

        header("Location: ../fuelquoteform.php?login=demo");
        exit();
      } else {
        header("Location: ../index.php?error=nouser");
        exit();
      }
    }
  } //End of demoUserLogin


  protected function usersPwdUpdate($userId, $currentPwd, $newPwd)
  {

    $sql = "SELECT * FROM userCredentials WHERE userId = ?;";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt) {
      header("Location: ../passwordmanager.php?error=sqlerror");
      exit();
    } else {
      $stmt->execute([$userId]);
      if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pwdCheck = password_verify($currentPwd, $row['userPassword']);

        if ($pwdCheck == false) {
          header("Location: ../passwordmanager.php?error=notcurrentpwd");
          exit();
        } elseif ($pwdCheck == true) {
          $hashedNewPwd = password_hash($newPwd, PASSWORD_DEFAULT);

          $sql = "UPDATE userCredentials SET userPassword = ?;";
          $stmt = $this->connect()->prepare($sql);
          if (!$stmt) {
            header("Location: ../passwordmanager.php?error=sqlerror");
            exit();
          } else {
            $stmt->execute([$hashedNewPwd]);
            header("Location: ../passwordmanager.php?newpwdset=success");
          }
        } else {
          header("Location: ../passwordmanager.php?error=nouser");
        }
      }
    }
  } //End of usersPwdUpdate

  protected function userResetPwdEmail($userEmail)
  {

    //Create selector and token for validation
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32); //longer to be secure

    //A token is not allow to be available infinitely
    //This will give the user a limited time to use for securing purpose.
    $expires = date("U") + 1800; //This is one hour from the time submit the request.

    $url = "https://cosc4353fuelquoter.herokuapp.com/create-newpwd.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      echo 'There was an error in SQL';
      exit();
    } else {
      $stmt->execute([$userEmail]);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      echo 'There was an error in SQL';
      exit();
    } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      $stmt->execute([$userEmail, $selector, $hashedToken, $expires]);
    }

    $this->connect()->null;

    //This part using PHPMailer and Google Account server to send email to user for resetpwd link
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'cosc4353fuelquoter@gmail.com';                     // SMTP username
      $mail->Password   = '4353Fuelquoter';                               // SMTP password
      $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('cosc4353fuelquoter@gmail.com', 'Fuel Quoter');
      $mail->addAddress($userEmail);     // Add a recipient

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Reset your password for FuelQuoter';
      $mail->Body    .= '<p>We received a password request. The link to reset your password is below. If you did not make this request, please ignore this email </p>';
      $mail->Body    .= '<p>Here is your password reset link:</br>';
      $mail->Body    .= '<a href="' . $url . '">' . $url . '</a></p>';

      if ($mail->send()) {
        echo 'Message has been sent';
      } else {
        echo 'ERROR sending email';
      }
      $mail->smtpClose();

      header("Location: ../forgotpassword.php?reset=success");
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } //End of userResetPwdEmail

  protected function userResetPwd($selector, $validator, $password)
  {

    $currentDate = date("U");
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      echo 'There was an error!';
      exit();
    } else {
      $stmt->execute([$selector, $currentDate]);

      if (!$row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo 'You need to re-submit your reset request!';
        exit();
      } else {

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']); //This is T/F statement to check if whether to token are matched

        if ($tokenCheck == false) {
          echo 'You need to re-submit your reset request';
          exit();
        } elseif ($tokenCheck == true) {

          $tokenEmail = $row['pwdResetEmail'];

          $sql = "SELECT * FROM userCredentials WHERE userEmail = ?;";
          $stmt = $this->connect()->prepare($sql);
          if (!$stmt) {
            echo 'You need to re-submit your reset request!';
            exit();
          } else {
            $stmt->execute([$tokenEmail]);

            if (!$row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo 'There was an error';
              exit();
            } else {
              $sql = "UPDATE userCredentials SET userPassword = ? WHERE userEmail = ?";
              $stmt = $this->connect()->prepare($sql);
              if (!$stmt) {
                echo 'There was an error in updating new password!';
                exit();
              } else {
                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt->execute([$newPwdHash, $tokenEmail]);

                //Delete the token after the user has used it
                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
                $stmt = $this->connect()->prepare($sql);
                if (!$stmt) {
                  echo 'There was an error in deleting token email!';
                  exit();
                } else {
                  $stmt->execute([$tokenEmail]);
                  header("Location: ../index.php?newpwd=passwordupdated");
                }
              }
            }
          }
        }
      }
    }
  } // End of userResetPwd

  protected function userCredentialsData()
  {
    $sql = "SELECT * FROM userCredentials;";
    $stmt = $this->connect()->query($sql);
    $userCredentialsData = "";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $userCredentialsData .=
        "<tr>
        <td>" . $row['userId'] . "</td>"
        . "<td>" . $row['userEmail'] . "</td>
      </tr>";
    }
    return $userCredentialsData;
  } //End of userCredentialsData



} // end of class
