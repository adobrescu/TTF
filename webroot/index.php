<?php

$numConditions=3;
$numParams=3;

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
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" onsubmit="return false">
			<h2>Conditions</h2>
			<div class="clearfix">
<?php
			for($i=0; $i<$numConditions; $i++)
			{
?>
			<div class="clearfix form-field-inline">
				<label for="condition_<?=$i?>"><?=chr(65+$i)?></label>
				<input type="checkbox" name="conditions[]" id="condition_<?=$i?>">
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
			<input type="submit" name="cmd_x" value="Submit">
		</form>
		</main>
		<footer>
		</footer>
	</body>
</html>