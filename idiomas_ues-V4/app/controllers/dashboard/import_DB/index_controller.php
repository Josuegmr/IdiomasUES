<?php
try{
	if(isset($_POST['iniciar'])){
		if($_POST['alias']=='josuegmr'){
			if($_POST['clave']=='123456'){
				Page::showMessage(1, "Autenticación correcta", "import.php");
			}else{
				throw new Exception("Clave incorrecta");
			}
		}else{
			throw new Exception("Alias incorrecto");
		}
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/import_DB/index_view.php");
?>