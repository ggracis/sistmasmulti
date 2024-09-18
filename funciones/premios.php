<?php
//require_once('validacion.php');
require_once('files.php');

define('PREMIOS_FILE', 'premios.json');

function registrarParticipante(array $post)
{
	$datos = $post;
	$doms = trim($datos['nombre']);
	$textAr = explode("\n", $doms);

    foreach($textAr as $line) {
    $nombreP = trim($line);
    //echo "$nombreP<br />";
		guardarParticipantes($line);

    }

}

function checkParticipanteDuplicado($field, $value)
{
	/** @var array $participantes */
	$participantes = listParticipantes();

	foreach($participantes as $participante)
	{
		if(strtolower(trim($participante[$field])) == strtolower(trim($value)))
		{
			return true;
		}
	}

	return false;
}

function saveParticipantesFile(array $participantes = [])
{
	$content = [
		'participantes' => $participantes
	];
	file_put_contents(PREMIOS_FILE, json_encode($content));
}


function borrarParticipante($borrarId){
$data = file_get_contents(PREMIOS_FILE);
$json_arr = json_decode($data, true);
unset($json_arr["participantes"][$borrarId]);
//var_dump($json_arr);
file_put_contents(PREMIOS_FILE, json_encode($json_arr));
header("Location: listaParticipantes.php");
die();
}

function borrarParticipantePorNombre($borrarNombre){
$data = file_get_contents(PREMIOS_FILE);
$json_arr = json_decode($data, true);
//unset($json_arr["participantes"][$borrarNombre]);

foreach ($json_arr["participantes"] as $key => $value) {
    foreach ($value as $k => $v) {
			echo $v;
        if ($v == $borrarNombre) {
					echo "HOLA ".$json_arr["participantes"][$key][$k];
					echo "<h2>Aca lo encontre!</h2>";
          unset($json_arr["participantes"][$key]);

        }
				echo "<b>No es</b><br>";
    }
}
echo "<br><br>Archivo:<br>";
var_dump($json_arr);
file_put_contents(PREMIOS_FILE, json_encode($json_arr));
//header("Location: listaParticipantes.php");
die();
}

function guardarGanador($nombreGanador){
	
}


/**
 * @return array
 */
function listParticipantes()
{
	if(!file_exists(PREMIOS_FILE))
	{
		saveParticipantesFile();
	}
	$participantes = file_get_contents(PREMIOS_FILE);
	$participantes = json_decode($participantes, true);
	return $participantes['participantes'];
}

function array_push_assoc($array, $key, $value){
$array[][$key] = $value;
return $array;
}

function guardarParticipantes($datos)
{
	$participantes = listParticipantes();
	$participantes = array_push_assoc($participantes, 'nombre', $datos);
	saveParticipantesFile($participantes);

}


function verGanador(){
	echo '<div class="row" id="anuncio">Y el ganador es...</div>';
	echo '<div class="row"><p><div class="letters-wrapper"></div></p></div>';
}

function listarparticipantes(){
	$participantes = listParticipantes();
		if(isset($_REQUEST['borrarId']) )
	{
	     $borrarId = $_REQUEST['borrarId'];
			 echo "Hay que borrar el comentario # ".$borrarId."<br>";
			 borrarParticipante($borrarId);
	}

	if(isset($_REQUEST['borrarNombre']) )
{
		 $borrarNombre = $_REQUEST['borrarNombre']."\r";
		 echo "Hay que borrar el participante <br>";
		 guardarGanador($borrarNombre);
		 var_dump($borrarNombre);
		 borrarParticipantePorNombre($borrarNombre);
		 
}
	if(isset($_REQUEST['clear']) )
	{
	limpiarArchivo(PREMIOS_FILE);
	echo"Limpiando base...";
	header("Location: listaParticipantes.php");
}
	if(is_array($participantes)) {
		echo "<div class=\"btn_borrar\"><a href=\"?clear=Si\" onclick=\"return confirm('Esta seguró que quiere limpiar la base?');\">Borrar participantes</a></div>";
    foreach($participantes as $key=>$value)
    {
							echo'<br><b>Participante # '.$key.'</b>: ';
							foreach($value as $bKey=>$bValue)
							{
									echo $bValue;
							}
							echo '&nbsp;&nbsp; <b> <a href="listaParticipantes.php?borrarId='.$key.'"> Borrar</a></b>';
    }
	}
	else{
		echo "<br><br><h2>No hay participantes cargados</h2>";
	}
}
