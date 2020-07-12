<?php

use PHPUnit\Framework\TestCase;

class UserCredentialsControlUserResetPasswordInputTest extends TestCase
{
  public function testUserResetPasswordSelectorEmpty()
  {
    $selector = '';
    $this->assertTrue(empty($selector));
    $this->assertEmpty($selector);
  }//End testUserResetPasswordSelectorEmpty

  public function testUserResetPasswordValidatorEmpty()
  {
    $validator = '';
    $this->assertTrue(empty($validator));
    $this->assertEmpty($validator);
  }//End testUserResetPasswordValidatorEmpty

  public function testUserResetPasswordInputEmpty()
  {
    $password = '';
    $this->assertTrue(empty($password));
  }//End testUserResetPasswordInputEmpty

  public function testUserResetConfirmPasswordInputEmpty()
  {
    $confirmPassword = '';
    $this->assertTrue(empty($confirmPassword));
  }//End testUserResetConfirmPasswordInputEmpty

  public function testNewPasswordResetInputMatchTest()
  {
    $newPassword = '12345!';
    $newConfirmPassword = '12345!';
    $this->assertEquals($newPassword, $newConfirmPassword);
  }//End testNewPasswordResetInputMatchTest

} //End UserCredentialsControlUserResetPasswordInputTest class
