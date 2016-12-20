<?php

namespace TTF;

class SpecializedMapping1 extends BaseMapping
{
	public function __construct()
	{
		//override the formula for index 1
		static::$___formulas[1]='2*$params[0] + ($params[0] * $params[1] / 100)';
	}
}