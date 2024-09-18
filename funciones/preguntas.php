<?php
require_once('validacion.php');
require_once('files.php');

define('PREGUNTAS_FILE', 'preguntas.json');

function registrarPreguntas(array $post)
{
	$datos = $post;

		guardarPreguntas($datos);

	return $errores;
}

function checkDuplicadoPreguntas($field, $value)
{
	$preguntas = listPreguntas();
	foreach($preguntas as $pregunta)
	{
		if(strtolower(trim($pregunta[$field])) == strtolower(trim($value)))
		{
			return true;
		}
	}
	return false;
}

function savePreguntasFile(array $preguntas = [])
{
	$content = ['preguntas' => $preguntas];
	file_put_contents(PREGUNTAS_FILE, json_encode($content));
}

function borrarPregunta($borrarId){
$data = file_get_contents(PREGUNTAS_FILE);
$json_arr = json_decode($data, true);
unset($json_arr["preguntas"][$borrarId]);
file_put_contents(PREGUNTAS_FILE, json_encode($json_arr));
header("Location: listaPreguntas.php");
die();
}

function listPreguntas()
{
	if(!file_exists(PREGUNTAS_FILE))
	{
		savePreguntasFile();
	}
	$preguntas = file_get_contents(PREGUNTAS_FILE);
	$preguntas = json_decode($preguntas, true);
	return $preguntas['preguntas'];
}

function nextIdPreguntas()
{
	$preguntas = listPreguntas();
	$id = 0;
	foreach($preguntas as $pregunta)
	{
		if($id < $pregunta['id'])
		{
			$id = $pregunta['id'];
		}
	}
	return $id + 1;
}

function guardarPreguntas(array $datos)
{
	$preguntas = listPreguntas();
	$preguntas[] = $datos;
	savePreguntasFile($preguntas);
}


function verPregunta(){
	$preguntas = listPreguntas();
	$i = 0;

	foreach($preguntas as $key=>$value)
	{
		if ($value === reset($preguntas)) {
		echo '<div class="item active"><div class="nombrePregunta">'. $value["Nombre"].' pregunta: </div><div class="textoPregunta">'.$value["Pregunta"].'</div></div>';
	}		else {
		echo '<div class="item"><div class="nombrePregunta">'. $value["Nombre"].' pregunta: </div><div class="textoPregunta">'.$value["Pregunta"].'</div></div>';
	}
	}



}



function listarPreguntas(){
	$preguntas = listPreguntas();

	if(isset($_REQUEST['clear']) )
	{
	limpiarArchivo(PREGUNTAS_FILE);
	echo"Limpiando base...";
	header("Location: listaPreguntas.php");
}

		if(isset($_REQUEST['borrarId']) )
	{
	     $borrarId = $_REQUEST['borrarId'];
echo "Hay que borrar el pregunta # ".$borrarId."<br>";
			 borrarPregunta($borrarId);
	}

	if(is_array($preguntas)) {
		echo "<div class=\"btn_borrar\"><a href=\"?clear=Si\" onclick=\"return confirm('Esta seguró que quiere limpiar la base?');\">Borrar preguntas</a></div>";

    foreach($preguntas as $key=>$value)
    {
						echo '<div class="alert alert-danger">';
						echo'<br><b>Pregunta #: </b> '.$key;
						echo ' <b> <a href="listaPreguntas.php?borrarId='.$key.'"> Borrar</a></b>';

        foreach($value as $bKey=>$bValue)
        {
            echo '<br>&nbsp;&nbsp;'.$bKey.' = '.$bValue;
        }
						echo '<br></div>';
    }
	}
	else{
		echo "<br><br><h2>No hay preguntas cargadas</h2>";
	}
}
