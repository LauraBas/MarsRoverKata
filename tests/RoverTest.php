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
	}

	private function assertRover($input, $expected) 
	{
		$rover = new Rover($input);        
        
		$result = $rover->go();        
        
		$this->assertEquals($expected, $rover->go());
	}
	
}