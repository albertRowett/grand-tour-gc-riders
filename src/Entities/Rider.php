<?php

namespace Collection\Entities;

readonly class Rider
{
    public int $id;
    public string $name;
    public string $image;
    public string $team;
    public string $nation;
    public string $dob;
    public ?int $giroGc;
    public ?int $tourGc;
    public ?int $vueltaGc;
    public ?int $giroStages;
    public ?int $tourStages;
    public ?int $vueltaStages;
    public int $retired;

    public function __construct(
        int $id,
        string $name,
        string $image,
        string $team,
        string $nation,
        string $dob,
        ?int $giroGc,
        ?int $tourGc,
        ?int $vueltaGc,
        ?int $giroStages,
        ?int $tourStages,
        ?int $vueltaStages,
        int $retired
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->team = $team;
        $this->nation = $nation;
        $this->dob = $dob;
        $this->giroGc = $giroGc;
        $this->tourGc = $tourGc;
        $this->vueltaGc = $vueltaGc;
        $this->giroStages = $giroStages;
        $this->tourStages = $tourStages;
        $this->vueltaStages = $vueltaStages;
        $this->retired = $retired;
    }
}
