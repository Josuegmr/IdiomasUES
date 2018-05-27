<?php
class Evaluacion extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $fecha = null;
	private $horaInicio = null;
	private $horaFin = null;
	//Relaciones
	private $tipoEvaluacion = null;
	private $tutoria = null;
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
    
	public function setFecha($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->fecha = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFecha(){
		return $this->fecha;
    }
    
	public function setHoraInicio($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->horaInicio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getHoraInicio(){
		return $this->horaInicio;
    }
    
	public function setHoraFin($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->horaFin = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getHoraFin(){
		return $this->horaFin;
    }

	public function setTipoEvaluacion($value){
		if($this->validateId($value)){
			$this->tipoEvaluacion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTipoEvaluacion(){
		return $this->tipoEvaluacion;
	}

	public function setTutoria($value){
		if($this->validateId($value)){
			$this->tutoria = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTutoria(){
		return $this->tutoria;
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
	public function getEvaluaciones(){
		$sql = "SELECT idEvaluacion, nombreEvaluacion, fechaEvaluacion, horaInicioEvaluacion, horaFinEvaluacion, tipoEvaluacion, tutoria, idEstado FROM evaluaciones INNER JOIN tipoevaluaciones USING(idTipoEvaluacion) INNER JOIN tutorias USING(idTutoria) ORDER BY nombreEvaluacion";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchEvaluaciones($value){
		$sql = "SELECT idEvaluacion, nombreEvaluacion, fechaEvaluacion, horaInicioEvaluacion, horaFinEvaluacion, tipoEvaluacion, tutoria, idEstado FROM evaluaciones INNER JOIN tipoevaluaciones USING(idTipoEvaluacion) INNER JOIN tutorias USING(idTutoria) WHERE nombreEvaluacion LIKE ? OR tutoria LIKE ? ORDER BY nombreEvaluacion";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getTipoEvaluaciones(){
		$sql = "SELECT idTipoEvaluacion, tipoEvaluacion FROM tipoevaluaciones";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getTutorias(){
		$sql = "SELECT SELECT idTutoria, nombreTutoria, diaTutoria, fechaInicioTutoria, horaInicioTutoria, HoraFinTutoria, contraTutoria, idAsignatura, idSede, idTipoTutoria, idEstado FROM tutorias  WHERE idEstado = '1'";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createEvaluaciones(){
		$sql = "INSERT INTO evaluaciones(nombreEvaluacion, fechaEvaluacion, horaInicioEvaluacion, horaFinEvaluacion, idTipoEvaluacion, idTutoria, idEstado) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->fecha, $this->horaInicio, $this->horaFin, $this->tipoEvaluacion, $this->tutoria, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readEvaluaciones(){
		$sql = "SELECT nombreEvaluacion, fechaEvaluacion, horaInicioEvaluacion, horaFinEvaluacion, idTipoEvaluacion, idTutoria, idEstado FROM evaluaciones WHERE idEvaluacion = ?";
		$params = array($this->id);
		$evaluacion = Database::getRow($sql, $params);
		if($evaluacion){
			$this->nombre = $evaluacion['nombreEvaluacion'];
			$this->fecha = $evaluacion['fechaEvaluacion'];
			$this->horaInicio = $evaluacion['horaInicioEvaluacion'];
			$this->horaFin = $evaluacion['horaFinEvaluacion'];
			$this->tipoEvaluacion = $evaluacion['idTipoEvaluacion'];
			$this->tutoria = $evaluacion['idTutoria'];
			$this->estado = $evaluacion['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateEvaluaciones(){
		$sql = "UPDATE evaluaciones SET nombreEvaluacion = ?, fechaEvaluacion = ?, horaInicioEvaluacion = ?, horaFinEvaluacion = ?, idTipoEvaluacion = ?, idTutoria = ?, idEstado = ? FROM evaluaciones WHERE idEvaluacion = ?";
		$params = array($this->nombre, $this->fecha, $this->horaInicio, $this->horaFin, $this->tipoEvaluacion, $this->tutoria, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteEvaluaciones(){
		$sql = "DELETE FROM evaluaciones WHERE idEvaluacion = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>