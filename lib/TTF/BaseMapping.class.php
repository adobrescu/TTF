<?php

namespace TTF;

include_once(__DIR__.'/Exception.class.php');

class BaseMapping
{
	/**
	 *
	 * @var array $___map - matrix used to map user input (provided conditions)
	 *				to calculation formulas 
	 */
	static protected $___map=array(
		array(true, true, false),
		array(true, true, true),
		array(false, true, true)
	);
	/**
	 *
	 * @var array $___X used to find "X", conditions -> $___map entry index -> $X
	 */
	static protected $___X=array('S', 'R', 'T');
	protected $mapToX=array( 0 => 0, 1 => 1, 2 => 2); //maps $___map entries to $___X
	/**
	 *
	 * @var array - conditions ->  $___map entry index -> $___formulas index (used with eval)
	 */
	static protected $___formulas=array(
			'$params[0] + ($params[0] * $params[1] / 100)',
			'$params[0] + ($params[0] * ($params[1] - $params[2]) / 100)',
			'$params[0] - ($params[0] * $params[2] / 100)'
		);
	protected $xToFormula=array( 0 => 0, 1 => 1, 2 => 2); //maps $___X to $___formulas
	/*
	 * As the class will work via a web service, it might be possible
	 * to pass the input directly to the constructor and imediatly do the calculations
	 * and store them inot a public var. 
	 * I leave the constructor empty, All calculations are done by BaseMapping::map
	 */
	public function __construct()
	{
	}
	/**
	 * getConditionsMapIndex - finds map index that meets $conditionsList
	 * 
	 * @param type $conditionsList
	 */
	public function getConditionsMapIndex($conditionsList)
	{
		$mapSize=count(static::$___map);
		for($i=0; $i<$mapSize; $i++)
		{
			if(static::$___map[$i]==$conditionsList)
			{
				return $i;
			}
		}
		//exception
		throw new Exception('No map entry found that meets the conditions', Exception::WRONG_MAXP_INDEX);
	}
	/**
	 * 
	 * @param type $conditionsList - list of booleans based on which the calcs are done
	 * @param type $params - list of params involved in the calcs
	 */
	public function map($conditionsList, $params)
	{
		try
		{
			$mapIndex=$this->getConditionsMapIndex($conditionsList);
			$xIndex=$this->mapToX[$mapIndex];
			$formulaIndex=$this->xToFormula[$xIndex];
			
			return array('X' => static::$___X[$xIndex], 'Y' => eval('return '.static::$___formulas[$formulaIndex].';') );
		}
		catch(Exception $err)
		{
			throw $err;
		}
	}
}
