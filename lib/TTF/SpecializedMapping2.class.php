<?php

namespace TTF;

include_once(__DIR__.'/BaseMapping.class.php');

class SpecializedMapping2 extends BaseMapping
{
	public function __construct()
	{
		//Weird to modify hardcoded, relationships
		//In a real app they come (usually) from a database
		
		/*
		 * A && B && !C => X = T
			A && !B && C => X = S
			X = S => Y = F + D + (D * E / 100)
		 */
		//Adds new conditions combination (A && !B && C)
		static::$___map[]=array(true, false, true);
		
		//Adds new formula  - F + D + (D * E / 100)
		static::$___formulas[]='$params[2] + $params[0] + ($params[0] * $params[1] / 100)';
		
		//modifies the relationships
		$this->mapToX[0]=2;
		$this->mapToX[3]=0;
		
		$this->xToFormula[0]=3;
		
	}
}