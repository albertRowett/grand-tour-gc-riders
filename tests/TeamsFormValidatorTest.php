<?php

use Collection\Models\TeamsModel;
use Collection\TeamsFormValidator;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

class TeamsFormValidatorTest extends TestCase
{
    private TeamsFormValidator $sut; // System under test
    private $teamsModelMock;

    protected function setUp(): void
    {
        $this->sut = new TeamsFormValidator(); // Instantiate before each test
        $this->teamsModelMock = $this->createMock(TeamsModel::class);
    }

    public function testSuccessFormDataValid(): void
    {
        $this->teamsModelMock->method('checkForTeamById')->willReturn(true);

        $this->assertTrue($this->sut->validateTeamsForm(
            [
                1 => 'on',
                'submit' => 'Submit'
            ],
            $this->teamsModelMock
        ));
    }

    public function testFailureFinalKeyIsNotSubmit(): void
    {
        $this->assertFalse($this->sut->validateTeamsForm(
            [
                1 => 'on',
                'some other key' => 'Submit'
            ],
            $this->teamsModelMock
        ));
    }

    public function testFailureFinalValueIsNotSubmit(): void
    {
        $this->assertFalse($this->sut->validateTeamsForm(
            [
                1 => 'on',
                'submit' => 'Some other value'
            ],
            $this->teamsModelMock
        ));
    }

    public function testFailureTeamIdIsLessThanOne(): void
    {
        $this->assertFalse($this->sut->validateTeamsForm(
            [
                0 => 'on',
                'submit' => 'Submit'
            ],
            $this->teamsModelMock
        ));
    }

    public function testFailureTeamIdIsNonIteger(): void
    {
        $this->assertFalse($this->sut->validateTeamsForm(
            [
                '1.5' => 'on',
                'submit' => 'Submit'
            ],
            $this->teamsModelMock
        ));
    }

    public function testFailureTeamIdIsNotInDatabase(): void
    {
        $this->teamsModelMock->method('checkForTeamById')->willReturn(false);

        $this->assertFalse($this->sut->validateTeamsForm(
            [
                999 => 'on',
                'submit' => 'Submit'
            ],
            $this->teamsModelMock
        ));
    }
}
