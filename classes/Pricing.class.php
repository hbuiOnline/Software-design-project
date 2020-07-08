<?php

session_start();

class Pricing extends Dbh
{

  protected function pricingInput($pricingClientId, $pricingGallons, $pricingState, $deliveryDate)
  {

    $locationFactor = ($pricingState == "TX") ? .02 : .04; // Taxes

    $sql = "SELECT * FROM fuelQuote WHERE quoteClientId = ?;";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt) {
      header("Location: ../fuelquoteform.php?error=sqlError");
      exit();
    } else {
      $stmt->execute([$pricingClientId]);
      $hasQuoteAlready = $stmt->fetchColumn();

      $rateHistoryFactor = ($hasQuoteAlready) ? .01 : 0;

      $this->connect()->null;
    }

    $gallonsReqFactor = ($pricingGallons > 1000) ? .02 : .03;

    $companyProfitFactor = .10;
    $currDistributorPPG = 1.50;
    $companyMargin = ($locationFactor - $rateHistoryFactor + $gallonsReqFactor + $companyProfitFactor) * $currDistributorPPG;

    $_SESSION['gallons'] = $pricingGallons;
    $_SESSION['deliveryDate'] = $deliveryDate;
    $_SESSION['ppg'] = number_format((float) $currDistributorPPG + $companyMargin, 3);
    $_SESSION['total'] = (string)number_format((float) ($currDistributorPPG + $companyMargin) * $pricingGallons, 2);

    header("Location: ../fuelquoteform.php?&pricing=success");
    exit();


  }//End of pricingInput()


}
