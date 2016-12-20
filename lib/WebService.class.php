<?php

/*
 * Dummy simple class.
 * Does almost nothing, JSON encodes and sends back content to the browser.
 */
class WebService
{
	protected $response;
	
	public function appendResponse($response)
	{
		$this->response[]=$response;
	}
	public function jsonEncode($var)
	{
		return json_encode($var);
	}
	public function send()
	{
		echo $this->jsonEncode($this->response);
	}
}
