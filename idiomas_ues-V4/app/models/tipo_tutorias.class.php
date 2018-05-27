<?php
class TipoTutoria extends Validator{
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
	public function getTipoTutorias(){
		$sql = "SELECT idTipoTutoria, tipoTutoria FROM tipoTutorias ORDER BY tipoTutoria";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchTipoTutorias($value){
		$sql = "SELECT * FROM tipoTutorias WHERE tipoTutoria LIKE ? ORDER BY tipoTutoria";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createTipoTutorias(){
		$sql = "INSERT INTO tipoTutorias(tipoTutoria) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readTipoTutorias(){
		$sql = "SELECT tipoTutoria FROM tipoTutorias WHERE idTipoTutoria = ?";
		$params = array($this->id);
		$tipoTutoria = Database::getRow($sql, $params);
		if($tipoTutoria){
			$this->nombre = $tipoTutoria['tipoTutoria'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTipoTutorias(){
		$sql = "UPDATE tipoTutorias SET tipoTutoria = ? WHERE idTipoTutoria = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipoTutorias(){
		$sql = "DELETE FROM tipoTutorias WHERE idTipoTutoria = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>