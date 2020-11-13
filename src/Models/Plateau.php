<?php

namespace App\Models;
use App\Models\Rover;


Class Plateau 
{
    public function __construct(string $plateauDimensions)
    {
        $dimensions = explode(" ", $plateauDimensions);
        $this->setDimensions($dimensions);
        
        
    }
    public function setDimensions($dimensions) :void 
    {
        $this->plateauX = (int) $dimensions[0];
        $this->plateauY = (int) $dimensions[1];

    }

    public function isOutsidePlateau($roverX, $roverY) :bool 
    {
        return ($roverX > $this->plateauX || $roverX < 0) || ($roverY > $this->plateauY || $roverY < 0);
        
    }
}