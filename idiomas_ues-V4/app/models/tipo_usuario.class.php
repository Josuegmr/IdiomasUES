<?php
class TipoUsuario extends Validator{
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
	public function getTipoUsuarios(){
		$sql = "SELECT idTipoUsuario, tipoUsuario FROM tipousuarios ORDER BY tipoUsuario";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchTipoUsuarios($value){
		$sql = "SELECT * FROM tipousuarios WHERE tipoUsuario LIKE ? ORDER BY tipoUsuario";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createTipoUsuarios(){
		$sql = "INSERT INTO tipousuarios(tipoUsuario) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readTipoUsuarios(){
		$sql = "SELECT tipoUsuario FROM tipousuarios WHERE idTipoUsuario = ?";
		$params = array($this->id);
		$tipoUsuario = Database::getRow($sql, $params);
		if($tipoUsuario){
			$this->nombre = $tipoUsuario['tipoUsuario'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTipoUsuarios(){
		$sql = "UPDATE tipousuarios SET tipoUsuario = ? WHERE idTipoUsuario = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipoUsuarios(){
		$sql = "DELETE FROM tipousuarios WHERE idTipoUsuario = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>