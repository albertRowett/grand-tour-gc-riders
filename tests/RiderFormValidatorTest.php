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

    public function test_success_all_fields_valid(): void
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

    public function test_failure_no_name(): void
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

    public function test_failure_name_too_long(): void
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

    public function test_failure_no_image(): void
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

    public function test_failure_image_too_long(): void
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

    public function test_failure_no_team(): void
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

    public function test_failure_team_too_long(): void
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

    public function test_failure_no_nation(): void
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

    public function test_failure_nation_too_long(): void
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

    public function test_failure_no_dob(): void
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

    public function test_failure_invalid_dob(): void
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

    public function test_failure_incorrect_dob_format(): void
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

    public function test_failure_giro_gc_not_integer(): void
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

    public function test_failure_giro_gc_negative(): void
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

    public function test_failure_giro_gc_too_large(): void
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

    public function test_failure_tour_gc_not_integer(): void
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

    public function test_failure_tour_gc_negative(): void
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

    public function test_failure_tour_gc_too_large(): void
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

    public function test_failure_vuelta_gc_not_integer(): void
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

    public function test_failure_vuelta_gc_negative(): void
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

    public function test_failure_vuelta_gc_too_large(): void
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

    public function test_failure_giro_stages_not_integer(): void
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

    public function test_failure_giro_stages_negative(): void
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

    public function test_failure_giro_stages_too_large(): void
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

    public function test_failure_tour_stages_not_integer(): void
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

    public function test_failure_tour_stages_negative(): void
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

    public function test_failure_tour_stages_too_large(): void
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

    public function test_failure_vuelta_stages_not_integer(): void
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

    public function test_failure_vuelta_stages_negative(): void
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

    public function test_failure_vuelta_stages_too_large(): void
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

    public function test_malformed_name_not_a_string(): void
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

    public function test_malformed_image_not_a_string(): void
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

    public function test_malformed_team_not_a_string(): void
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

    public function test_malformed_nation_not_a_string(): void
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

    public function test_malformed_dob_not_a_string(): void
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

    public function test_malformed_giro_gc_not_a_string(): void
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

    public function test_malformed_tour_gc_not_a_string(): void
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

    public function test_malformed_vuelta_gc_not_a_string(): void
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

    public function test_malformed_giro_stages_not_a_string(): void
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

    public function test_malformed_tour_stages_not_a_string(): void
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

    public function test_malformed_vuelta_stages_not_a_string(): void
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
