<?php

include_once(__DIR__.'/../lib/WebService.class.php');
include_once(__DIR__.'/../lib/TTF/MappingFactory.class.php');

$service=new WebService();

$mp=new \TTF\MappingFactory();

$mo=$mp->createMappingObject($_POST['service']);

try
{
	//@todo validations
	$ret=$mo->map($_POST['conditions'], $_POST['param']);
	$service->appendResponse(array('status' => true, 'message' => 'Calculated values are: X='.$ret['X'].'; Y='.$ret['Y'], 'xy' => array('X'=>$ret['X'], 'Y'=>$ret['Y'])));
}
catch(\TTF\Exception $err)
{
	$service->appendResponse(array('status' => false, 'message' => $err->getMessage()));
}
catch(Exception $err)
{
	
}




$service->send();

