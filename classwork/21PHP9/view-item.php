<?php
	$pageTitle = 'View item';
	include_once('layout-header.php');

	include_once('config/database.php');
	include_once('objects/category.php');
	include_once('objects/item.php');

	$database = new Database();
	$db = $database->getConnection();

	$category = new Category($db);
	$item = new Item($db);

	$itemId = (isset($_GET['id'])) ? $_GET['id'] : die('item ID is needed');

	$item->id = $itemId; // per GET gausim ID

	$item->readOneItem();

	// EXTRA: pakeiskite metoda readOneItem(). Padarykite, kad metodas naudotu parametra $id. Paduokite parametra kvieciant metoda. (kitaip tariant bindParam ne $this->id naudosit o metodo gautaji parametra) ;)~

	// EXTRA2: pakeiskite metoda readOneItem(). padarykite, kad jis irasytu is dombazes lenteles "items' gautas reiksmes ne i public properties o i associatyvini masyva. Metodas darys return $itemInfo. masyvo reiskmes gaudykite view-item.php faile.
?>
<div class="back-to-main-button">
	<a href="index.php" class="btn btn-primary pull-right">Back to the items list</a>
</div>

<table class="table table-hover table-responsive table-bordered">
	<tr>
		<td>Name</td>
		<td><?php echo $item->name; ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo $item->description; ?></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><?php echo $item->price; ?></td>
	</tr>
	<tr>
		<td>Category</td>
		<td>
			<?php
				$category->id = $item->category_id;
				$category->readCategoryName();
				echo $category->name;
			?>
		</td>
	</tr>
</table>

<?php
	include('layout-footer.php');
?>
