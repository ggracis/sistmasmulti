<?php
require_once('requires.php');
$errores = [];
if($_POST)
{
	if(!($errores = registrarPreguntas($_POST)))
	{
		header('location: felicitacionesPreguntas.php');
		exit;
	}
}
abrirHtml('Preguntas', '');
cabecera();
?>
		<div class="row">
			<?php
			//if(count($errores) > 0) {
			//if(!empty($errores)) {
			if($errores) { ?>
				<div class="alert alert-danger">
				<?php foreach($errores as $error) {
					echo $error . '<br>';
				}?>
				</div>
			<?php } ?>
			<form role="form" action="" method="post" enctype="multipart/form-data">
				<div class="row">
						<label for="Nombre">Nombre</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" value="" placeholder="Nombre"></br>
					<label for="Pregunta">Pregunta</label>
					<textarea id="Pregunta" name="Pregunta" class="form-control" rows="2" placeholder="Pregunta"></textarea></br>
				</div>
				<div class="row">
					<input type="submit" class="btn btn-info btn-lg btn-block" value="Guardar"/>
				</div>
			</form>
		</div>
<?php
footer();
cerrarHtml();
?>
