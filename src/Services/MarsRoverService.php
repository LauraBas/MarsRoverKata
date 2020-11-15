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
        $this->plateau = new Plateau($plateauDimensions); 
        $this->rovers = $this->createRovers($instructions);
    }

    public function calculate() :array 
    {
        $result =[];
        foreach($this->rovers as $rover)
        {
            array_push($result,$rover->go());
        }
        return $result;
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
            $inital = array_shift($instructions);
            $movements = array_shift($instructions);
            array_push($rovers, $this->newRover($inital, $movements));   
        }
        return $rovers;
    }

    

    private function newRover(string $initial, string $movements) :Rover
    {
        $explosion = explode(" ", $initial);
        $x = (int) $explosion[0];
        $y = (int) $explosion[1];
        $dir = $explosion[2];
        return new Rover($movements, $this->plateau, $x, $y, $dir);
    }
}