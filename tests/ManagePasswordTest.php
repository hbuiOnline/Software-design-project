<?php

use PHPUnit\Framework\TestCase;

class ManagePasswordTest extends TestCase
{
    public function testPasswordMatchNormalInput()
    {

        $password = 'passwordDemo123!';
        $matchConfirmPwd = 'passwordDemo123!';
        $noMatchConfirmPwd = 'Demo123';

        $this->assertEquals($password, $matchConfirmPwd);
        $this->assertEquals($password, $noMatchConfirmPwd); //Fail
    }

    public function testPasswordMatchCaseInput()
    {

        $password = 'passworddemo';
        $matchConfirmPwd = 'passworddemo';
        $noMatchConfirmPwd = 'PASSWORDDEMO';

        $this->assertEquals($password, $matchConfirmPwd);
        $this->assertEquals($password, $noMatchConfirmPwd); //Fail
    }

    public function testPasswordMatchSpaceInput()
    {

        $password = 'password demo';
        $matchConfirmPwd = 'password demo';
        $noMatchConfirmPwd = 'passworddemo';

        $this->assertEquals($password, $matchConfirmPwd);
        $this->assertEquals($password, $noMatchConfirmPwd); //Fail
    }
}
