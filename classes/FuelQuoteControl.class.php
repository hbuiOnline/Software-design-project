<?php

class FuelQuoteControl extends FuelQuote
{

  public function fuelQuoteInputSubmission($quoteClientId, $quoteGallons, $quotePPG, $quoteTotal, $quoteState, $quoteDeliveryDate)
  {
    //If one of the field is empty, the error will return and entered input will be set
    if (empty($quoteClientId) || empty($quoteGallons) || empty($quotePPG) || empty($quoteTotal) || empty($quoteState) || empty($quoteDeliveryDate)) {
      header("Location: ../fuelquoteform.php?error=nogeneratequote&cid=" . $quoteClientId . "&gallon=" . $quoteGallons . "&state=". $quoteState ."&quotePPG=". $quotePPG ."&quoteTotal=". $quoteTotal  . "&delivery=" . $quoteDeliveryDate);
      exit();
    } elseif (!preg_match("/^[0-9]*$/", $quoteGallons)) {   //Regex for City using only letters
      header("Location: ../fuelquoteform.php?error=invalidgallons");
      exit();
    } elseif (!preg_match("/^[A-Z]{2}$/", $quoteState)) {
      header("Location: ../fuelquoteform.php?error=invalidstate");
      exit();
    } else {
      $this->fuelQuoteInput($quoteClientId, $quoteGallons, $quotePPG, $quoteTotal, $quoteDeliveryDate);
    }
  }
}
