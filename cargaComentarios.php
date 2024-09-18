<?php
require_once('requires.php');

//$nombre = $_POST['nombre'] ?? null;
//$comentario = $_POST['comentario'] ?? null;

$errores = [];
if($_POST)
{
	//if(!$errores)
	//if(count($errores) == 0)
	if(!($errores = registrar($_POST)))
	{
		header('location: felicitaciones.php');
		exit;
	}
}

abrirHtml('Comentarios', '');
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
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="Nombre"></br>
					<label for="comentario">Comentario</label>
					<textarea id="comentario" name="comentario" class="form-control" rows="2" placeholder="Comentario"></textarea></br>

</div>
<div class="row">
	<input type="hidden" name="aparecio" id="aparecio" value="0">
				<input type="submit" class="btn btn-info btn-lg btn-block" value="Guardar"/>
			</div>
			</form>
		</div>
<?php
footer();
cerrarHtml();
?>
