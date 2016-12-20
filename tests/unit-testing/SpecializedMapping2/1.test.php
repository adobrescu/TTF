<?php

include_once(__DIR__.'/../../../lib/TTF/SpecializedMapping2.class.php');

$sm=new \TTF\SpecializedMapping2();

$ret=$sm->map(array(true, true, false), array(4, 2, 7));

$this->ASSERT_EQUALS('T', $ret['X']);

$GLOBALS['dbg']=true;
$ret=$sm->map(array(true, false, true), array(4, 2, 7));

$this->ASSERT_EQUALS('S', $ret['X']);

//Y = F + D + (D * E / 100)
//11.08
$this->ASSERT_EQUALS(11.08, $ret['Y']);