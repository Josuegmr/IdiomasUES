<?php
class Aspirante extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $apellido = null;
	private $correo = null;
	private $telefono = null;
	private $foto = null;
	private $DUI = null;
	private $CV = null;
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
    
    public function setApellido($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->apellido = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getApellido(){
		return $this->nombre;
    }
    
	public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCorreo(){
		return $this->correo;
	}

	public function setTelefono($value){
		if($this->validateId($value)){
			$this->telefono = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTelefono(){
		return $this->telefono;
	}
	
	public function setImagen($file){
		if($this->validateImage($file, $this->foto, "../../web/images/fotos/", 1000, 1000)){
			$this->foto = $this->getImageName();
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->foto;
	}
	public function unsetImagen(){
		if(unlink("../../web/images/fotos/".$this->foto)){
			$this->foto = null;
			return true;
		}else{
			return false;
		}
	}

	public function setDUI($value){
		if($this->validateAlphanumeric($value, 1, 10)){
			$this->DUI = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDUI(){
		return $this->DUI;
	}
	
	public function setCV($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->CV = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCV(){
		return $this->CV;
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
	public function getAspirantes(){
		$sql = "SELECT idAspirante, nombreAspirante, apellidoAspirante, correoAspirante, telefonoAspirante, fotoAspirante, duiAspirante, cvEmpleado, idEstado FROM aspirantes ORDER BY apellidoAspirante";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchAspirantes($value){
		$sql = "SELECT idAspirante, nombreAspirante, apellidoAspirante, correoAspirante, telefonoAspirante, fotoAspirante, duiAspirante, cvEmpleado, idEstado FROM aspirantes WHERE nombreAspirante LIKE ? OR apellidoAspirante LIKE ? OR duiAspirante LIKE ? ORDER BY apellidoAspirante";
		$params = array("%$value%", "%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function createAspirantes(){
		$sql = "INSERT INTO aspirantes(nombreAspirante, apellidoAspirante, correoAspirante, telefonoAspirante, fotoAspirante, duiAspirante, cvEmpleado, idEstado) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->foto, $this->DUI, $this->CV, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readAspirantes(){
		$sql = "SELECT nombreAspirante, apellidoAspirante, correoAspirante, telefonoAspirante, fotoAspirante, duiAspirante, cvEmpleado, idEstado FROM aspirantes WHERE idAspirante = ?";
		$params = array($this->id);
		$aspirante = Database::getRow($sql, $params);
		if($aspirante){
			$this->nombre = $aspirante['nombreAspirante'];
			$this->apellido = $aspirante['apellidoAspirante'];
			$this->correo = $aspirante['correoAspirante'];
			$this->telefono = $aspirante['telefonoAspirante'];
			$this->foto = $aspirante['fotoAspirante'];
			$this->DUI = $aspirante['duiAspirante'];
			$this->CV = $aspirante['cvEmpleado'];
			$this->estado = $aspirante['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateAspirantes(){
		$sql = "UPDATE aspirantes SET nombreAspirante = ?, apellidoAspirante = ?, correoAspirante = ?, telefonoAspirante = ?, fotoAspirante = ?, duiAspirante = ?, cvEmpleado = ?, idEstado = ? FROM aspirantes WHERE idAspirante = ?";
		$params = array($this->nombre, $this->apellido, $this->correo, $this->telefono, $this->foto, $this->DUI, $this->CV, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteAspirantes(){
		$sql = "DELETE FROM aspirantes WHERE idAspirante = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>