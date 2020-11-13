<?php
namespace App\Services;
use App\Models\Plateau;

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
        for ($i = 0; $i < count($instructions); $i+=2)
        {
            array_push($rovers,[$instructions[$i], $instructions[$i+1]]);
        }    
        return $rovers;
    }

    public function numberOfRovers() :int
    {
        return count($this->rovers);
    }
}