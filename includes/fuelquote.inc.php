
<?php

include 'autoloader.inc.php';

if (isset($_POST['quote-input'])) {

  $quoteClientId = $_POST['clientid'];
  $quoteGallons = $_POST['quoteGallons'];
  $quoteState = $_POST['state'];
  $quoteDeliveryDate = $_POST['quoteDeliveryDate'];

  $fuelQuoteObj = new FuelQuoteControl();
  $fuelQuoteObj->fuelQuoteInputSubmission($quoteClientId, $quoteGallons, $quoteState, $quoteDeliveryDate);
} else {
  header("Location: ../fuelquoteform.php?error=placeOrder");
  exit();
}
