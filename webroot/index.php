<?php

$numConditions=3;
$numParams=3;
$services=array('Base Mapping', 'Specilized Mapping 1', 'Specilized Mapping 2');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>TTF App</title>
		<link rel="stylesheet" type="text/css" href="lib/default.css">
		<script type="text/javascript" src="lib/default.js"></script>
	</head>
	<body>
		<header>
			<h1>TTF App</h1>
		</header>
		<main>
		<form action="web-service.php" method="post" enctype="multipart/form-data" onsubmit="return false">
			<div id="message">
				<span id="message_text"></span>
				<a href="#" onclick="closeMessage(); return false;" id="close_message_button">Ok</a>
			</div>
			<h2>Conditions</h2>
			<div class="clearfix">
<?php
			for($i=0; $i<$numConditions; $i++)
			{
?>
			<div class="clearfix form-field-inline">
				<label for="condition_<?=$i?>"><?=chr(65+$i)?></label>
				<input type="hidden" name="conditions[<?=$i?>]" value="0">
				<input type="checkbox" name="conditions[<?=$i?>]" id="condition_<?=$i?>" value="1">
			</div>
<?php
			}
?>
			</div>
			<h2>Parameters</h2>
<?php
			for($i=0; $i<$numParams; $i++)
			{
?>
			<div class="clearfix form-field">
				<label for="param_<?=$i?>"><?=chr(68+$i)?></label>
				<input type="text" name="param[]" id="param_<?=$i?>" placeholder="Enter numeric value for <?=chr(68+$i)?>">
			</div>
<?php
			}
?>
			<h2>Mapping Type</h2>
			<div class="clearfix form-field">
				<label for="service">Choose the mapping type:</label>
				<select name="service" id="service">
<?php
			foreach( $services as $serviceId=>$service)
			{
?>
					<option value="<?=$serviceId?>"><?=$service?></option>
<?php
			}
?>
				</select>
			</div>
			<input type="submit" name="cmd_x" value="Submit" onclick="sendForm(this)">
			<input type="reset" value="Reset"> 
		</form>
		</main>
		<footer>
		</footer>
	</body>
</html>