<?php

	if ($_GET['id']) {
		include_once('config/database.php');
		include_once('objects/item.php');

		$database = new Database();
		$db = $database->getConnection();

		$item = new Item($db);

		if ($item->deleteOneItem($_GET['id'])) {
			echo "
				<script>alert('Succesfully deleted. Redirecting to main page');</script>
				<script>window.location.replace('index.php')</script>
			";
		} else {
			echo "DELETE proccess was not completed.";
		}

	} else {
		header('Location: index.php?error=idisneededtodeleteanitem');
		exit();
	}
