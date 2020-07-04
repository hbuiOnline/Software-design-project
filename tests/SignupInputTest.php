<?php

use PHPUnit\Framework\TestCase;

class SignupInputTest extends TestCase {

  public function testValidateUserEmailInputEmpty ()
  {
    $email = '';
    $this->assertTrue(empty($email));
    $this->assertTrue(empty($email2));
  } //End testValidateUserEmailInputEmpty

  public function testValidateUserEmailInputNotEmpty ()
  {
    $email = 'a';
    $this->assertTrue(empty($email));
  } //End testValidateUserEmailInputNotEmpty

  public function testValidateUsernameInputEmpty ()
  {
    $username = '';
    $this->assertTrue(empty($username));
    $this->assertTrue(empty($username2));
  } //End testValidateUsernameInputEmpty

  public function testValidateUsernameInputNotEmpty ()
  {
    $username = 'abb';
    $this->assertTrue(empty($username));
  } //End testValidateUsernameInputNotEmpty

  public function testValidateUserPasswordInputEmpty ()
  {
    $password = '';
    $this->assertTrue(empty($password));
    $this->assertTrue(empty($password2));
  } //End testValidateUserPasswordInputEmpty

  public function testValidateUserPasswordInputNotEmpty ()
  {
    $password = 'aabbb';
    $this->assertTrue(empty($password));
  } //End testValidateUserPasswordInputNotEmpty

  public function testValidateUserConfirmPasswordInputEmpty ()
  {
    $confirmPwd = '';
    $this->assertTrue(empty($confirmPwd));
    $this->assertTrue(empty($confirmPwd2));
  } //End testValidateUserConfirmPasswordInputEmpty

  public function testValidateUserConfirmPasswordInputNotEmpty ()
  {
    $confirmPwd = 'aa!!';
    $this->assertTrue(empty($confirmPwd));
  } //End testValidateUserConfirmPasswordInputNotEmpty




  //-----------------------------------------------------------------------------//
  //For Email validation
  public function testValidEmailInputOk()
  {
    $email = 'testing@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputOk

  public function testValidEmailInputWithDotBeforeAt()
  {
    $email = 'testing.email@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputWithDotBeforeAt

  public function testValidEmailInputWithSymbol()
  {
    $email = 'testing.email!#@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputWithSymbol

  public function testValidEmailInputMissingAtSymbol()
  {
    $email = 'testinggmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputMissingAtSymbol

  public function testValidEmailInputMissingDomain()
  {
    $email = 'testing@gmail';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputMissingDomain

  public function testValidEmailInputWithSpaces()
  {
    $email = 'testing@gmail .com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputWithSpaces



  //-----------------------------------------------------------------------------//
  //For Username validation
  public function testValidateUsernameOk()
  {
    $username = 'demousername';
    $incorrectUsername = 'viponline@!';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameOk

  public function testValidateUsernameWithNumber()
  {
    $username = 'demousername34314';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameWithNumber

  public function testValidateUsernameWithNumberFirst()
  {
    $username = '34314demousername';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameWithNumberFirst

  public function testValidateUsernameWithSpace()
  {
    $username = 'demo username';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameWithSpace

  public function testValidateUsernameWithSymbol()
  {
    $username = 'viponline@!';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameWithSymbol

  public function testValidateUsernameWithCapitalCase()
  {
    $username = 'DEMOUSER';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameWithCapitalCase

  public function testValidateUsernameWithCombinationCapitalCaseAndLowerCaseAndNumber()
  {
    $username = 'DemoUser3';
    $this->assertMatchesRegularExpression("/^[a-zA-Z0-9]*$/", $username);
  } //End testValidateUsernameWithSymbol

  public function testPasswordMatchInput()
  {
    $password = 'pwddemo123456!';
    $noMatchConfirmPwd = '123456';
    $matchConfirmPwd = 'pwddemo123456!';
    $this->assertEquals($password, $matchConfirmPwd);
    // $this->assertEquals($password, $noMatchConfirmPwd);
  }

}
