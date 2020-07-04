<?php

use PHPUnit\Framework\TestCase;


class UserCredentialsControlResetPasswordEmailTest extends TestCase
{
  public function testEmailInputEmpty()
  {
    $email = '';
    $this->assertEmpty($email);
  } //End testEmailInputEmpty

  public function testEmailInputNotEmpty ()
  {
    $email = 'a';
    $this->assertNotEmpty($email, 'Email is not empty');
  } //End testEmailInputNotEmpty

  public function testValidEmailInputOk()
  {
    $email = 'testing@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputOk

  public function testValidEmailInputWithOnlyNumber()
  {
    $email = '1234688123533@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputWithOnlyNumber

  public function testValidEmailInputWithOnlyNumberAfterAt()
  {
    $email = '1234688123533@23152.23213';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputWithOnlyNumberAfterAt

  public function testValidEmailInputWithDotBeforeSymbolAt()
  {
    $email = 'demo.testing@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputWithDotBeforeSymbolAt

  public function testValidEmailInputWithSymbol()
  {
    $email = 'demo-testing.test@gmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } // End testValidEmailInputWithSymbol

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

  public function testValidEmailInputWithoutSymbolAt()
  {
    $email = 'testinggmail.com';
    $this->assertEquals($email, filter_var($email, FILTER_VALIDATE_EMAIL));
  } //End testValidEmailInputWithoutSymbolAt



}
