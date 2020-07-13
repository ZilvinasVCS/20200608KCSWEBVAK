<?php

class Category {
	private $conn;
	private $tableName = 'categories';

	public $id;
	public $name;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function readAllCategories()
	{
		$query = "SELECT
					id, name
				FROM
					" . $this->tableName . "
				ORDER BY
					name;";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	public function readCategoryName()
	{
		// $query. pasirinksim ta kategorijos pavadinima, kurio ID sutampa su ID is prekes duomenu.
		$query = "SELECT name FROM {$this->tableName} WHERE id=? LIMIT 0,1";

		// paruosime $query vykdymui
		$stmt = $this->conn->prepare($query);

		// bindParametru. si karta bindas bus pagal indekso eiliskuma
		$stmt->bindParam(1, $this->id);

		// vykdome uzklausa
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->name = $row['name'];
	}
}
