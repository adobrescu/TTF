<?php

include_once(__DIR__.'/../../../lib/TTF/BaseMapping.class.php');

$bm=new \TTF\BaseMapping();

$this->ASSERT_EQUALS(0, $bm->getConditionsMapIndex(array(true, true, false)));
$this->ASSERT_EQUALS(1, $bm->getConditionsMapIndex(array(true, true, true)));
$this->ASSERT_EQUALS(2, $bm->getConditionsMapIndex(array(false, true, true)));
