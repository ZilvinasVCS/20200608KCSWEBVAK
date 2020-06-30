<?php
	$testText;
	$testText = 'Hello world ;) <br/>';
	echo $testText;

	$studentsNames = [
		'male_names' => ['Andrius', 'Tomas', 'Benas'],
		'female_names' => ['Alina', 'Eglė']
	];

	$studentsNames['male_names'][1];
	$studentsNames['female_names'][] = 'Nijolė';

	//echo $studentsNames[3]; // echo only one array element
	$studentsNames['Male'] = 'Giedrius';
	print_r($studentsNames);
	echo count($studentsNames); //suskaiciuoja masyvo nariu vienetus.
	echo '<br><br>';
	asort($studentsNames['male_names']);
	echo implode(', ', $studentsNames['male_names']);
	echo '<br><br>';

	/* for, while */

	for ($i = 0; $i < count($studentsNames['male_names']); $i++) { ?>
		<script>
			console.log('<?php echo $studentsNames['male_names'][$i]; ?>!');
		</script>
	<?php }

	foreach ($studentsNames['female_names'] as $studentName) {
		echo $studentName;
	}

?>
