<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Rover;
use App\Models\Plateau;

class RoverTest extends TestCase
{

	public function test_return_rover_movement()
	{
		$this->assertRover("MMM", "5 5", 0, 0, "N", "0 3 N");
		
	}
	public function test_return_rover_orientation()
	{
		$this->assertRover("MLLR","5 5", 0, 0, "E", "1 0 N");	
	}
	public function test_return_rover_change_orientation_and_move()
	{
		$this->assertRover("MMRMMRMRRM", "5 5", 3, 3, "E", "5 1 E");
			
	}
	public function test_return_rover_move_inside_plateau()
	{
		$this->assertRover("M", "0 0", 0, 0, "N", "out of limits");
		$this->assertRover("M", "1 1", 0, 0, "S", "out of limits");
					
	}
	// public function test_return_calculate_multiple_rovers()
	// {
	// 	$this->assertRover("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM", "1 3 N\n5 1 E");
		
					
	// }


	private function assertRover($input, $plateauInput, $x, $y, $direction, $expected) 
	{
		$rover = new Rover($input, new Plateau($plateauInput), $x, $y, $direction);        
        
		$result = $rover->go();        
        
		$this->assertEquals($expected, $result);
	}
	
	
}