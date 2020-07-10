<?php
	$pageTitle = 'Create new item';
	include_once('layout-header.php');

	include_once('config/database.php');
	include_once('objects/category.php');
	include_once('objects/item.php');

	$database = new Database();
	$db = $database->getConnection();

	$category = new Category($db);
	$item = new Item($db);

	if (isset($_GET['error']) && $_GET['error'] == 'categorynotselected') {
		echo "<div class='alert alert-danger' role='alert'>Please select a category</div>";
	}

	if ($_POST) {

		// jeigu zmogus nepasirinko kategorija tuomet grazinti i formos pildyma ir pranesti, kad reikia pasirinkti kategorija
		if ($_POST['category_id'] !== '0') {

			$item->name = $_POST['name'];
			$item->description = $_POST['description'];
			$item->price = $_POST['price'];
			$item->category_id = $_POST['category_id'];

			if ($item->createNewItem()) {
				echo "<div class='alert alert-success' role='alert'>New item is successfully added.</div>";
			} else {
				echo "<div class='alert alert-danger' role='alert'>Something's wrong adding new item.</div>";
			}
		} else {
			header('Location: create-item.php?error=categorynotselected');
		}
	}


	// kviesime metoda kuris sukuria irasa duomenu bazeje lenteleje items.
?>
<div class="back-to-main-button">
	<a href="index.php" class="btn btn-primary pull-right">Back to the items list</a>
</div>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	<table class="table table-hover table-responsive table-bordered">
		<tr>
			<td>Name</td>
			<td><input name="name" class="form-control"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input name="description" class="form-control"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input name="price" class="form-control"></td>
		</tr>
		<tr>
			<td>Category</td>
			<td>
				<?php
					$stmt = $category->readAllCategories();
					echo "<select class='form-control' name='category_id'>";
						echo "<option value='0'>--Choose category--</option>";
						while ($rowCategory = $stmt->fetch(PDO::FETCH_ASSOC)) {
							extract($rowCategory);
							// sios eilutes/iraso stulpelis name turi reiksme APSVIETIMAS
							// po extract stulpelis name tampa kintamuoju $name, kurio reiksme yra BALDAI
							echo "<option value='{$id}'>{$name}</option>";
						}
					echo "</select>";
				?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit">Add new item</button></td>
		</tr>
	</table>
</form>

<?php
	include('layout-footer.php');
?>
