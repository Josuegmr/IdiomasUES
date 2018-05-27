<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Importar base de datos");
require_once("../../app/controllers/dashboard/import_DB/import_controller.php");
Page::templateFooter();
?>