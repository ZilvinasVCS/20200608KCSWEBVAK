<?php
	//var_dump($_POST);

	 if ($_POST) {
		$name = trim($_POST['vardas']);
		$email = trim($_POST['email']);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		$message = trim($_POST['message']);
		$message = htmlspecialchars($message);

		 if (!empty($name) && !empty($email) && !empty($message)) {
			 $from = "$email";
			 $to = 'zilvinasvcs@gmail.com';
			 $subject = 'Užklausa iš Jūsų tinklalapio: ' . $_SERVER['HTTP_HOST'];
			 $author = 'Žinutė nuo: ' . $name . ', kurio email yra: ' . $email;
			 //mail($to, $subject, $author, $message, $from);
			 echo "<div style=\" background: green; color: white; font-size: 30px; \"> Jūsų žinelė išsiųsta laba tvarkinga. :D </div>";

			 include('db.php');
		 }
	 }
