<?php

if ($_POST) {
	require_once 'includes/conexion.php';
	$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
	$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
	$usuario = $_SESSION['usuario']['id'];
	$entryId = isset($_POST['entryId']) ? (int)$_POST['entryId'] : false;

	$errores = array();

	if (empty($titulo)) {
		$errores['titulo'] = "El titulo no es válido";
	}

	if (empty($descripcion)) {
		$errores['descripcion'] = "La descripción no es válido";
	}

	if (empty($categoria) && !is_numeric($categoria)) {
		$errores['categoria'] = "La categoria no es válido";
	}	

	if (count($errores) == 0) {
		if ($entryId) {
			$sql = "UPDATE entradas SET usuario_id = $usuario, 
										categoria_id = $categoria, 
										titulo = '$titulo', 
										descripcion = '$descripcion', 
										fecha = CURDATE()
					WHERE id = $entryId AND usuario_id = $usuario;";
		} else {
			$sql = "INSERT INTO entradas VALUES (null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
		}
		$query = mysqli_query($db, $sql);
		header("Location: index.php");

		//var_dump(mysqli_error($db)); die(); 
	} else {
		$_SESSION['errores_entrada'] = $errores;	
		if ($entryId) {
			header("Location: editar_entrada.php?entryId=".$entryId);
		} else {
			header("Location: crear_entrada.php");
		}
	}
}