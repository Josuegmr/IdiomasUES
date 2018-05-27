<?php
class Asignatura extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $ciclo = null;
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
	
	public function setCiclo($value){
		if($this->validateId($value)){
			$this->ciclo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCiclo(){
		return $this->ciclo;
	}

	//Metodos para el manejo del CRUD
	public function getAsignaturas(){
		$sql = "SELECT idAsignatura, asignatura, ciclo, idEstado FROM asignaturas INNER JOIN ciclos USING(idCiclo) ORDER BY asignatura";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchAsignaturas($value){
		$sql = "SELECT idAsignatura, asignatura, ciclo, idEstado FROM asignaturas INNER JOIN ciclos USING(idCiclo) WHERE asignatura LIKE ? OR ciclo LIKE ? ORDER BY asignatura";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getCiclos(){
		$sql = "SELECT idCiclo, ciclo FROM ciclos";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createAsignaturas(){
		$sql = "INSERT INTO asignaturas(asignatura, idCiclo, idEstado) VALUES(?, ?, ?)";
		$params = array($this->nombre, $this->ciclo, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readAsignaturas(){
		$sql = "SELECT asignatura, idCiclo, idEstado FROM asignaturas WHERE idAsignatura = ?";
		$params = array($this->id);
		$asignatura = Database::getRow($sql, $params);
		if($asignatura){
			$this->nombre = $asignatura['asignatura'];
			$this->estado = $asignatura['idCiclo'];
			$this->ciclo = $asignatura['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateAsignaturas(){
		$sql = "UPDATE asignaturas SET asignatura = ?, idCiclo = ?, idEstado = ? WHERE idAsignatura = ?";
		$params = array($this->nombre, $this->ciclo, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteAsignaturas(){
		$sql = "DELETE FROM asignaturas WHERE idAsignatura = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>