<?php

namespace TTF;

class SpecializedMapping1 extends BaseMapping
{
	public function __construct()
	{
		//override the formula for index 1
		//the relationships are the same as the base class
		static::$___formulas[1]='2*$params[0] + ($params[0] * $params[1] / 100)';
	}
}