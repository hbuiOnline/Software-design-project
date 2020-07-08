
<?php

include 'autoloader.inc.php';

if (isset($_POST['quote-input'])) {

  $quoteClientId = $_POST['clientid'];
  $quoteGallons = $_POST['quoteGallons'];
  $quotePPG = $_POST['quotePPG'];
  $quoteTotal = $_POST['quoteTotal'];
  echo $quoteTotal ."\n";
  $quoteState = $_POST['state'];
  $quoteDeliveryDate = $_POST['quoteDeliveryDate'];

  $fuelQuoteObj = new FuelQuoteControl();
  $fuelQuoteObj->fuelQuoteInputSubmission($quoteClientId, $quoteGallons, $quotePPG, $quoteTotal, $quoteState, $quoteDeliveryDate);
}
else {
  header("Location: ../fuelquoteform.php?error=placeOrder");
  exit();
}
