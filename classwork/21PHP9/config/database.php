<?php

class Database {
	private $dbHost = 'localhost';
	private $dbTableName = 'inventory';
	private $dbUserName = 'root';
	private $dbPassword = '';
	public $conn;

	public function getConnection()
	{
		$this->conn = null;
		try {
			$this->conn = new PDO("mysql:host=" . $this->dbHost . "; dbname=" . $this->dbTableName, $this->dbUserName, $this->dbPassword);
		} catch(PDOExeption $exeption) {
			echo "Connection problems/errors: " . $exeption->getMessage();
		}
		return $this->conn;
	}

}

