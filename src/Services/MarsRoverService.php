<?php
namespace App\Services;
use App\Models\Plateau;
use App\Models\Rover;

class MarsRoverService 
{
    public function __construct(string $input)
    {
        $instructions = explode("\n", $input);
        $plateauDimensions = array_shift($instructions);
        $this->setPlateau($plateauDimensions);
        $this->rovers = $this->createRovers($instructions);
        
    }

    
    private function setPlateau($plateauDimensions) :void
    {
        $this->plateau = new Plateau($plateauDimensions);        
    }

    public function getPlateauSize() :array
    {
        $plateauSize = array($this->plateau->plateauX,$this->plateau->plateauY);
        return $plateauSize;
    }

    private function createRovers($instructions) :array
    {
        $rovers = [];
        while(count($instructions) > 0)
        {
            array_push($rovers,[array_shift($instructions), array_shift($instructions)]);
            
        }
        return $rovers;
    }

    public function numberOfRovers() :int
    {
        return count($this->rovers);
    }

    public function newRover() :Rover
    {
        foreach($this->rovers as $rover)
        {            
            //$input = implode(" ", $rover);
            $rover = new Rover("5 5\n1 2 N\nLMLMLMLMM");
            return $rover;
        }
    }
}