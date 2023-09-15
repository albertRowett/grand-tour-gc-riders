<?php

namespace Collection\Entities;

readonly class Team
{
    public int $id;
    public string $team;

    public function __construct(
        int $id,
        string $team
    ) {
        $this->id = $id;
        $this->team = $team;
    }
}
