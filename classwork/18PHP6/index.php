<?php include_once('header.php'); ?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php

			if (isset($_GET['signup'])) {
				if ($_GET['signup'] === 'success') {
					echo "<p style=\"color: green;\">Jūs sėkmingai prisijungėte ;)</p>";
				} elseif ($_GET['signup'] === 'error') {
					echo "<p style=\"color: red;\">Prisijungimo duomenys neteisingi</p>";
				}
			}
		?>
	</div>
</section>
<?php include_once('footer.php'); ?>
