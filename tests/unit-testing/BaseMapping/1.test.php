<?php

include_once(__DIR__.'/../../../lib/TTF/BaseMapping.class.php');

$bm=new \TTF\BaseMapping();

$this->ASSERT_EQUALS(0, $bm->getConditionsMapIndex(array(true, true, false)));
$this->ASSERT_EQUALS(1, $bm->getConditionsMapIndex(array(true, true, true)));
$this->ASSERT_EQUALS(2, $bm->getConditionsMapIndex(array(false, true, true)));

try
{
	$bm->getConditionsMapIndex(array(false, false, false));
	$this->ASSERT_FALSE_MSG('Exception not thrown');
}
catch(\TTF\Exception $err)
{
	$this->ASSERT_TRUE_MSG('Exception caught');
	$this->ASSERT_EQUALS(\TTF\Exception::WRONG_MAXP_INDEX, $err->getCode());
}

//index 0
$res=$bm->map(array(true, true, false), array(2,1,3));
//formula is '$params[0] + ($params[0] * $params[1] / 100)'
// 2 + (2 * 1)/100 = 2.02
$this->ASSERT_EQUALS(2.02, $res['Y']);

$this->ASSERT_EQUALS('S', $res['X']);

//index=1
//formula '$params[0] + ($params[0] * ($params[1] - $params[2]) / 100)
//2 + (2* ( 1-3)/100)=2  + 2 * (-0.02) = 1.96
$res=$bm->map(array(true, true, true), array(2,1,3));

$this->ASSERT_EQUALS('R', $res['X']);
$this->ASSERT_EQUALS(1.96, $res['Y']);


//index 2
$res=$bm->map(array(false, true, true), array(2,1,3));

$this->ASSERT_EQUALS('T', $res['X']);

//$params[0] - ($params[0] * $params[2] / 100)
$this->ASSERT_EQUALS(1.94, $res['Y']);
