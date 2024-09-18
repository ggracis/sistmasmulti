<?php
require_once('requires.php');
//$nombre = $_POST['nombre'] ?? null;

$errores = [];
if($_POST)
{
	//if(!$errores)
	//if(count($errores) == 0)
	if(!($errores = registrarParticipante($_POST)))
	{
		header('location: felicitacionesParticipantes.php');
		exit;
	}
}

abrirHtml('Participantes', '');
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
						<label for="nombre">Nombre/s</label>
						<p>Puede cargar por tandas (uno por linea)</p>
						<textarea rows="10" class="form-control" id="nombre" name="nombre" value="" placeholder="Nombre/s"></textarea></br>
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
