<?php
class Sede extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $estado = null;

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
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function setEstado($value){
		if($value == "1" || $value == "0"){
			$this->estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getEstado(){
		return $this->estado;
	}

	//Metodos para el manejo del CRUD
	public function getSedes(){
		$sql = "SELECT idSede, sede, idEstado FROM sedes ORDER BY sede";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchSedes($value){
		$sql = "SELECT * FROM sedes WHERE sede LIKE ? ORDER BY sede";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createSedes(){
		$sql = "INSERT INTO sedes(sede, idEstado) VALUES(?,?)";
		$params = array($this->nombre,$this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readSedes(){
		$sql = "SELECT sede, idEstado FROM sedes WHERE idSede = ?";
		$params = array($this->id);
		$sede = Database::getRow($sql, $params);
		if($sede){
			$this->nombre = $sede['sede'];
			$this->estado = $sede['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateSedes(){
		$sql = "UPDATE sedes SET sede = ?, idEstado = ? WHERE idSede = ?";
		$params = array($this->nombre, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteSedes(){
		$sql = "DELETE FROM sedes WHERE idSede = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>