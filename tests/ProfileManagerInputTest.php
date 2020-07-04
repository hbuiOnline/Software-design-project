<?php

use PHPUnit\Framework\TestCase;

class ProfileManagerInputTest extends TestCase
{

    //For Name validation
    public function testProfileManagerNameInputOkay()
    {
      $clientName = 'Han Bui';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName);
    } //End testProfileManagerNameInputOkay

    public function testProfileManagerNameInputWithMiddleName()
    {
      $clientName = 'Han Hoang Bui';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName);
    } //End testProfileManagerNameInput

    public function testProfileManagerNameInputWithLongerMiddleName()
    {
      $clientName = 'Han Hoang Bui Michael Austin';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName);
    } //End testProfileManagerNameInputWithLongerMiddleName2

    public function testProfileManagerNameInputWithNumber()
    {
      $clientName = 'Han Bui2';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName);
    } //End testProfileManagerNameInputWithNumber

    public function testProfileManagerNameInputWithSymbol()
    {
      $clientName = 'Han Bui!';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName);
    } //End testProfileManagerNameInputWithNumber

    public function testProfileManagerNameInputWithCompanyNameOk()
    {
      $clientName = 'Exxon';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,50}$/", $clientName);
    } //End testProfileManagerNameInputWithCompanyNameOk


    //-----------------------------------------------------------------------------//
    //For Address1 validation
    public function testProfileManagerAddress1InputOk()
    {
      $address = '6600 Otherside Blvd';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address);
    } //End testProfileManagerAddress1Input

    public function testProfileManagerAddress1InputWithoutStreetNumber()
    {
      $address = 'OtherSide Blvd';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address); //Fail
    } //End testProfileManagerAddress1InputWithoutStreetNumber

    public function testProfileManagerAddress1InputWithSymbol()
    {
      $address = '6600 -Otherside $Blvd';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address);
    } //End testProfileManagerAddress1InputWithSymbol

    public function testProfileManagerAddress1InputWithMultipleSpaces()
    {
      $address = '6600 Otherside Of the Lane Blvd ';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address);
    } //End testProfileManagerAddress1InputWithSymbol

    //-----------------------------------------------------------------------------//
    //For Address2 validation
    public function testProfileManagerAddress2InputOk()
    {
      $address = '100';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address);
    } //End testProfileManagerAddress2Input

    public function testProfileManagerAddress2InputWithLetter()
    {
      $address = 'Unit 100';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address);
    } //End testProfileManagerAddress2InputWithLetter

    public function testProfileManagerAddress2InputWithSymbol()
    {
      $address = '200!';
      $this->assertMatchesRegularExpression("/^([0-9]+([\ a-zA-Z.]+)*){1,100}$/", $address);
    } //End testProfileManagerAddress2InputWithSymbol



    //-----------------------------------------------------------------------------//
    //For City validation
    public function testProfileManagerCityInputOk()
    {
        $city = 'Houston';
        $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,100}$/", $city);
    } //End testProfileManagerCityInputOk

    public function testProfileManagerCityInputWithSpaces()
    {
      $city = 'San Antonio';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,100}$/", $city);
    } //End testProfileManagerCityInputWithSpaces

    public function testProfileManagerCityInputWithMultipleSpaces()
    {
      $city = 'San Antonio De Rio';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,100}$/", $city);
    } //End testProfileManagerCityInputWithMultipleSpaces

    public function testProfileManagerCityInputWithNumber()
    {
      $city = 'Houston1';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,100}$/", $city);
    } //End testProfileManagerCityInputWithNumber

    public function testProfileManagerCityInputWithSymbol()
    {
      $city = 'Houston1!@#%';
      $this->assertMatchesRegularExpression("/^([a-zA-Z]+([\ a-zA-Z.]+)*){1,100}$/", $city);
    } //End testProfileManagerCityInputWithSymbol



    //-----------------------------------------------------------------------------//
    //For State validation
    public function testProfileManagerStateInputWithAbbreviation()
    {
        $state = 'TX';
        $this->assertMatchesRegularExpression("/^[A-Z]{2}$/", $state);
    } //End testProfileManagerStateInputWithAbbreviation

    public function testProfileManagerStateInputWithFullName()
    {
        $state = 'Texas';
        $this->assertMatchesRegularExpression("/^[A-Z]{2}$/", $state);
    } //End testProfileManagerStateInputWithFullName

    public function testProfileManagerStateInputWithLowerCase()
    {
        $state = 'tx';
        $this->assertMatchesRegularExpression("/^[A-Z]{2}$/", $state);
    } //End testProfileManagerStateInputWithAbbreviation




    //-----------------------------------------------------------------------------//
    //For Zipcode validation
    public function testProfileManagerZipcodeInputOk()
    {
      $zipcode = '77055';
      $this->assertMatchesRegularExpression("/^[0-9]{5,9}$/", $zipcode);
    } //End testProfileManagerZipcodeInputOk

    public function testProfileManagerZipcodeInputWithLetter()
    {
      $zipcode = '123d1'; //Included letter
      $this->assertMatchesRegularExpression("/^[0-9]{5,9}$/", $zipcode);
    } //End testProfileManagerZipcodeInputWithLetter

    public function testProfileManagerZipcodeInputWithLongInput()
    {
      $zipcode = '12345678910'; //Longer than 9 digits
      $this->assertMatchesRegularExpression("/^[0-9]{5,9}$/", $zipcode);
    } //End testProfileManagerZipcodeInputWithLongInput




}
