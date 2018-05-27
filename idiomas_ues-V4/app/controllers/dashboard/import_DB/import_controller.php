<?php
try{
	if(isset($_POST['iniciar'])){
        Page::showMessage(1, "Importando base", "myphp-backup-master/myphp-restore.php");
    }
    if(isset($_POST['backup'])){
        Page::showMessage(1, "Realizando backup", "myphp-backup-master/myphp-backup.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/import_DB/import_view.php");
?>