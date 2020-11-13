<?php

namespace App\Models;
use App\Models\Plateau;

Class Rover {
        
    public function __construct(string $input)
    {
        $instructions = explode("\n", $input);
        $plateauDimensions = $instructions[0];
        $initialPosition = $instructions[1];
        $movements = $instructions[2];
        $this->setRoverMovements($movements);
        $this->setRoverInstructions($initialPosition);
        $this->setPlateau($plateauDimensions);
        
    }
    public function setPlateau($plateauDimensions) :void
    {
       $this->plateau = new Plateau($plateauDimensions);
       
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
        $this->movements = str_split($input);
                
    }
    public function turnLeft() :void
    {
        switch ($this->roverOrientation) {
            case $this->roverOrientation == "N":
                $this->roverOrientation = "W";
                break;
            case $this->roverOrientation == "W":
                $this->roverOrientation = "S";
                break;
            case $this->roverOrientation == "S":
                $this->roverOrientation = "E";
                break;
            case $this->roverOrientation == "E":
                $this->roverOrientation = "N";
                break;
        }
                        
    }

    public function turnRigth() :void
    {
        switch ($this->roverOrientation) {
            case $this->roverOrientation == "N":
                $this->roverOrientation = "E";
                break;
            case $this->roverOrientation == "E":
                $this->roverOrientation = "S";
                break;
            case $this->roverOrientation == "S":
                $this->roverOrientation = "W";
                break;
            case $this->roverOrientation == "W":
                $this->roverOrientation = "N";
                break;
        }
            
    }
    public function move() :void
    {
        switch ($this->roverOrientation) {
            case $this->roverOrientation == "N":
                $this->roverY += 1;
                break;
            case $this->roverOrientation == "E":
                $this->roverX += 1;
                break;
            case $this->roverOrientation == "S":
                $this->roverY -= 1;
                break;
            case $this->roverOrientation == "W":
                $this->roverX -= 1;
                break;
        }
                
    }
        
    public function go() :string
    {     
                 
        foreach ($this->movements as $movement)
        {
            if($movement == "L")
            {
                $this->turnLeft();
            }
            if($movement == "R")
            {
                $this->turnRigth();
            }
            if($movement == "M")
            {
                $this->move();
                if ($this->plateau->isOutsidePlateau($this->roverX, $this->roverY))
                {
                    return "out of limits";
                }
            } 
        }                
        return $this->roverX . " " . $this->roverY . " " . $this->roverOrientation;                                            
    } 
}
  
