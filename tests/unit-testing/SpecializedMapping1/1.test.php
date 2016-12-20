<?php

include_once(__DIR__.'/../../../lib/TTF/SpecializedMapping1.class.php');

$sm=new \TTF\SpecializedMapping1();

$ret=$sm->map(array(true, true, true), array(2, 5, 8));

//2*$params[0] + ($params[0] * $params[1] / 100)
$this->ASSERT_EQUALS(4.1, $ret['Y']);
