<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Rover;

class RoverTest extends TestCase
{

	public function test_return_rover_input()
	{
        
		$rover = new Rover(
            "5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM");        
        
		$rover->getInput();        
        
		$this->assertEquals("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM", $rover->getInput());
	}
	public function test_return_plateau_dimensions()
	{
        
		$rover = new Rover(
            "5 5\n1 2 N\nLMLMLMLMM");        
        
		$result= $rover->getPlateauDimensions();      
        
		$this->assertEquals('5 5', $result);
	}
    public function test_return_rover_initial_position()
	{
        
		$rover = new Rover(
            "5 5\n1 2 N\nLMLMLMLMM");        
        
		$result= $rover->getInitialPosition();      
        
		$this->assertEquals('1 2 N', $result);
	}
	
	public function test_return_rover_instructions()
	{
        
		$rover = new Rover(
            "5 5\n1 2 N\nLMLMLMLMM");        
        
		$result= $rover->getInstructions();      
        
		$this->assertEquals('LMLMLMLMM', $result);
	}
}