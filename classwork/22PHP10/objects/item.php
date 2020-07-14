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
	
	// priskirkite jam 2 vnt. properties. pirmas $itemsFrom, antrasis $itemsPerPage
	public function readAllItems($itemsFrom, $itemsPerPage)
	{
		$query = "SELECT
					id, name, description, price, category_id
				FROM
					" . $this->tableName . "
				ORDER BY
					id
				LIMIT
					{$itemsFrom}, {$itemsPerPage};";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		return $stmt;
	}
	
	public function readOneItem()
	{
		$query = "SELECT
					name, description, price, category_id
				FROM
					" . $this->tableName . "
				WHERE
					id = :id
				LIMIT
					0,1;";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $this->id);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->name = $row['name'];
		$this->price = $row['price'];
		$this->description = $row['description'];
		$this->category_id = $row['category_id'];
	}
	
	public function updateItem()
	{
		$query = "UPDATE
					" . $this->tableName ."
				SET
					name = :name,
					description = :description,
					price = :price,
					category_id = :category_id
				WHERE
					id = :id;";
		
		//TODO: validate inputs
		# 2. htmlspecialchars - pabega nuo specialiu simboliu pvz neissaugotu &euro; kaip eur simbolio
		# 1. strip_tags - panaikinam html ir php tagus
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->description = htmlspecialchars(strip_tags($this->description));
		$this->price = htmlspecialchars(strip_tags($this->price));
		$this->category_id = htmlspecialchars(strip_tags($this->category_id));
		
		if (!is_numeric($this->category_id)) {
			$this->category_id = 9999999;
		}
		$this->id = htmlspecialchars(strip_tags($this->id));
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':price', $this->price);
		$stmt->bindParam(':category_id', $this->category_id);
		$stmt->bindParam(':id', $this->id);
		
		// execute
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function countAllItems()
	{
		$query = "SELECT id FROM {$this->tableName};";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		$numberOfItems = $stmt->rowCount();
		
		return $numberOfItems;
	}
}