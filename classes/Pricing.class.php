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

    //Model to calculate the quote/place order
    $_SESSION['deliveryDate'] = $deliveryDate;
    $_SESSION['ppg'] = number_format((float) $currDistributorPPG + $companyMargin, 2);
    $_SESSION['subtotal'] = number_format((float) ($currDistributorPPG + $companyMargin) * $pricingGallons, 2);
    $_SESSION['tax'] = number_format((float) $_SESSION['subtotal'] * .0825, 2);
    $_SESSION['total'] = number_format((float) $_SESSION['subtotal'] + $_SESSION['tax'], 2);

    //Need to push some of these into the database to save a the quoteHistory

    header("Location: ../fuelquoteform.php?&pricing=success");
    // header("Location: ../fuelquoteform.php?&pricing=success&ppg=" . $_SESSION['ppg'] . "&total=" . $_SESSION['total'] . "&gallons=" . $_SESSION['gallons'] . "&date=" . $_SESSION['deliveryDate']);
  }
}
