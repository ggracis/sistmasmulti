<?php
function validate(array $datos)
{
	$errores = [];

	if(!isset($datos['nombre']) ||
		trim($datos['nombre']) == '')
	{
		$errores['nombre'] = 'Debe ingresar un nombre';
	}

	if(!isset($datos['comentario']) ||
		trim($datos['comentario']) == '')
	{
		$errores['comentario'] = 'Debe ingresar un comentario';
	}

	return $errores;
}
