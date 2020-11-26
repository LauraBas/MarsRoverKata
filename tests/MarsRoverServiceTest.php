<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Services\MarsRoverService;
use App\Models\Rover;
use App\Models\Plateau;

class MarsRoverServiceTest extends TestCase
{
    public function test_return_plateau_size() 
	{
		$MarsRoverService = new MarsRoverService("5 5");        
        
		$result = $MarsRoverService->getPlateauSize();        
        
		$this->assertEquals([5, 5], $result);
    }
  	
	
	public function test_calculate_one_rover_position()
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N\nLMLMLMLMM");
		
		$result = $MarsRoverService->calculate();

		$this->assertEquals(["1 3 N"], $result);
	}
	public function test_calculate_two_rover_position()
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM");
		
		$result = $MarsRoverService->calculate();

		$this->assertEquals(["1 3 N", "5 1 E"], $result);
	}

	public function test_calculate_crush_when_rover_move_into_other_rover_result()
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N\nLMLMLMLMM\n1 2 N\nM");
		
		$result = $MarsRoverService->calculate();

		$this->assertEquals(['1 3 N', 'crush'], $result);


	}

}