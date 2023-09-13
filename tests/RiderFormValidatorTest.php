<?php

use Collection\RiderFormValidator;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

class RiderFormValidatorTest extends TestCase
{    
    public function test_success_allFieldsValid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = 'a';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertTrue($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function test_failure_nameInvalid()
    {
        $sut = new RiderFormValidator();
        $name = '';
        $image = 'a';
        $team = 'a';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function test_failure_imageInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = '';
        $team = 'a';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function test_failure_teamInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = '';
        $nation = 'a';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function test_failure_nationInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = 'a';
        $nation = '';
        $dob = '00-00-0000';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function test_failure_dobInvalid()
    {
        $sut = new RiderFormValidator();
        $name = 'a';
        $image = 'a';
        $team = 'a';
        $nation = 'a';
        $dob = '';

        $this->assertFalse($sut->validateRiderForm($name, $image, $team, $nation, $dob));
    }

    public function test_malformed_inputsNotStrings()
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