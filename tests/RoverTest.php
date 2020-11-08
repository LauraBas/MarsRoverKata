<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Rover;

class RoverTest extends TestCase
{

	public function test_return_rover_movement_is_0()
	{
        
		$rover = new Rover("0 0 N");        
        
		$result = $rover->go();        
        
		$this->assertEquals("0 0 N", $result);
	}

	
}