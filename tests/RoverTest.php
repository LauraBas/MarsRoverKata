<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Rover;

class RoverTest extends TestCase
{

	public function test_say_Hi()
	{
		$rover = new Rover();

		$rover->sayHi();

		$this->assertEquals("Hi!", $rover->sayHi());
    }
}