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
      $this->pricingInput($pricingClientId, $pricingGallons, $pricingState, $deliveryDate);
    }

  } //End of pricingInputSubmission
}
