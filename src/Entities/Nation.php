<?php

namespace Collection\Entities;

readonly class Nation
{
    public int $id;
    public string $nation;

    public function __construct(
        int $id,
        string $nation
    ) {
        $this->id = $id;
        $this->nation = $nation;
    }
}
