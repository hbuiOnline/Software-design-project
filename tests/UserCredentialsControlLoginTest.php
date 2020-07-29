<?php

use PHPUnit\Framework\TestCase;

class UserCredentialsControlLoginTest extends TestCase {

  public function testLoginUsernameInputEmpty()
  {
    $this->assertTrue(empty($username));
    $this->assertEmpty($username);
  } //End testLoginUsernameInputEmpty

  public function testLoginUsernameInputNotEmpty ()
  {
    $username = 'username';
    $this->assertNotEmpty($username, 'Username is not empty');
  } //End testLoginUsernameInputNotEmpty

  public function testLoginUserPasswordInputEmpty()
  {
    $this->assertTrue(empty($password));
    $this->assertEmpty($password);
  } //End testLoginUserPasswordInputEmpty

  public function testLoginUserPasswordInputNotEmpty ()
  {
    $password = 'Password!';
    $this->assertNotEmpty($password, 'Password is not empty');
  } //End testLoginUserPasswordInputNotEmpty



}
