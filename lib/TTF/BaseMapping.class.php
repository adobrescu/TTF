<?php

namespace TTF;


class BaseMapping
{
	/*
	 * As the class will work via a web service, it might be possible
	 * to pass the input directly to the constructor and imediatly do the calculations
	 * and store them inot a public var. 
	 * I leave the constructor empty, All calculations are done by BaseMapping::map
	 */
	public function __construct()
	{
	}
	public function map()
	{
	}
}
