<?php
	$pageTitle = 'Edit item';
	include_once('layout-header.php');

	include_once('config/database.php');
	include_once('objects/category.php');
	include_once('objects/item.php');

	$database = new Database();
	$db = $database->getConnection();

	$category = new Category($db);
	$item = new Item($db);

	if ($_POST) {

		if ($_POST['category_id'] !== '0') {

			$item->id = $_GET['id'];
			$item->name = $_POST['name'];
			$item->description = $_POST['description'];
			$item->price = $_POST['price'];
			$item->category_id = $_POST['category_id'];

			// TODO: patikrinti ar formoje kas nors pasikeite.
			if ($item->updateItem()) {
				echo "<div class='alert alert-success' role='alert'>Item is changed.</div>";
			} else {
				echo "<div class='alert alert-danger' role='alert'>Item is NOT changed.</div>";
			}
		} else {
			header('Location: create-item.php?error=categorynotselected');
		}
	} else {
		$itemId = (isset($_GET['id'])) ? $_GET['id'] : die('item ID is needed');
		$item->id = $itemId;
		$item->readOneItem();
	}
?>
<div class="back-to-main-button">
	<a href="index.php" class="btn btn-primary pull-right">Back to the items list</a>
</div>

<form action="<?php echo $_SERVER["PHP_SELF"] . "?id={$item->id}" ; ?>" method="post">
	<table class="table table-hover table-responsive table-bordered">
		<tr>
			<td>Name</td>
			<td><input name="name" class="form-control" value="<?php echo $item->name; ?>"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input name="description" class="form-control" value="<?php echo $item->description; ?>"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input name="price" class="form-control" value="<?php echo $item->price; ?>"></td>
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
							if ($item->category_id == $id) {
								echo "<option value='{$id}' selected>{$name}</option>";
							} else {
								echo "<option value='{$id}'>{$name}</option>";
							}
						}
					echo "</select>";
				?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit">Edit this item</button></td>
		</tr>
	</table>
</form>

<?php
	include('layout-footer.php');
?>
