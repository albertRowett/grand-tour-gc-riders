<?php

use Collection\RiderFormValidator;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

class RiderFormValidatorTest extends TestCase
{
    private RiderFormValidator $sut; // System under test

    // Default valid form field values
    private $name = 'Tadej Pogačar';
    private $image = 'https://www.procyclingstats.com/images/riders/bp/dc/tadej-pogacar-2024-n2.jpeg';
    private $team = 'UAE Team Emirates';
    private $nation = 'Slovenia';
    private $dob = '1998-09-21';
    private $giroGc = '1';
    private $tourGc = '3';
    private $vueltaGc = '0';
    private $giroStages = '6';
    private $tourStages = '17';
    private $vueltaStages = '3';

    protected function setUp(): void
    {
        $this->sut = new RiderFormValidator(); // Instantiate before each test
    }

    public function testSuccessAllFieldsValid(): void
    {
        $this->assertTrue($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNoName(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            '', // name
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNameTooLong(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            str_repeat('a', 1000), // name
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNoImage(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            '', // image
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureImageTooLong(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            str_repeat('a', 1000), //image
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNoTeam(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            '', // team
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureTeamTooLong(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            str_repeat('a', 1000), // team
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNoNation(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            '', // nation
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNationTooLong(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            str_repeat('a', 1000), // nation
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureNoDob(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            '', // dob
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureInvalidDob(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            '1998-09-31', // dob (only 30 days in September)
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureIncorrectDobFormat(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            '31-09-1998', // dob
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureGiroGcNotInteger(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            '0.5', // giroGc
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureGiroGcNegative(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            '-1', // giroGc
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureGiroGcTooLarge(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            '256', // giroGc
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureTourGcNotInteger(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            '0.5', // tourGc
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureTourGcNegative(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            '-1', // tourGc
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureTourGcTooLarge(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            '256', // tourGc
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureVueltaGcNotInteger(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            '0.5', // vueltaGc
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureVueltaGcNegative(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            '-1', // vueltaGc
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureVueltaGcTooLarge(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            '256', // vueltaGc
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureGiroStagesNotInteger(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            '0.5', // giroStages
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureGiroStagesNegative(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            '-1', // giroStages
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureGiroStagesTooLarge(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            '256', // giroStages
            $this->tourStages,
            $this->vueltaStages
        ));
    }

    public function testFailureTourStagesNotInteger(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            '0.5', // tourStages
            $this->vueltaStages
        ));
    }

    public function testFailureTourStagesNegative(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            '-1', // tourStages
            $this->vueltaStages
        ));
    }

    public function testFailureTourStagesTooLarge(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            '256', // tourStages
            $this->vueltaStages
        ));
    }

    public function testFailureVueltaStagesNotInteger(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            '0.5' // vueltaStages
        ));
    }

    public function testFailureVueltaStagesNegative(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            '-1' // vueltaStages
        ));
    }

    public function testFailureVueltaStagesTooLarge(): void
    {
        $this->assertFalse($this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            '256' // vueltaStages
        ));
    }

    public function testMalformedNameNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            ['Tadej Pogačar'], // name
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedImageNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            ['https://www.procyclingstats.com/images/riders/bp/dc/tadej-pogacar-2024-n2.jpeg'], // image
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedTeamNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            ['UAE Team Emirates'], // team
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedNationNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            ['Slovenia'], // nation
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedDobNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            ['1998-09-21'], // dob
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedGiroGcNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            ['1'], // giroGc
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedTourGcNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            ['3'], // tourGc
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedVueltaGcNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            ['0'], // vueltaGc
            $this->giroStages,
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedGiroStagesNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            ['6'], // giroStages
            $this->tourStages,
            $this->vueltaStages
        );
    }

    public function testMalformedTourStagesNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            ['17'], // tourStages
            $this->vueltaStages
        );
    }

    public function testMalformedVueltaStagesNotString(): void
    {
        $this->expectException(TypeError::class);
        $this->sut->validateRiderForm(
            $this->name,
            $this->image,
            $this->team,
            $this->nation,
            $this->dob,
            $this->giroGc,
            $this->tourGc,
            $this->vueltaGc,
            $this->giroStages,
            $this->tourStages,
            ['3'] // vueltaStages
        );
    }
}
