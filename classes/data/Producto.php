<?php
class Producto {

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
	
	private $showSavedMessages;
	
	function __construct() {
    global $db_host, $db_name, $db_user, $db_pwd;
		$this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->table_name = 'producto';
		$this->showSavedMessages = true;
	}

	public function save( $id, $name, $precio, $categoria , $cantidad, $foto, $detalles) {
		
    try {
			$sql = 'INSERT INTO '.$this->table_name. ` SET `;
			$sql .= !empty($id)?'`id` = :id':'';
			$sql .= !empty($name)?', `name` = :name':'';
			$sql .= !empty($precio)?', `precio` = :precio':'';
			$sql .= !empty($categoria)?', `categoria_id` = :categoria':'';
			$sql .= !empty($cantidad)?', `cantidad` = :cantidad':'';
			$sql .= !empty($foto)?', `foto` = :foto':'';
			$sql .= !empty($detalles)?', `detalles` = :detalles':'';
			$sql .= ';';

$sql = "INSERT INTO producto(id, name, precio, categoria_id, cantidad, foto, detalles)";
$sql .= " VALUES('".$id."', '".$name."', '".$precio."', '".$categoria."', '".$cantidad."', '".$foto."', '".$detalles."');";


			error_log($sql);


			$stmt = $this->pdo->prepare($sql);

			/*if(!empty($id)){
			$stmt->bindValue(':id', $id,PDO::PARAM_INT);
			}
			if(!empty($name)){
			$stmt->bindValue(':name', $name,PDO::PARAM_STR);
			}
			if(!empty($precio)){
			$stmt->bindValue(':precio', $precio,PDO::PARAM_INT);
			}
			if(!empty($categoria)){
			$stmt->bindValue(':categoria', $categoria,PDO::PARAM_INT);
			}
			if(!empty($cantidad)){
			$stmt->bindValue(':cantidad', $cantidad,PDO::PARAM_INT);
			}
			if(!empty($foto)){
			$stmt->bindValue(':foto', $foto,PDO::PARAM_STR);
			}
			if(!empty($detalles)){
			$stmt->bindValue(':detalles', $detalles,PDO::PARAM_STR);
			}*/
			error_log("LLEGA HASTA AQUI");
			$stmt->execute();
			error_log($stmt->fullQuery);
		}
		catch(PDOException $e) {
			//throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
			return -1;  
		}
	}

	public function getAll($orderByDesc = true, $limit = 0) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';
		$limitString = $limit==0?'':' LIMIT '.$limit;

		try {
			$sql = " SELECT p.*, c.name as categoria_name FROM {$this->table_name} 
			as p INNER JOIN categoria as c ON p.categoria_id = c.id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
		throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

	public function getFiltro($categoria, $orderByDesc = true, $limit = 0) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';
		$limitString = $limit==0?'':' LIMIT '.$limit;
error_log("holi");
		try {
			$sql = " SELECT p.*, c.name as categoria_name FROM {$this->table_name} 
			as p INNER JOIN categoria as c ON p.categoria_id = c.id WHERE p.categoria_id='".$categoria."'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
		//throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		return -1;
		}

		return $result;
	}

  public function getById($id) {		
		
		$result = array();

		try {
			$sql = " SELECT p.*, c.name as categoria_name FROM {$this->table_name} 
			as p INNER JOIN categoria as c ON p.categoria_id = c.id";
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

  public function update($id, $name, $precio, $categoria, $cantidad, $foto, $detalles) {
		
    try {

			$sql = 'INSERT INTO `'.$this->table_name. ` SET `;
			$sql .= !empty($id)?', `id` = :id':'';
			$sql .= !empty($name)?', `name` = :name':'';
			$sql .= !empty($precio)?', `precio` = :precio':'';
			$sql .= !empty($categoria)?', `categoria` = :categoria':'';
			$sql .= !empty($cantidad)?', `cantidad` = :cantidad':'';
			$sql .= !empty($foto)?', `foto` = :foto':'';
			$sql .= !empty($detalles)?', `detalles` = :detalles':'';
			$sql .= '  WHERE `id` = :id';

			$sql = 'UPDATE '.$this->table_name. " SET id='".$id."', name='".$name."', precio = '".$precio."'";
			$sql .= ", cantidad='".$cantidad."', foto='".$foto."', detalles='".$detalles."' WHERE id='".$id."';";

			$stmt = $this->pdo->prepare($sql);
			/*if(!empty($address)){
			$stmt->bindValue(':id', $id,PDO::PARAM_STR);
			}
			if(!empty($address)){
			$stmt->bindValue(':name', $name,PDO::PARAM_STR);
			}
			if(!empty($address)){
			$stmt->bindValue(':precio', $precio,PDO::PARAM_STR);
			}
			if(!empty($address)){
			$stmt->bindValue(':categoria', $categoria,PDO::PARAM_STR);
			}
			if(!empty($address)){
			$stmt->bindValue(':cantidad', $cantidad,PDO::PARAM_STR);
			}
			if(!empty($address)){
			$stmt->bindValue(':foto', $foto,PDO::PARAM_STR);
			}
			if(!empty($address)){
			$stmt->bindValue(':detalles', $detalles,PDO::PARAM_STR);
			}*/
			$stmt->execute();
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to update record (id): {$id} on {$this->table_name} table. ".$e->getMessage());
		  }
	}
}