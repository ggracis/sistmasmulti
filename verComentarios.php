<?php

require_once('requires.php');

abrirHtml('Ver comentarios', '');

//cabecera();


?>

<link href="assets/css/estilosComentarios.css" rel="stylesheet">


<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<div class="row">

	<div class="logo"></div>

	<?php

					verComentario();

	?>

	<div id="seconds" class="seconds">

  <div id="bar" class="bar animating"></div>

	<div class="twittea"><p>HACÉ TUS COMENTARIOS EN TWITTER <br /> CON EL HASHTAG #ForoCAME</p></div>

</div>

</div>

<?php

//footer();

cerrarHtml();

?>
