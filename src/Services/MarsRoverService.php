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
        $this->rovers = array();
        
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

    //private 

    public function numberOfRovers() :int
    {
        return count($this->rovers);
    }
}