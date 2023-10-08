<?php
class Persona {

	/*
		id - identificador [int(15),PK,AI, NOT NULL]
		name - [varchar(50),NOT NULL]
		lastname - [varchar(50),NOT NULL]
		address - [varchar(100), NULL]
		phone - [varchar(50),NULL]
		email - [varchar(255),NULL]
		birthday - [timestamp,NULL]
	*/

	private $pdo;
	private $base_root_path;
	private $table_name;
//	private $showSavedMessages;
	
	function __construct() {
    global $db_host, $db_name, $db_user, $db_pwd;
		$this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->table_name = 'people';
//		$this->showSavedMessage = true;
	}

	function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}

	public function save( $name, $lastname, $document_type = 1, $document = '', $address = null, $phone = null, $email = null, $birthday = null) {
		
		try {

				$sql = 'INSERT INTO `'.$this->table_name.'` SET `name` = :name, `lastname` = :lastname, `document_type_id` = :document_type_id, `document_number` = :document_number';
				$sql .= !empty($address)?', `address` = :address':'';
				$sql .= !empty($phone)?', `phone` = :phone':'';
				$sql .= !empty($email)?', `email` = :email':'';
				$sql .= !empty($birthday)?', `birthday` = :birthday':'';
				$sql .= ';';

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':name', $name,PDO::PARAM_STR);
				$stmt->bindValue(':lastname', $lastname,PDO::PARAM_STR);
				$stmt->bindValue(':document_type_id', $document_type,PDO::PARAM_INT);
				$stmt->bindValue(':document_number', $document,PDO::PARAM_STR);
				
				if(!empty($address)){
					$stmt->bindValue(':address', $address,PDO::PARAM_STR);
				}

				if(!empty($phone)){
					$stmt->bindValue(':phone', $phone,PDO::PARAM_STR);
				}

				if(!empty($email)){
					$stmt->bindValue(':email', $email,PDO::PARAM_STR);
				}

				if(!empty($birthday)){
					$stmt->bindValue(':birthday', $birthday.' 00:00:00',PDO::PARAM_STR);
				}

				$stmt->execute();
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

	public function getAll($orderByDesc = true, $limit = 0) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';
		$limitString = $limit==0?'':' LIMIT '.$limit;

		try {
			$sql = " SELECT p.*, d.name as document_type_name FROM {$this->table_name} as p INNER JOIN document_type as d ON p.document_type_id = d.id";
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
			$sql = " SELECT p.*, d.name as document_type_name FROM {$this->table_name} as p INNER JOIN document_type as d ON p.document_type_id = d.id";
      $sql .= ' WHERE p.id = :id';
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

	public function delete($id) {
		try {
			$sql ='DELETE FROM '.$this->table_name.' WHERE `id` = :id';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':id', $id,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to delete record (id): {$id} from {$this->table_name} table. ".$e->getMessage());
		}

		return $result;
	}

  public function update( $id, $name, $lastname, $document_type = 1, $document = '', $address = null, $phone = null, $email = null, $birthday = null) {
		
    try {

			$sql = 'UPDATE `'.$this->table_name.'` SET `name` = :name, `lastname` = :lastname, `document_type_id` = :document_type_id, `document_number` = :document_number';
			$sql .= !empty($address)?', `address` = :address':'';
			$sql .= !empty($phone)?', `phone` = :phone':'';
			$sql .= !empty($email)?', `email` = :email':'';
			$sql .= !empty($birthday)?', `birthday` = :birthday':'';
			$sql .= '  WHERE `id` = :id';

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':name', $name,PDO::PARAM_STR);
			$stmt->bindValue(':lastname', $lastname,PDO::PARAM_STR);
			$stmt->bindValue(':document_type_id', $document_type,PDO::PARAM_INT);
			$stmt->bindValue(':document_number', $document,PDO::PARAM_STR);
			
			if(!empty($address)){
				$stmt->bindValue(':address', $address,PDO::PARAM_STR);
			}

			if(!empty($phone)){
				$stmt->bindValue(':phone', $phone,PDO::PARAM_STR);
			}

			if(!empty($email)){
				$stmt->bindValue(':email', $email,PDO::PARAM_STR);
			}

			if(!empty($birthday)){
				$stmt->bindValue(':birthday', $birthday.' 00:00:00',PDO::PARAM_STR);
			}

      $stmt->bindValue(':id', $id,PDO::PARAM_INT);
			$stmt->execute();
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to update record (id): {$id} on {$this->table_name} table. ".$e->getMessage());
		  }
	}
}