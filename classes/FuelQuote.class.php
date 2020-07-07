<?php

// session_start();

class FuelQuote extends Dbh
{

  // added fuel fuelQuote insert & fuelQuote data retrival for client based on clientId stored in _SESSION
  protected function fuelQuoteInput($quoteClientId, $quoteGallons, $quotePPG, $quoteTotal, $quoteDeliveryDate)
  {
    $sql = "INSERT INTO fuelQuote (quoteClientId, quoteGallons, quoteTotal, quotePPG, quoteDeliveryDate) VALUES (?, ?, ?, ?, ?);";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../fuelquoteform.php?error=sqlerror");
      exit();
    } else {
      $stmt->execute([$quoteClientId, $quoteGallons, $quoteTotal, $quotePPG, $quoteDeliveryDate]);
      header("Location: ../fuelquote.php?&placeorder=success");
      exit();
    }
    $this->connect()->null;


  }//End of fuelQuoteInput()

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
          . "<td>$" . $row['quotePPG'] . "</td>"
          . "<td>$" . $row['quoteTotal'] . "</td>
        </tr>";
      }
    }

    return $quoteData;
  }// End of fuelQuoteData()

}//End of FuelQuote class
