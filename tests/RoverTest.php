<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Rover;

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
		$this->assertRover("5 5\n0 0 N\nR", "0 0 E");
		
		
	}

	private function assertRover($input, $expected) 
	{
		$rover = new Rover($input);        
        
		$result = $rover->go();        
        
		$this->assertEquals($expected, $result);
	}
	
}