<?php

namespace App\Models;
use App\Models\Rover;


Class Plateau 
{
    private array $occupataidCoordenates;
    

    public function __construct(string $plateauDimensions)
    {
        $dimensions = explode(" ", $plateauDimensions);
        $this->setDimensions($dimensions);
        $this->occupataidCoordenates = [];
               
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
    public function isAnotherRoverInThisCoordenate($roverX, $roverY) :bool 
    {
        foreach ($this->occupataidCoordenates as $occupaidString)
        {
            $occupaid = explode(" ", $occupaidString);
            $occupataidX =  $occupaid[0];
            $occupataidY =  $occupaid[1];
            if ($roverX == $occupataidX && $roverY == $occupataidY)
            {
                return true;
            }
        }
        
        return false;    
    }

    public function setOcuppaidPositions($coordenates)
    {
        array_push($this->occupataidCoordenates, $coordenates);

    }
}