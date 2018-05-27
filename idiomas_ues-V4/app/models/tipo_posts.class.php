<?php
class TipoPost extends Validator{
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
	public function getTipoPosts(){
		$sql = "SELECT idTipoPost, tipoPost FROM tipoposts ORDER BY tipoPost";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchTipoPosts($value){
		$sql = "SELECT * FROM tipoposts WHERE tipoPost LIKE ? ORDER BY tipoPost";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createTipoPosts(){
		$sql = "INSERT INTO tipoposts(tipoPost) VALUES(?)";
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}
	public function readTipoPosts(){
		$sql = "SELECT tipoPost FROM tipoposts WHERE idTipoPost = ?";
		$params = array($this->id);
		$tipoPost = Database::getRow($sql, $params);
		if($tipoPost){
			$this->nombre = $tipoPost['tipoPost'];
			return true;
		}else{
			return null;
		}
	}
	public function updateTipoPosts(){
		$sql = "UPDATE tipoposts SET tipoPost = ? WHERE idTipoPost = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipoPosts(){
		$sql = "DELETE FROM tipoposts WHERE idTipoPost = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>