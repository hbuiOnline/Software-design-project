<?php

use PHPUnit\Framework\TestCase;

class FuelQuoteControlTest extends TestCase
{
  public function testFuelQuoteGallonInputEmpty()
  {
    $quoteGallons = '';
    $this->assertTrue(empty($quoteGallons));
    $this->assertTrue(empty($quoteGallons1));
  }// End testFuelQuoteGallonInputEmpty

  public function testFuelQuoteGallonInputNotEmpty ()
  {
    $quoteGallons = 222;
    $this->assertNotEmpty($quoteGallons, 'Email is not empty');
  } //End testEmailInputNotEmpty

  public function testFuelQuoteGallonInputIsScalar()
    {
      $quoteGallons = 222;
      $this->assertIsScalar($quoteGallons);
    } // testFuelQuoteGallonInputIsScalar


  public function testFuelQuoteStateInputEmpty()
  {
    $quoteState = '';
    $this->assertTrue(empty($quoteState));
    $this->assertTrue(empty($quoteState1));
  }//End testFuelQuoteStateInputEmpty

  public function testFuelQuoteStateInputNotEmpty ()
  {
    $quoteState = 'TX';
    $this->assertNotEmpty($quoteState, 'Email is not empty');
  } //End testEmailInputNotEmpty

  public function testFuelQuoteDeliverDateInputEmpty()
  {
    $quoteDeliveryDate = '';
    $this->assertTrue(empty($quoteDeliveryDate));
    $this->assertTrue(empty($quoteDeliveryDate1));
  }//End testFuelQuoteDeliverDateInputEmpty

  public function testFuelQuoteDeliverDateInputNotEmpty ()
  {
    $quoteDeliveryDate = '12/10/21';
    $this->assertNotEmpty($quoteDeliveryDate, 'Email is not empty');
  } //End testFuelQuoteDeliverDateInputNotEmpty

  public function testFuelQuoteGallonInputOk()
  {
    $quoteGallons = 12000;
    $this->assertMatchesRegularExpression("/^[0-9]*$/", $quoteGallons);
  }// End testFuelQuoteGallonInputOk

  public function testFuelQuoteGallonInputSmall()
  {
    $quoteGallons = 1;
    $this->assertMatchesRegularExpression("/^[0-9]*$/", $quoteGallons);
  }// End testFuelQuoteGallonInputOk

  public function testFuelQuoteGallonInputLarge()
  {
    $quoteGallons = 10000200000300000;
    $this->assertMatchesRegularExpression("/^[0-9]*$/", $quoteGallons);
  }// End testFuelQuoteGallonInputOk

  public function testFuelQuoteStateInputOk()
  {
    $quoteGallons = 'TX';
    $this->assertMatchesRegularExpression("/^[A-Z]{2}$/", $quoteGallons);
  }// End testFuelQuoteStateInputOk

}
