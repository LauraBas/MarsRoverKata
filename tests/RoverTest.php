<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Rover;

class RoverTest extends TestCase
{

	public function test_return_rover_input()
	{
        //given
		$rover = new Rover(
            "5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM");
        
        //when
		$rover->getInput();
        
        //then
		$this->assertEquals("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM", $rover->getInput());
    }
}