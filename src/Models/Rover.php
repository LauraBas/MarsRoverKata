<?php

namespace App\Models;

Class Rover {

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function getInput() :string
    {
        return $this->input;
    }
}