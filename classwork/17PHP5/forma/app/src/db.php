<?php

	define('DB_SERVER', 'localhost');
	define('DB_TABLE_NAME', 'forma');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');

	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE_NAME);

	if ($mysqli->connect_error) {
		echo "Klaida susijungiant su duomenų bazele.";
	}

	$sql = "INSERT INTO klientai (vardas, email, message) VALUES ('$name', '$email', '$message')";

	if (mysqli_query($mysqli, $sql)) {
		echo "Įrašas išsaugotas sėkmingai";
	} else {
		echo "Įvyko klaida išsaugojant įrašą.";
	}

	// should be in other file where permissions are needed to see results.
	$sql = "SELECT * FROM klientai;";
	$result = $mysqli->query($sql);
	while($array = $result->fetch_assoc()) {
		var_dump($array);
	}
