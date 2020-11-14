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
    public function test_return_count_of_rover_created() 
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N\nLMLMLMLMM");        
        
		$result = $MarsRoverService->numberOfRovers();        
        
		$this->assertEquals(1, $result);
	}
	public function test_return_count_of_multiple_rover_created() 
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM");        
        
		$result = $MarsRoverService->numberOfRovers();        
        
		$this->assertEquals(2, $result);
	}
	public function test_calculate_zero_rovers_positions()
	{
		$MarsRoverService = new MarsRoverService("");
		
		$result = $MarsRoverService->calculate();

		$this->assertEquals([], $result);
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

}