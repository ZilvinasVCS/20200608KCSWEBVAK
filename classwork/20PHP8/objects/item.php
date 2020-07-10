<?php

class Item {
	// sukurti private properties: $conn, $tableName
	private $conn;
	private $tableName = 'items';
	// sukurti ir public properties: id, name, description, price, category_id, timestamp
	public $id;
	public $name;
	public $description;
	public $price;
	public $category_id;
	public $timestamp;
	//parasyti __construct, kuris leis automatiskai susijungti su duomenu baze kuomet yra inicijuojama klase. P.S. lygiai taip pat kaip ir kategorijos klaseje dareme.
	public function __construct($db)
	{
		$this->conn = $db;
	}

	// sukurti public function createNewItem()
	public function createNewItem()
	{

		// paruosti $query
		$query = "INSERT INTO
					{$this->tableName}
				SET
					name=:name, description=:description, price=:price, category_id=:category_id, created=:created";
		// prepare execute
		$stmt = $this->conn->prepare($query);

		$this->timestamp = date('Y-m-d H:i:s'); // 2020-07-10 19:21:48

		// bindParams
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":description", $this->description);
		$stmt->bindParam(":price", $this->price);
		$stmt->bindParam(":category_id", $this->category_id);
		$stmt->bindParam(":created", $this->timestamp);

		// execute
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}

		// TODO: create if'a, kad jeigu nepavykst irasyti tai ismestu pranesima, kad klaida.
	}

	// labai panasiai kaip klaseje Category
	public function readAllItems()
	{
		$query = "SELECT
					id, name, description, price, category_id
				FROM
					" . $this->tableName . "
				ORDER BY
					name;";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	// viduje funkcijos parasykite $query INSERT INTO lentelesPav SET (su bind'ais).
}
