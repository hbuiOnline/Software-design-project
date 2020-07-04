<?php

class PricingView extends FuelQuote {

  public function fuelQuoteDataShow(){
    $result = array();
    $result = $this->fuelQuoteData();
    return $result;
  }

}
