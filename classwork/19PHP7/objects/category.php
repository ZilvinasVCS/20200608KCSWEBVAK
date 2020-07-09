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
}
