<?php
require_once('requires.php');
abrirHtml('Preguntas', '');
cabecera();
?>
		<div class="row">
				<?php
				listarPreguntas();
				?>
		</div>
<?php
footer();
cerrarHtml();
?>
