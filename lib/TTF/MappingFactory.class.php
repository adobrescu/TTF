<?php

namespace TTF;

/**
 * Simple class used to create Mapping classes instances
 */
class MappingFactory
{
	static $___classes=array(
		'BaseMapping', 
		'SpecializedMapping1',
		'SpecializedMapping2'
	);
	public function __construct()
	{
	}
	public function createMappingObject($classId)
	{
		$className=static::$___classes[$classId];
		
		include_once($className.'.class.php');
		
		$className='\\TTF\\'.$className;
		
		return new $className();
	}
}
