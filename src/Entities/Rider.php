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
    public int|null $giroGC;
    public int|null $tourGC;
    public int|null $vueltaGC;
    public int|null $giroStages;
    public int|null $tourStages;
    public int|null $vueltaStages;

    public function __construct(
        int $id,
        string $name,
        string $image,
        string $team,
        string $nation,
        string $dob,
        int|null $giroGC,
        int|null $tourGC,
        int|null $vueltaGC,
        int|null $giroStages,
        int|null $tourStages,
        int|null $vueltaStages
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
    }
}
