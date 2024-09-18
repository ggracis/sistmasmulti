<?php

require_once('requires.php');

abrirHtml('Ver preguntas', '');

//cabecera();


?>

<link href="assets/css/estilosComentarios.css" rel="stylesheet">

<div class="bg"></div>

<div class="bg bg2"></div>

<div class="bg bg3"></div>

<div class="row">

	<div class="logo"></div>

	<div class="row preguntasContenedor">

	<div class="bs-example">

	    <div id="myCarousel" class="carousel slide" data-ride="carousel">

	        <!-- Wrapper for carousel items -->

	        <div class="carousel-inner">

							<?php

							verPregunta();

							?>

	        </div>

	        <!-- Carousel controls -->

	        <a class="carousel-control left" href="#myCarousel" data-slide="prev">

	            <span class="glyphicon glyphicon-chevron-left"></span>

	        </a>

	        <a class="carousel-control right" href="#myCarousel" data-slide="next">

	            <span class="glyphicon glyphicon-chevron-right"></span>

	        </a>

	    </div>

	</div>


	<div class="twittea"  id="twittea"><p>HACÉ TUS COMENTARIOS EN TWITTER <br /> CON EL HASHTAG #ForoCAME</p></div>


</div>



</div>



<?php

//footer();

cerrarHtml();

?>

<script type="text/javascript">

$(document).ready(function(){

     $("#myCarousel").carousel({

         interval : false

     });



				document.addEventListener("keydown", function(event) {

				  console.log(event);

					if (event.keyCode == 33) {

							 console.log('Anterior');

							$("#myCarousel").carousel('prev');

					}

					if (event.keyCode == 34) {

							console.log('Siguiente')

							$("#myCarousel").carousel('next');

				 }

				 if (event.keyCode == 37) {

							console.log('Anterior');

						 $("#myCarousel").carousel('prev');

				 }

				 if (event.keyCode == 39) {

						 console.log('Siguiente')

						 $("#myCarousel").carousel('next');

				}

				if (event.keyCode == 38) {

						 console.log('Anterior');

						$("#myCarousel").carousel('prev');

				}

				if (event.keyCode == 40) {

						console.log('Siguiente')

						$("#myCarousel").carousel('next');

			 }



				});









});

</script>
