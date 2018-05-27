<?php
class Post extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $descripcion = null;
	private $fecha = null;
	//Relaciones
	private $tipoPost = null;
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
	
	public function setDescipcion($value){
		if($this->validateAlphanumeric($value, 1, 300)){
			$this->descripcion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDescipcion(){
		return $this->descripcion;
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

	public function setTipoPost($value){
		if($this->validateId($value)){
			$this->tipoPost = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTipoPost(){
		return $this->tipoPost;
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
	public function getPosts(){
		$sql = "SELECT idPost, tituloPost, post, fechaPost, tipoPost, tutoria, idEstado FROM posts INNER JOIN tipoposts USING(idTipoPost) INNER JOIN tutorias USING(idTutoria) ORDER BY tituloPost";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchPosts($value){
		$sql = "SELECT idPost, tituloPost, post, fechaPost, tipoPost, tutoria, idEstado FROM posts INNER JOIN tipoposts USING(idTipoPost) INNER JOIN tutorias USING(idTutoria) WHERE tituloPost LIKE ? OR tutoria LIKE ? ORDER BY tituloPost";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getTipoPosts(){
		$sql = "SELECT idTipoPost, tipoPost FROM tipoposts";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getTutorias(){
		$sql = "SELECT SELECT idTutoria, nombreTutoria, diaTutoria, fechaInicioTutoria, horaInicioTutoria, HoraFinTutoria, contraTutoria, idAsignatura, idSede, idTipoTutoria, idEstado FROM tutorias WHERE idEstado = '1'";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createPosts(){
		$sql = "INSERT INTO posts(tituloPost, post, fechaPost, idTipoPost, idTutoria, idEstado) VALUES(?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->descripcion, $this->fecha, $this->tipoPost, $this->tutoria, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readPosts(){
		$sql = "SELECT tituloPost, post, fechaPost, idTipoPost, idTutoria, idEstado FROM posts WHERE idPost = ?";
		$params = array($this->id);
		$post = Database::getRow($sql, $params);
		if($post){
			$this->nombre = $post['tituloPost'];
			$this->descripcion = $post['post'];
			$this->fecha = $post['fechaPost'];
			$this->tipoPost = $post['idTipoPost'];
			$this->tutoria = $post['idTutoria'];
			$this->estado = $post['idEstado'];
			return true;
		}else{
			return null;
		}
	}
	public function updatePosts(){
		$sql = "UPDATE posts SET tituloPost = ?, post = ?, fechaPost = ?, idTipoPost = ?, idTutoria = ?, idEstado = ? FROM posts WHERE idPost = ?";
		$params = array($this->nombre, $this->descripcion, $this->fecha, $this->tipoPost, $this->tutoria, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deletePosts(){
		$sql = "DELETE FROM posts WHERE idPost = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>