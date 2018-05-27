<?php
//require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php");
require_once("../../app/helpers/component.class.php");
class Page extends Component{
	public static function templateHeader($title){
		session_start();
		ini_set("date.timezone","America/El_Salvador");
		print("
			<!DOCTYPE html>
			<html lang='es'>
			<head>
				<link rel='shortcut icon' href='../../web/images/logo_ues.png'>

				<meta charset='utf-8'>
				<title>Dashboard - $title</title>

				<!--Import Google Icon Font-->
				<link href='../../web/css/fonts_materialize.css' rel='stylesheet'>
				<!--Import materialize.css-->
				<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css' media='screen,projection' />
				<!--Hexagonos-->
				<link href='../../web/css/hexagon.css' rel='stylesheet'>
				<!--Mis estilos-->
				<link href='../../web/css/personalizado.css' rel='stylesheet'>
				<!--SweetAlert-->
				<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
				<!--Let browser know website is optimized for mobile-->
				<meta name='viewport' content='width=device-width, initial-scale=1.0' />
			</head>
			<body>
		");
		print("
			<header>
				<div class='navbar-fixed navbar2'>
					<nav class='color3'>
						<div class='nav-wrapper'>
							<a href='index.php' class='brand-logo right'><i class='material-icons color1-text'>dashboard</i></a>
							<!-- Logo -->
							<a href='index.php' class='brand-logo flow-text'>
								<img src='../../web/images/ues.png' alt='' class='logito'>
							</a>
						</div>
					</nav>
				</div>
			</header>
			<main class='container'>
				<h3 class='center-align color1-text'>$title</h3>
		");
	}

	public static function templateFooter(){
		print("
				</main>
				<footer class='page-footer color3'>
					<div class='container'>
						<div class='row'>
							<div class='col l6 s12'>
								<h5 class='color1-text'>Visita tambien...</h5>
								<p class=''>
									<a href='http://idiomas.ues.edu.sv' class=' btn black-text color2 waves-effect waves-light'>Departamento de idiomas</a>
								</p>
								<p class=''>
									<a href='http://www.ues.edu.sv/' class=' btn black-text color2 waves-effect waves-light'>Universidad de El Salvador</a>
								</p>
							</div>
							<div class='col l4 offset-l2 s12'>
								<h5 class='color1-text'>Contactanos...</h5>
								<ul class='row'>
									<li class='col s2 m3'>
										<a class='' href='https://www.facebook.com/FacultadDeCienciasYHumanidadesOficial/' title='Facebook'>
											<img class='left' src='../../web/images/face3.png'>
										</a>
									</li>
									<li class='col s2 m3'>
										<a class='' href='https://mail.google.com/mail/u/0/#inbox?compose=162161b432f5073b' title='Gmail'>
											<img class='left' src='../../web/images/gmail3.png'>
										</a>
									</li>
								</ul>
								<ul class='row container'>
									<li class='col s2 m3'>
										<a class='btn black color1-text waves-effect waves-light' href='#!'>Sitio publico</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class='footer-copyright black'>
						<div class='container center'>
							Derechos Reservados © 2018 | Departamento de Idiomas | Universidad de El Salvador
						</div>
					</div>
				</footer>
				<script type='text/javascript' src='../../web/js/jquery_materialize.js'></script>
				<script type='text/javascript' src='../../web/js/materialize.min.js'></script>
				<script type='text/javascript' src='../../web/js/initialize.js'></script>
				<script type='text/javascript' src='../../web/js/hexagon.js'></script>
			</body>
			</html>
		");
	}
}
?>