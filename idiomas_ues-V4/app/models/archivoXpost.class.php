<?php
class AxP extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $URL = null;
	private $post = null;

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
	
	public function setURL($value){
		if($this->validateAlphanumeric($value, 1, 100)){
			$this->URL = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getURL(){
		return $this->URL;
	}

	public function setPost($value){
		if($this->validateId($value)){
			$this->post = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getPost(){
		return $this->post;
	}

	//Metodos para el manejo del CRUD
	public function getArchivoXPosts(){
		$sql = "SELECT idAxP, nombreArchivo, urlArchivo, post FROM archivoxpost INNER JOIN posts USING(idPost) ORDER BY nombreArchivo";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchArchivoXPosts($value){
		$sql = "SELECT  idAxP, nombreArchivo, urlArchivo, post FROM archivoxpost INNER JOIN posts USING(idPost) WHERE nombreArchivo LIKE ? ORDER BY nombreArchivo";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function getPosts(){
		$sql = "SELECT idPost, tituloPost, post, fechaPost, idTipoPost, idTutoria, idEstado FROM posts WHERE idEstado = '1'";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createArchivoXPosts(){
		$sql = "INSERT INTO archivoxpost(nombreArchivo, urlArchivo, idPost) VALUES(?, ?, ?)";
		$params = array($this->nombre, $this->URL, $this->post);
		return Database::executeRow($sql, $params);
	}
	public function readArchivoXPosts(){
		$sql = "SELECT nombreArchivo, urlArchivo, idPost FROM archivoxpost WHERE idAxP = ?";
		$params = array($this->id);
		$axp = Database::getRow($sql, $params);
		if($axp){
			$this->nombre = $axp['nombreArchivo'];
			$this->URL = $axp['urlArchivo'];
			$this->post = $axp['idPost'];
			return true;
		}else{
			return null;
		}
	}
	public function updateArchivoXPosts(){
		$sql = "UPDATE archivoxpost SET nombreArchivo = ?, urlArchivo = ?, idPost = ? WHERE idAxP = ?";
		$params = array($this->nombre, $this->URL, $this->post, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteArchivoXPosts(){
		$sql = "DELETE FROM archivoxpost WHERE idAxP = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>