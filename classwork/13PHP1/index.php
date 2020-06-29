<p>labas
<?php
	echo ' pasauli.';
	//phpinfo();
	$firmosPavadinimas;
	$firmosPavadinimas = '\'UAB LABAS LIETUVA\'';
	$firmosPavadinimas = "'IĮ KĄ TŲ'";

	echo "Tarkim " . $firmosPavadinimas . " šis.";
	echo "Tarkim $firmosPavadinimas šis.";
	echo 'Tarkim $firmosPavadinimas šis. ';
?>
</p>

<!-- atidarykite PHP kodo fragmento rašymą.
	deklaruokite kintamaji, kurio pavadinimas yra 'mano metai'.
Atlikite if salygos sakini. Jeigu Jusu amzius daugiau nei 20, tuomet saukite sakini "Tau virs dvidesimt'. BET jeigu amzius daugiau virs 30, tuomet "Tau virs trisdesim". Kitu atveju tesktas "Esu labai jaunas."
-->

<?php
	$manoMetai = 33;
	$dvidesimtmetis = 20;
	$trisdesimtmetis = 30;
	// optimizuokime. deklaruokite amziaus skaicius i atskirus kintamuosius. tuos kintamuosius iskvieskite ten, kur dabar parasyti yra skaiciai.

	// visa sita if'a apskliauskite i papildoma if'a. Tikrinkite ar $manoMetai yra ne minusinis skaicius. Jokio else nereikia.

	if ($manoMetai >= 0) {
		if ($manoMetai >= $dvidesimtmetis && $manoMetai < $trisdesimtmetis) {
			echo 'Tau virs dvidesimt';
		} elseif ($manoMetai >= $trisdesimtmetis) {
			echo 'Tau virs trisdesimt';
		} else {
			echo 'Esi labai jaunas';
		}
	} else { ?>
		<script>alert('Tu dar negimes');</script>
		<div>Tu dar negimęs</div>
<?php
	}

$x = 5;
$y = 10;
$suma = $x + $y;
echo '5 + 10 = ' . $suma; // 5 + 10 = 15

$x = 5;
$y = 10;
$suma = 5 * 10;
echo '5 + 10 = ' . $suma; // 5 + 10 = 15

?>

<?php
	$miestas = 'Majamis :P~~';
	$metai = 2020;
	$geriMetai = false;
?>

<div>
	<?php
		echo $miestas;
	?>
</div>
