<?php
// primityviai. reiketu geriau per OOP ir per PDO
	if (isset($_POST['id-of-item-to-be-deleted']) && !empty($_POST['id-of-item-to-be-deleted'])) {
		$connection = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($connection, "inventory");

		$id = $_POST['id-of-item-to-be-deleted'];

		$query = "DELETE FROM items WHERE id='{$id}';";
		$execute = mysqli_query($connection, $query);

		if ($execute) {
			echo "
				<script>alert('Item with ID " . $id . " is deleted');</script>
				<script>window.location.replace('index.php')</script>
			";
		} else {
			echo "<script>alert('Item with ID " . $id . " is NOT deleted');</script>";
		}
	}
