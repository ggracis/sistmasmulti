<?php
require_once('requires.php');
abrirHtml('Participantes', '');
cabecera();
?>
		<div class="row">
				<?php
				listarparticipantes();
				?>
		</div>
<?php
footer();
cerrarHtml();
?>
