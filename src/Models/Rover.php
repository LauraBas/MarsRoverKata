<?php

namespace App\Models;

Class Rover {
    
    public function __construct(string $input)
    {
        $this->input = $input;
        $roverInfo;
        $initialPosition;
        $instructions;
        $plateauDimensions;
                   
    }

    public function getInput() :string
    {
        return $this->input;
    }

    public function getPlateauDimensions() :string
    {
        $input = $this->getInput();
        $roverInfo = explode("\n", $input);
        $this->plateauDimensions = $roverInfo[0];
        return $this->plateauDimensions;
    }
   
    public function getInitialPosition() :string 
    {
        $input = $this->getInput();
        $roverInfo = explode("\n", $input);
        $this->initialPosition = $roverInfo[1];
        return $this->initialPosition;
    }

    public function getInstructions() :string 
    {
        $input = $this->getInput();
        $roverInfo = explode("\n", $input);
        $this->instructions = $roverInfo[2];
        return $this->instructions;

    }
    
    
}