<?php

session_start();

class Pricing extends Dbh
{

  protected function pricingInput($locationFactor, $rateHistoryFactor, $gallonsReqFactor, $pricingGallons, $deliveryDate)
  {

    $companyProfitFactor = .10;
    $currDistributorPPG = 1.50;

    $companyMargin = ($locationFactor - $rateHistoryFactor + $gallonsReqFactor + $companyProfitFactor) * $currDistributorPPG;

    $_SESSION['gallons'] = $pricingGallons;

    // trying to convert format YYYY-MM-DD to MM/DD/YYY - ! doesn't work !

    // $date = str_replace('-"', '/', (string) $deliveryDate);
    // $formattedDeliveryDate = date("d-m-Y", strtotime($date));

    $_SESSION['deliveryDate'] = $deliveryDate;
    $_SESSION['ppg'] = $currDistributorPPG + $companyMargin;
    $_SESSION['total'] = ($currDistributorPPG + $companyMargin) * $pricingGallons;
    header("Location: ../fuelquoteform.php?&pricing=success");
    // header("Location: ../fuelquoteform.php?&pricing=success&ppg=" . $_SESSION['ppg'] . "&total=" . $_SESSION['total'] . "&gallons=" . $_SESSION['gallons'] . "&date=" . $_SESSION['deliveryDate']);
  }
}
