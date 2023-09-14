<?php

use Collection\RiderFormValidator;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

class RiderFormValidatorTest extends TestCase
{
    public function testSuccessAllFieldsValid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = 'a';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertTrue($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function testFailureNameInvalid()
    {
        $sut = new RiderFormValidator();
        $name = '';
        $image = 'a';
        $team = 'a';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function testFailureImageInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = '';
        $team = 'a';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function testFailureTeamInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = '';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function testFailureNationInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = 'a';
        $nation = '';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function testFailureDobInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = 'a';
        $nation = 'a';
        $dob = '';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function testMalformedInputsNotStrings()
    {
        $sut = new RiderFormValidator();
        $name = ['a'];
        $image = ['a'];
        $team = ['a'];
        $nation = ['a'];
        $dob = ['00-00-0000'];

        $this->expectException(TypeError::class);
        $sut->validateRiderForm($name, $image, $team, $nation, $dob);
    }
}
