<?php
$v[0]=7;
$b[1]=3;
echo 'test<br>';
die(eval('
	$a=$v[0]*$b[1]; 
	echo $a;
	'));
$this->ASSERT_TRUE(true);
