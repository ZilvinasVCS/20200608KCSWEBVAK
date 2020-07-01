<?php
	define("ID_NUMBER", 3860911506060);
	echo ID_NUMBER;
?>

<?php
	$firstName = $_POST['first_name'] ?? '';

	if ($firstName) {
		addCookie('first_name', $firstName, 3);
		echo $firstName;
	}
?>
<form action="<?php $_PHP_SELF ?>" method="post">
	<input name="first_name" placeholder="Your name" value="<?php echo $firstName; ?>">
	<input type="number" name="age" placeholder="Your age">
	<input type="submit">
</form>
<br><br>

<?php
/*
*	sukurti funkcija, kurios parametrai bus(failo pavadinimas, ka norime irasyti)
*	iskvieskite funkcija
*/

function insertTextIntoFile($fileName, $insertableText = '')
{
	$file = fopen($fileName, 'w+');
	if ($insertableText !== '') {
		fwrite($file, $insertableText . "\n");
	}
	fclose($file);
}

insertTextIntoFile('input-values.txt');


$cookieFirstName = (isset($_COOKIE['first_name'])) ? $_COOKIE['first_name'] : '';
echo $cookieFirstName;

function addCookie($cookieName, $cookieValue, $extraDays = 1)
{
	$daysToLive = time() + (60 * 60 * 24 * $extraDays);
	setcookie($cookieName, $cookieValue, $daysToLive, '/', '', 0);
}
