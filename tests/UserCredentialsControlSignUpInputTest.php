<?php

use PHPUnit\Framework\TestCase;

class UserCredentialsControlSignUpInputTest extends TestCase {

  public function testValidateUserEmailInputEmpty ()
  {
    $email = '';
    $this->assertEmpty($email);
    // $this->assertTrue(empty($email2));
  } //End testValidateUserEmailInputEmptyT

  public function testValidateUserEmailInputNotEmpty ()
  {
    $email = 'a';
    $this->assertNotEmpty($email, 'Email is not empty');
  } //End testValidateUserEmailInputNotEmpty

  public function testValidateUsernameInputEmpty ()
  {
    $username = '';
    $this->assertEmpty($username);
    $this->assertEmpty($username2);
  } //End testValidateUsernameInputEmpty

  public function testValidateUsernameInputNotEmpty ()
  {
    $username = 'abb';
    $this->assertNotEmpty($username, 'Username is not empty');
  } //End testValidateUsernameInputNotEmpty

  public function testValidateUserPasswordInputEmpty ()
  {
    $password = '';
    $this->assertEmpty($password);
    $this->assertEmpty($password2);
  } //End testValidateUserPasswordInputEmpty

  public function testValidateUserPasswordInputNotEmpty ()
  {
    $password = 'aabbb';
    $this->assertNotEmpty($password, 'Password is not empty');

  } //End testValidateUserPasswordInputNotEmpty

  public function testValidateUserConfirmPasswordInputEmpty ()
  {
    $confirmPwd = '';
    $this->assertEmpty($confirmPwd);
    $this->assertEmpty($confirmPwd2);
  } //End testValidateUserConfirmPasswordInputEmpty

  public function testValidateUserConfirmPasswordInputNotEmpty ()
  {
    $confirmPwd = 'aa!!';
    $this->assertNotEmpty($confirmPwd, 'Confirm Password is not empty');
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

  public function testValidEmailInputWithNumber()
  {
    $email = 'demotestingtest312@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputWithNumber

  public function testValidEmailInputWithNumberAndSymbol()
  {
    $email = 'demo_testingtest-312@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputWithNumber

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

  public function testValidateUsernameWithCapitalCaseWithNumber()
  {
    $username = '2DEMOUSER1';
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
    $matchConfirmPwd = 'pwddemo123456!';
    $this->assertEquals($password, $matchConfirmPwd);
  }//End testPasswordMatchInput

}
