<?php
	$mainPageUrl = 'index.php';
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1; // mes bandymui naudosime 3 puslapi
	$itemsPerPage = 5; // 5 irasai per viename puslapyje
	$itemsFromNumber = ($itemsPerPage * $page) - $itemsPerPage; // nuo 10 iki 15 iraso turime rodyti

	//TODO: persikelti duomenu bazes prisijungimu duomenis
	//TODO: persikelti cia duomenu bazes lenteliu pavadinimus