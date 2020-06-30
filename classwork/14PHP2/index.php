<?php
	$testText;
	$testText = 'Hello world ;) <br/>';
	echo $testText;

	$studentsNames = [
		'male' => ['Andrius', 'Tomas', 'Benas'],
		'female' => ['Alina']
	];

	$studentsNames['male'][1];

	$studentsNames['female'][] = 'Nijolė';

	//echo $studentsNames[3]; // echo only one array element
	$studentsNames['Male'] = 'Giedrius';
	print_r($studentsNames);
	echo count($studentsNames); //suskaiciuoja masyvo nariu vienetus.
	echo '<br><br>';
	asort($studentsNames['male']);
	echo implode(', ', $studentsNames['male']);
	echo '<br><br>';


?>
