<?php

include_once(__DIR__.'/../lib/WebService.class.php');

$service=new WebService();

$service->appendResponse(array('status' => true, 'message' => 'This is a test', array('X'=>'S', 'Y'=>7)));

$service->send();

