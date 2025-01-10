<?php

namespace Collection\Entities;

readonly class Team
{
    public int $id;
    public string $team;
    public int $active;

    public function __construct(
        int $id,
        string $team,
        int $active
    ) {
        $this->id = $id;
        $this->team = $team;
        $this->active = $active;
    }
}
