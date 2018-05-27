<?php
class Estado extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;

	//Métodos para sobrecarga de propiedades
	public function setId($value){
		if($this->validateId($value)){
			$this->id = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId(){
		return $this->id;
	}
	
	public function setNombre($value){
		if($this->validateAlphanumeric($value, 1, 10)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre;
	}

	//Metodos para el manejo del CRUD
	public function getEstados(){
		$sql = "SELECT idEstado, estado FROM estados ORDER BY estado";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchEstados($value){
		$sql = "SELECT * FROM estados WHERE estado LIKE ? ORDER BY estado";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createEstados(){
		$sql = "INSERT INTO estados(estado) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readEstados(){
		$sql = "SELECT estado FROM estados WHERE idEstado = ?";
		$params = array($this->id);
		$estado = Database::getRow($sql, $params);
		if($estado){
			$this->nombre = $estado['estado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateEstados(){
		$sql = "UPDATE estados SET estado = ? WHERE idEstado = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteEstados(){
		$sql = "DELETE FROM estados WHERE idEstado = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>