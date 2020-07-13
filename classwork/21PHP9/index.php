<?php
	$pageTitle = 'All items';
	include('layout-header.php');

	include_once('config/database.php');
	include_once('objects/category.php');
	include_once('objects/item.php');

	$database = new Database();
	$db = $database->getConnection();

	$category = new Category($db);
	$item = new Item($db);

	$stmt = $item->readAllItems();
	$numOfRows = $stmt->rowCount();

?>

<div class="go-to-create-item-button">
	<a href="create-item.php" class="btn btn-info pull-right">Add new item to the list</a>
</div>

<?php
	if ($numOfRows > 0) {
		// ciklu while mes visus irasus 'ismesim' cia
		/*
			jums reikia sukurti <table>
			ir reikia pirmaji <tr> sukurti kuris talpins <th>: name, price, descr, Cateogry, Actions
			antroji eilute ir visos kitos tai su while ciklu atvaizduojama daiktu informacija is duomenubazes
		*/
		echo "<table class='table'>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Category</th>
					<th>Actions</th>
				</tr>";
		while ($rowItem = $stmt->fetch(PDO::FETCH_ASSOC)) {
				extract($rowItem);
				$description = substr($description, 0, 80);
				echo "<tr>";
					echo "<td>{$name}</td>";
					echo "<td>{$description} &rarr;</td>";
					echo "<td>{$price}</td>";
					echo "<td>";
						$category->id = $category_id;
						$category->readCategoryName(); // pasirinkti is duomenu bazes lenteles "categories" ta pavadinima, kurio id yra tas ID, kuri turi musu daiktas.
						echo $category->name;
					echo "</td>";
					echo "<td>";
						echo "<a href='view-item.php?id={$id}' class='btn btn-primary'>View</a>";
						echo " | ";
						echo "<a href='edit-item.php?id={$id}' class='btn btn-secondary'>Edit</a>";
						echo " | Delete</td>";
						// TODO: change all echos to plus varible.
				echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<div class='alert alert-info' role='alert'>No items in a list</div>";
	}

	include('layout-footer.php');
?>
