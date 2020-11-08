<?php

namespace App\Models;

Class Rover {

    
        
    public function __construct(string $input)
    {
        $instructions = explode("\n", $input);
        $initialPosition = $instructions[1];
        $movements = $instructions[2];
        $this->setRoverMovements($movements);
        $this->setRoverInstructions($initialPosition);
    }
    

    public function setRoverInstructions($input) :void
    {
        $positions = explode(" ", $input);
        $this->roverX = (int) $positions[0];
        $this->roverY = (int) $positions[1];
        $this->roverOrientation = $positions[2];

    }
    public function setRoverMovements($input) :void
    {
        $this->movements = $input;
    }
        
    public function go() :string
    {        
        if ($this->movements === "M")
        {
            return $this->roverX . " " . ($this->roverY + 1 ). " " . $this->roverOrientation;        
        } 
        
            
        return $this->roverX . " " . $this->roverY . " " . $this->roverOrientation;        
    }
    
}
    
    
