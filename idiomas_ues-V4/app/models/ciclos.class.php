<?php
class Ciclo extends Validator{
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
	public function getCiclos(){
		$sql = "SELECT idCiclo, ciclo FROM ciclos ORDER BY ciclo";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchCiclos($value){
		$sql = "SELECT * FROM ciclos WHERE ciclo LIKE ? ORDER BY ciclo";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createCiclos(){
		$sql = "INSERT INTO ciclos(ciclo) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readCiclos(){
		$sql = "SELECT ciclo FROM ciclos WHERE idCiclo = ?";
		$params = array($this->id);
		$ciclo = Database::getRow($sql, $params);
		if($ciclo){
			$this->nombre = $ciclo['ciclo'];
			return true;
		}else{
			return null;
		}
	}
	public function updateCiclos(){
		$sql = "UPDATE ciclos SET ciclo = ? WHERE idCiclo = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteCiclos(){
		$sql = "DELETE FROM ciclos WHERE idCiclo = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>