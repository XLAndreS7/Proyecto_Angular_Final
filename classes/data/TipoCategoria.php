<?php
class TipoCategoria {

	/*
		id - identificador [int(15),PK,AI, NOT NULL]
		name - [varchar(50),NOT NULL]
		description - [varchar(50),NOT NULL]
	*/

	private $pdo;
	private $base_root_path;
	private $table_name;
	private $showSavedMessages;
	
	function __construct() {
    global $db_host, $db_name, $db_user, $db_pwd;
		$this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->table_name = 'categoria';
		$this->showSavedMessages = true;
	}

	function __destruct() {
		$this->pdo = null;
	}

	public function getAll($orderByDesc = true, $limit = 0) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';
		$limitString = $limit==0?'':' LIMIT '.$limit;

		try {
			$sql = " SELECT * FROM {$this->table_name}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

  public function getById($id) {		
		
		$result = array();

		try {
			$sql = " SELECT * FROM {$this->table_name} ";
      $sql .= ' WHERE `id` = :id';
			$stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}
}