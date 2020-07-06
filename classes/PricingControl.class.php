<?php

class PricingControl extends Pricing
{

  public function pricingInputSubmission($pricingClientId, $pricingGallons, $pricingState, $deliveryDate)
  {

    //If one of the field is empty, the error will return and entered input will be set
    if (empty($pricingGallons) || empty($pricingState) || empty($deliveryDate)) {
      header("Location: ../fuelquoteform.php?error=emptypricefield&gallon=" . $pricingGallons . "&state=" . $pricingState);
      exit();
    } elseif (!preg_match("/^[0-9]*$/", $pricingGallons)) {   //Regex for City using only letters
      header("Location: ../fuelquoteform.php?error=invalidgallons");
      exit();
    } elseif (!preg_match("/^[A-Z]{2}$/", $pricingState)) {
      header("Location: ../fuelquoteform.php?error=invalidstate");
      exit();
    } else {

      if ($pricingState == "TX") {
        $locationFactor = .02;
      } else {
        $locationFactor = .04;
      }

      $sql = "SELECT * FROM fuelQuote WHERE quoteClientId = ?;";
      $stmt = $this->connect()->prepare($sql);
      if (!$stmt) {
        header("Location: ../fuelquoteform.php?error=sqlError");
        exit();
      } else {
        $stmt->execute([$pricingClientId]);
        $hasQuoteAlready = $stmt->fetchColumn();

        if ($hasQuoteAlready == true) {
          $rateHistoryFactor = .01;
        } else {
          $rateHistoryFactor = 0;
        }
        $this->connect()->null;
      }

      if ($pricingGallons > 1000) {
        $gallonsReqFactor = .02;
      } else {
        $gallonsReqFactor = .03;
      }
    }


    $this->pricingInput($locationFactor, $rateHistoryFactor, $gallonsReqFactor, $pricingGallons, $deliveryDate);
  }
}
