<?php
class TipoEvaluacion extends Validator{
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

	//Metodos para el manejo del CRUD
	public function getTipoEvaluaciones(){
		$sql = "SELECT idTipoEvaluacion, tipoEvaluacion FROM tipoevaluaciones ORDER BY tipoEvaluacion";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchTipoEvaluaciones($value){
		$sql = "SELECT * FROM tipoevaluaciones WHERE tipoEvaluacion LIKE ? ORDER BY tipoEvaluacion";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createTipoEvaluaciones(){
		$sql = "INSERT INTO tipoevaluaciones(tipoEvaluacion) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readTipoEvaluaciones(){
		$sql = "SELECT tipoEvaluacion FROM tipoevaluaciones WHERE idTipoEvaluacion = ?";
		$params = array($this->id);
		$tipoEvaluacion = Database::getRow($sql, $params);
		if($tipoEvaluacion){
			$this->nombre = $tipoEvaluacion['tipoEvaluacion'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTipoEvaluaciones(){
		$sql = "UPDATE tipoevaluaciones SET tipoEvaluacion = ? WHERE idTipoEvaluacion = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipoEvaluaciones(){
		$sql = "DELETE FROM tipoevaluaciones WHERE idTipoEvaluacion = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>