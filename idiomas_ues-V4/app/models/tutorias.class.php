<?php
class Tutoria extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $diaTutoria = null;
	private $fechaInicio = null;
	private $horaInicio = null;
	private $horaFin = null;
	private $clave = null;
	//Relaciones
	private $asignatura = null;
	private $sede = null;
	private $tipoTutoria = null;
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
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre;
    }
	
	public function setDiaTutoria($value){
		if($this->validateAlphanumeric($value, 1, 10)){
			$this->diaTutoria = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDiaTutoria(){
		return $this->diaTutoria;
    }
    
    public function setFechaInicio($value){
		if($this->validateAlphanumeric($value, 1, 25)){
			$this->fechaInicio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFechaInicio(){
		return $this->fechaInicio;
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
    
    public function setClave($value){
		if($this->validatePassword($value)){
			$this->clave = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getClave(){
		return $this->clave;
    }

	public function setAsignatura($value){
		if($this->validateId($value)){
			$this->asignatura = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getAsignatura(){
		return $this->asignatura;
	}

	public function setSede($value){
		if($this->validateId($value)){
			$this->sede = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getSede(){
		return $this->sede;
	}

	public function setTipoTutoria($value){
		if($this->validateId($value)){
			$this->tipoTutoria = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTipoTutoria(){
		return $this->tipoTutoria;
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
	public function getTutorias(){
		$sql = "SELECT idTutoria, nombreTutoria, diaTutoria, fechaInicioTutoria, horaInicioTutoria, HoraFinTutoria, contraTutoria, asignatura, sede, tipoTutoria, idEstado FROM tutorias INNER JOIN asignaturas USING(idAsignatura) INNER JOIN sedes USING(idSede) INNER JOIN tipoTutorias USING(idTipoTutoria) ORDER BY nombreTutoria";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchTutorias($value){
		$sql = "SELECT idTutoria, nombreTutoria, diaTutoria, fechaInicioTutoria, horaInicioTutoria, HoraFinTutoria, contraTutoria, asignatura, sede, tipoTutoria, idEstado FROM tutorias INNER JOIN asignaturas USING(idAsignatura) INNER JOIN sedes USING(idSede) INNER JOIN tipoTutorias USING(idTipoTutoria) WHERE diaTutoria LIKE ? OR nombreTutoria LIKE ? ORDER BY nombreTutoria";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getTipoTutorias(){
		$sql = "SELECT idTipoTutorias, tipoTutorias FROM tipotutorias";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getAsignaturas(){
		$sql = "SELECT idAsignatura, asignatura, idCiclo, idEstado FROM asignaturas WHERE idEstado = '1'";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getSedes(){
		$sql = "SELECT idSedes, sede, idEstado FROM sedes WHERE idEstado = '1'";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createTutorias(){
		$sql = "INSERT INTO tutorias(nombreTutoria, diaTutoria, fechaInicioTutoria, horaInicioTutoria, HoraFinTutoria, contraTutoria, idAsignatura, idSede, idTipoTutoria, idEstado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->diaTutoria, $this->fechaInicio, $this->horaInicio, $this->horaFin, $this->clave, $this->asignatura, $this->sede, $this->tipoTutoria, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readTutorias(){
		$sql = "SELECT nombreTutoria, diaTutoria, fechaInicioTutoria, horaInicioTutoria, HoraFinTutoria, contraTutoria, idAsignatura, idSede, idTipoTutoria, idEstado FROM tutorias WHERE idTutoria = ?";
		$params = array($this->id);
		$tutoria = Database::getRow($sql, $params);
		if($tutoria){
			$this->nombre = $tutoria['nombreTutoria'];
			$this->diaTutoria = $tutoria['diaTutoria'];
			$this->fechaInicio = $tutoria['fechaInicioTutoria'];
			$this->horaInicio = $tutoria['horaInicioTutoria'];
			$this->horaFin = $tutoria['HoraFinTutoria'];
			$this->clave = $tutoria['contraTutoria'];
			$this->asignatura = $tutoria['idAsignatura'];
			$this->sede = $tutoria['idSede'];
			$this->tipoTutoria = $tutoria['idTipoTutoria'];
			$this->estado = $tutoria['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTutorias(){
		$sql = "UPDATE tutorias SET nombreTutoria = ?, diaTutoria = ?, fechaInicioTutoria = ?, horaInicioTutoria = ?, HoraFinTutoria = ?, contraTutoria = ?, idAsignatura = ?, idSede = ?, idTipoTutoria = ?, idEstado = ? FROM tutorias WHERE idTutoria = ?";
		$params = array($this->nombre, $this->diaTutoria, $this->fechaInicio, $this->horaInicio, $this->horaFin, $this->clave, $this->asignatura, $this->sede, $this->tipoTutoria, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTutorias(){
		$sql = "DELETE FROM tutorias WHERE idTutoria = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>