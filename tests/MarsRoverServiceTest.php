<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Services\MarsRoverService;

class MarsRoverServiceTest extends TestCase
{
    public function test_return_plateau_size() 
	{
		$MarsRoverService = new MarsRoverService("5 5");        
        
		$result = $MarsRoverService->getPlateauSize();        
        
		$this->assertEquals([5, 5], $result);
    }
    public function test_return_rover_created() 
	{
		$MarsRoverService = new MarsRoverService("5 5\n1 2 N");        
        
		$result = $MarsRoverService->numberOfRovers();        
        
		$this->assertEquals(1, $result);
	}


}