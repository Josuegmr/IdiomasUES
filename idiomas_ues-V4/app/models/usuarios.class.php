<?php
class Usuario extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $apellido = null;
	private $clave = null;
	private $correo = null;
	private $telefono = null;
	private $foto = null;
	private $DUI = null;
	private $CV = null;
    private $DUE = null;
    //Relaciones
	private $tipoUsuario = null;
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

	public function setDUE($value){
		if($this->validateAlphanumeric($value, 1, 7)){
			$this->DUE = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDUE(){
		return $this->DUE;
	}

	public function setTipoUsuario($value){
		if($this->validateId($value)){
			$this->tipoUsuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTipoUsuario(){
		return $this->tipoUsuario;
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
	public function getUsuarios(){
		$sql = "SELECT idUsuario, nombreUsuario, apellidoUsuario, contraUsuario, correoUsuario, telefonoUsuario, fotoUsuario, duiUsuario, cvEmpleado, dueEstudiante, tipoUsuario, idEstado FROM usuarios INNER JOIN tipousuarios USING(idTipoUsuario) ORDER BY apellidoUsuario";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchUsuarios($value){
		$sql = "SELECT idUsuario, nombreUsuario, apellidoUsuario, contraUsuario, correoUsuario, telefonoUsuario, fotoUsuario, duiUsuario, cvEmpleado, dueEstudiante, tipoUsuario, idEstado FROM usuarios INNER JOIN tipousuarios USING(idTipoUsuario) WHERE nombreUsuario LIKE ? OR apellidoUsuario LIKE ? OR duiUsuario LIKE ? OR dueUsuario LIKE ? ORDER BY apellidoUsuario";
		$params = array("%$value%", "%$value%", "%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
    public function getTipoUsuarios(){
		$sql = "SELECT idTipoUsuario, tipoUsuario FROM tipousuarios";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createUsuarios(){
		$sql = "INSERT INTO usuarios(nombreUsuario, apellidoUsuario, contraUsuario, correoUsuario, telefonoUsuario, fotoUsuario, duiUsuario, cvEmpleado, dueEstudiante, idTipoUsuario, idEstado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->apellido, $this->clave, $this->correo, $this->telefono, $this->foto, $this->DUI, $this->CV, $this->DUE, $this->tipoUsuario, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readUsuarios(){
		$sql = "SELECT nombreUsuario, apellidoUsuario, contraUsuario, correoUsuario, telefonoUsuario, fotoUsuario, duiUsuario, cvEmpleado, dueEstudiante, idTipoUsuario, idEstado FROM usuarios WHERE idUsuario = ?";
		$params = array($this->id);
		$usuario = Database::getRow($sql, $params);
		if($usuario){
			$this->nombre = $usuario['nombreUsuario'];
			$this->apellido = $usuario['apellidoUsuario'];
			$this->clave = $usuario['contraUsuario'];
			$this->correo = $usuario['correoUsuario'];
			$this->telefono = $usuario['telefonoUsuario'];
			$this->foto = $usuario['fotoUsuario'];
			$this->DUI = $usuario['duiUsuario'];
			$this->CV = $usuario['cvEmpleado'];
			$this->DUE = $usuario['dueEstudiante'];
			$this->tipoUsuario = $usuario['idTipoUsuario'];
			$this->estado = $usuario['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateUsuarios(){
		$sql = "UPDATE usuarios SET nombreUsuario = ?, apellidoUsuario = ?, contraUsuario = ?, correoUsuario = ?, telefonoUsuario = ?, fotoUsuario = ?, duiUsuario = ?, cvEmpleado = ?, dueEstudiante = ?, idTipoUsuario = ?, idEstado = ? FROM usuarios WHERE idUsuario = ?";
		$params = array($this->nombre, $this->apellido, $this->clave, $this->correo, $this->telefono, $this->foto, $this->DUI, $this->CV, $this->DUE, $this->tipoUsuario, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteUsuarios(){
		$sql = "DELETE FROM usuarios WHERE idUsuario = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>