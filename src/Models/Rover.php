<?php

namespace App\Models;

Class Rover {

        
    public function __construct(string $input)
    {
        $this->roverX = (int) $this->splitInput($input)[0];
        $this->roverY = (int) $this->splitInput($input)[1];
        $this->roverOrientation = $this->splitInput($input)[2];
    }

    public function splitInput($input) :array
    {
        $movements = explode(" ", $input);
        return $movements;
    }
        
    public function go()
    {
       return $this->roverX . " " . $this->roverY . " " . $this->roverOrientation;
        
    }
    
}
    
    
