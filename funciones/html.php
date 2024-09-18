<?php
function abrirHtml($title, $description)
{
	echo '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>' . $title . '</title>
			<meta name="description" content="' . $description . '">

			<link href="assets/css/estilos.css" rel="stylesheet">

			<!-- Bootstrap -->
			<link href="assets/libs/bootstrap-3/css/bootstrap.min.css" rel="stylesheet">

			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
			

  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

		</head>
		<body>
	';
}

function cabecera()
{
	echo '
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">EVENTOS CAME</a>
				</div>

					<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Inicio</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Comentarios</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="cargaComentarios.php">Cargar comentarios</a></br>
      <a class="dropdown-item" href="listaComentarios.php">Ver comentarios</a></br>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="verComentarios.php" target="_blank">Comentarios en pantalla</a>

    </div>
  </li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Preguntas</a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="cargaPreguntas.php">Cargar preguntas</a></br>
			<a class="dropdown-item" href="listaPreguntas.php">Ver preguntas</a></br>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="verPreguntas.php" target="_blank">Preguntas en pantalla</a>

		</div>
	</li>

	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sorteos</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="cargaParticipantes.php">Cargar participantes</a></br>
      <a class="dropdown-item" href="listaParticipantes.php">Ver participantes</a></br>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="sortearParticipantes.php" target="_blank">Sortear en pantalla</a>
    </div>
  </li>

</ul>

				</div>
			</div>
		</nav>
		<div class="container">
	';
}

function footer()
{
	echo '
		</div>
		<div class="text-center">&copy; ' . date('Y') . ' - Realizado por Sistemas / Multimedia CAME <i class="glyphicon glyphicon-thumbs-up"></i></div>
	';
}

function cerrarHtml()
{
	echo '
		<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
		<script src="assets/libs/bootstrap-3/js/bootstrap.min.js"></script>
	</body>
	</html>
	';
}

function guardadoFelicitaciones($mensaje, $urlVolver)
{
echo'
<div class="jumbotron">
	<h1>GUARDADO</h1>
	<p>' . $mensaje . '</p>
	<a href="' . $urlVolver . '" class="btn btn-primary btn-lg btn-block">Volver</a>
</div>';
}
