<?php
	$pageTitle = 'Create new item';
	include_once('layout-header.php');

	include_once('config/database.php');
	include_once('objects/category.php');

	$database = new Database();
	$db = $database->getConnection();

	$category = new Category($db);
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
						echo "<option>--Pasirinkite kategoriją--</option>";
						while ($rowCategory = $stmt->fetch(PDO::FETCH_ASSOC)) {
							extract($rowCategory);
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
