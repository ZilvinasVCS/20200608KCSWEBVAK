<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP kursas - Login forma</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
			<div class="nav-login">
				<form action="includes/login.inc.php" method="post">
					<input type="text" name="uid" placeholder="Username/Email" />
					<input type="password" name="pwd" placeholder="Password" />
					<button type="submit" name="submit">Login</button>
				</form>
				<a href="signup.php">Sign up</a>
			</div>
		</div>
	</nav>
</header>
