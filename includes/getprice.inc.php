<?php

include 'autoloader.inc.php';

if (isset($_POST['pricing-input'])) {

    $pricingClientId = $_POST['clientid'];
    $pricingGallons = $_POST['gallons'];
    $pricingState = $_POST['state'];
    $deliveryDate = $_POST['deliveryDate'];

    $pricingObj = new PricingControl();
    $pricingObj->pricingInputSubmission($pricingClientId, $pricingGallons, $pricingState, $deliveryDate);
} else {
    header("Location: ../fuelquoteform.php?error=pricingIncludes");
    exit();
}
