<?php
require_once('validacion.php');
require_once('files.php');

define('COMENTS_FILE', 'comentarios.json');

function registrar(array $post)
{
	$datos = $post;

	if(!$errores = validate($datos))
	{
		guardarComentarios($datos);
	}

	return $errores;
}

function checkDuplicado($field, $value)
{
	/** @var array $comentarios */
	$comentarios = listComentarios();

	foreach($comentarios as $comentario)
	{
		if(strtolower(trim($comentario[$field])) == strtolower(trim($value)))
		{
			return true;
		}
	}

	return false;
}

function saveComentariosFile(array $comentarios = [])
{
	$content = [
		'comentarios' => $comentarios
	];
	file_put_contents(COMENTS_FILE, json_encode($content));
}


function borrarComentario($borrarId){
$data = file_get_contents(COMENTS_FILE);
$json_arr = json_decode($data, true);
unset($json_arr["comentarios"][$borrarId]);
//var_dump($json_arr);
file_put_contents(COMENTS_FILE, json_encode($json_arr));
header("Location: listaComentarios.php");
die();
}

function limpiarArchivo($ArchivoLimpiar){
echo "Voy a limpiar la base...";
//file_put_contents($ArchivoLimpiar, "");
$fechaArchivo = date("d-m-Y_H-i-s");
$nuevoNombre = $ArchivoLimpiar."_".$fechaArchivo.".json";
rename($ArchivoLimpiar, $nuevoNombre);
}


/**
 * @return array
 */
function listComentarios()
{
	if(!file_exists(COMENTS_FILE))
	{
		saveComentariosFile();
	}
	$comentarios = file_get_contents(COMENTS_FILE);
	$comentarios = json_decode($comentarios, true);
	return $comentarios['comentarios'];
}

function nextId()
{
	$comentarios = listComentarios();

	$id = 0;
	foreach($comentarios as $comentario)
	{
		if($id < $comentario['id'])
		{
			$id = $comentario['id'];
		}
	}

	return $id + 1;
}

function guardarComentarios(array $datos)
{
	$comentarios = listComentarios();
	$comentarios[] = $datos;
	saveComentariosFile($comentarios);
}


function array_random($arr, $num = 1) {
    shuffle($arr);
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

function verComentario(){
	$comentarios = listComentarios();
	$elemento = array_random($comentarios);
	echo '<blockquote class="tweet-this"><p>'.$elemento['comentario'].'<span>- '.$elemento['nombre'].'</span></p></blockquote>';
	header("Refresh: 40;url=verComentarios.php");
}

function listarComentarios(){
	$comentarios = listComentarios();
	if(isset($_REQUEST['clear']) )
	{
	limpiarArchivo(COMENTS_FILE);
	echo"Limpiando base...";
	header("Location: listaComentarios.php");
}
		if(isset($_REQUEST['borrarId']) )
	{
	     $borrarId = $_REQUEST['borrarId'];
echo "Hay que borrar el comentario # ".$borrarId."<br>";
			 borrarComentario($borrarId);
	}
	if(is_array($comentarios)) {
		echo "<div class=\"btn_borrar\"><a href=\"?clear=Si\" onclick=\"return confirm('Esta seguró que quiere limpiar la base?');\">Borrar comentarios</a></div>";
		echo "<div class=\"row\">";
    foreach($comentarios as $key=>$value)
    {
						echo '<div class="alert alert-danger">';
						echo'<br><b>Comentario #: </b> '.$key;
						echo ' <b> <a href="listaComentarios.php?borrarId='.$key.'"> Borrar</a></b>';

        foreach($value as $bKey=>$bValue)
        {
            echo '<br>&nbsp;&nbsp;'.$bKey.' = '.$bValue;
        }
						echo '<br></div>';
    }
		echo "</div>";
	}
	else{
		echo "<br><br><h2>No hay comentarios cargados</h2>";
	}
}
