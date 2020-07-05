<?php

// session_start();

class FuelQuote extends Dbh
{

  // added fuel fuelQuote insert & fuelQuote data retrival for clint based on clientId stored in _SESSION
  protected function fuelQuoteInput($quoteClientId, $quoteGallons, $quoteDeliveryDate)
  {
    $sql = "INSERT INTO fuelQuote (quoteClientId, quoteGallons, quoteDeliveryDate) VALUES (?, ?, ?);";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../fuelquoteform.php?error=sqlerror");
      exit();
    } else {
      $stmt->execute([$quoteClientId, $quoteGallons, $quoteDeliveryDate]);
      header("Location: ../fuelquote.php?&generatequote=success");
      exit();
    }
    $this->connect()->null;
  }

  protected function fuelQuoteData()
  {
    $quoteData = "";
    $quoteClientId = $_SESSION['client'];

    $sql = "SELECT *, DATE_FORMAT(fuelQuote.quoteDeliveryDate, '%m/%d/%y') AS quoteDeliveryDateFormatted FROM fuelQuote WHERE quoteClientId = ?";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt) {
      header("Location: ../clientProfile.php?clientUserId=" . $quoteClientId . "&error=sqlerror");
      return NULL;
      exit();
    } else {
      $stmt->execute([$quoteClientId]);
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $quoteData .=
          "<tr>
          <td>" . $row['quoteId'] . "</td>"
          . "<td>" . $row['quoteDeliveryDateFormatted'] . "</td>"
          . "<td>" . $row['quoteGallons'] . "</td>"
          . "<td>" . $row['quotePPG'] . "</td>"
          . "<td>" . $row['quoteTotal'] . "</td>
        </tr>";
      }
    }

    return $quoteData;
  }
}
