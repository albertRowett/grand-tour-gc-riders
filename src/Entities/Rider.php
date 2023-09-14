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
    public ?int $giroGC;
    public ?int $tourGC;
    public ?int $vueltaGC;
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
        ?int $giroGC,
        ?int $tourGC,
        ?int $vueltaGC,
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
        $this->giroGC = $giroGC;
        $this->tourGC = $tourGC;
        $this->vueltaGC = $vueltaGC;
        $this->giroStages = $giroStages;
        $this->tourStages = $tourStages;
        $this->vueltaStages = $vueltaStages;
        $this->retired = $retired;
    }
}
