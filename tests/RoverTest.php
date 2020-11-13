<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Rover;
use App\Models\Plateau;

class RoverTest extends TestCase
{

	public function test_return_rover_movement()
	{
		$this->assertRover("5 5\n0 0 N\n", "0 0 N");
		$this->assertRover("5 5\n0 0 N\nM", "0 1 N");
		$this->assertRover("5 5\n0 0 N\nMM", "0 2 N");
		$this->assertRover("5 5\n0 0 N\nMMM", "0 3 N");
		
	}
	public function test_return_rover_orientation()
	{
		$this->assertRover("5 5\n0 0 N\nL", "0 0 W");
		$this->assertRover("5 5\n0 0 S\nL", "0 0 E");
		$this->assertRover("5 5\n0 0 W\nR", "0 0 N");
		$this->assertRover("5 5\n0 0 N\nR", "0 0 E");
		$this->assertRover("5 5\n0 0 S\nR", "0 0 W");
		$this->assertRover("5 5\n0 0 E\nML", "1 0 N");	
	}
	public function test_return_rover_change_orientation_and_move()
	{
		$this->assertRover("5 5\n0 0 N\nRM", "1 0 E");
		$this->assertRover("5 5\n2 2 N\nRRMM", "2 0 S");
		$this->assertRover("5 5\n1 2 N\nLMLMLMLMM", "1 3 N");
		$this->assertRover("5 5\n3 3 E\nMMRMMRMRRM", "5 1 E");
			
	}
	public function test_return_rover_move_inside_plateau()
	{
		$this->assertRover("0 0\n0 0 N\nM", "out of limits");
		$this->assertRover("1 1\n0 0 S\nM", "out of limits");
		$this->assertRover("3 3\n3 3 E\nMMRMMRMRRM", "out of limits");
					
	}
	// public function test_return_calculate_multiple_rovers()
	// {
	// 	$this->assertRover("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM", "1 3 N\n5 1 E");
		
					
	// }


	private function assertRover($input, $expected) 
	{
		$rover = new Rover($input);        
        
		$result = $rover->go();        
        
		$this->assertEquals($expected, $result);
	}
	
	
}