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
	public function test_return_rovers_created()
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM");
		
		$result = $MarsRoverService->newRover();
		$input ="5 5\n1 2 N\nLMLMLMLMM";

		$this->assertEquals(new Rover($input), $result);


	}


}