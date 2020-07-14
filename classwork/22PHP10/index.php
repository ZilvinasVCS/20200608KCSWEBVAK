<?php
	$pageTitle = 'All items';
	include('layout-header.php');

	include_once('config/core.php');
	include_once('config/database.php');
	include_once('objects/category.php');
	include_once('objects/item.php');

	$database = new Database();
	$db = $database->getConnection();

	$category = new Category($db);
	$item = new Item($db);

	$stmt = $item->readAllItems($itemsFromNumber, $itemsPerPage); // reikes patobulinti ir skaitysime irasus tik tuos, kurie reikalingi tame puslapyje
	$numOfRows = $stmt->rowCount();

	$totalItemsRows = $item->countAllItems(); // skaiciuoja visu irasu skaiciu

?>

<div class="go-to-create-item-button">
	<a href="create-item.php" class="btn btn-info pull-right">Add new item to the list</a>
</div>

<?php
	if ($numOfRows > 0) {
		echo "<table class='table'>
				<tr>
					<th>ID</th>
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
					echo "<td class='item-id'>{$id}</td>";
					echo "<td>{$name}</td>";
					echo "<td>{$description} &rarr;</td>";
					echo "<td>{$price}</td>";
					echo "<td>";
						$category->id = $category_id;
						$category->readCategoryName(); // pasirinkti is duomenu bazes lenteles "categories" ta pavadinima, kurio id yra tas ID, kuri turi musu daiktas.
						echo $category->name;
					echo "</td>";
					echo "<td style='width: 500px;'>"; // no no noinline css
						echo "<a href='view-item.php?id={$id}' class='btn btn-primary'>View</a>";
						echo " | ";
						echo "<a href='edit-item.php?id={$id}' class='btn btn-secondary'>Edit</a>";
						echo " | ";
						echo "<a href='delete-item.php?id={$id}' class='btn btn-danger'>Delete</a>";
						echo " | ";
						echo "<a href='#' id='item-id-{$id}' class='btn btn-danger button-delete-item'>Delete with modal</a>";
						// TODO: change all echos to plus varible.
				echo "</tr>";
		}
		echo "</table>";
		include('pagination.php');
	} else {
		echo "<div class='alert alert-info' role='alert'>No items in a list</div>";
	}

	include('layout-footer.php');
?>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do You really want to delete this item?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
		<form action="delete-item-modal.php" method="POST">
			<input hidden id="item-id-in-modal" name="id-of-item-to-be-deleted">
        	<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">NO</button>
        	<button type="submit" class="btn btn-danger" name="delete-yes">YES</button>
		  </form>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function () {
		$('.button-delete-item').on('click', function () {
			$('#modal').modal('show');
			$itemRow = $(this).closest('tr');

			var data = $itemRow.children('td').map(function () {
				return $(this).text();
			});

			console.log(data[0]);

			$('#item-id-in-modal').val(data[0]);
		})
	});
</script>
