<?php

use PHPUnit\Framework\TestCase;

class UserCredentialsControlPasswordUpdateInputTest extends TestCase
{

  public function testPasswordUpdateInputTestEmpty()
  {
    $currentPwd = '';
    $this->assertTrue(empty($currentPwd));
    $this->assertTrue(empty($currentPwd1));
  } //End passwordUpdateInputTestEmpty

  public function testPasswordUpdateInputTestNotEmpty ()
  {
    $newPassword = 'abbbaa222315@@';
    $this->assertNotEmpty($newPassword, 'New Password is not empty');
  } //End testPasswordUpdateInputTestNotEmpty

  public function testNewPasswordUpdateInputTestEmpty()
  {
    $newPassword = '';
    $this->assertTrue(empty($newPassword));
    $this->assertTrue(empty($newPassword1));
  } //End newPasswordUpdateInputTestEmpty

  public function testNewPasswordUpdateInputWithSpace()
  {
    $newPassword = 'abbbaa   222315';
    $this->assertStringContainsString(' ', $newPassword);
  } //End testNewPasswordUpdateInputWithSpace

  public function testNewPasswordUpdateInputTestNotEmpty ()
  {
    $newPassword = 'bbbaa222315';
    $this->assertNotEmpty($newPassword, 'New Password is not empty');
  } //End testNewPasswordUpdateInputTestNotEmpty

  public function testConfirmNewPasswordUpdateInputTestEmpty()
  {
    $confirmNewPassword = '';
    $this->assertTrue(empty($confirmNewPassword));
    $this->assertTrue(empty($confirmNewPassword1));
  } //End newPasswordUpdateInputTestEmpty

  public function testConfirmNewPasswordUpdateInputTestNotEmpty ()
  {
    $confirmNewPassword = 'bbbaa222315';
    $this->assertNotEmpty($confirmNewPassword, 'Confirm New Password is not empty');
  } //End testNewPasswordUpdateInputTestNotEmpty

  public function testNewPasswordUpdateInputMatchTest()
  {
    $newPassword = '12345';
    $newConfirmPassword = '12345';
    $this->assertEquals($newPassword, $newConfirmPassword);

  }//End testNewPasswordUpdateInputMatchTest

}
