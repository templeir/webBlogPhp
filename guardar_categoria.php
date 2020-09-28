<?php

if ( isset($_POST) ) {
	require_once 'includes/conexion.php';
	//Capturar Datos

	$n_categoria = isset($_POST['categoria']) ? mysqli_real_escape_string($db, $_POST['categoria']) : false;
	// if (isset($_POST['categoria'] )) {
	// 	$n_categoria = mysqli_resl_escape_string($db, $_POST['categoria']);
	// }

	$errores = array();
	//Validar Datos
	if (!empty($n_categoria) && !is_numeric($n_categoria) && !preg_match("/[0-9]/" , $n_categoria)) {
		$categoria_valida = true;
	} else {
		$categoria_valida = false;
	 	$errores['categoria'] = "La categoria no es válida";
	}

	//Guardar Datos
 	if (count($errores) == 0) {
 		$sql = "INSERT INTO categorias VALUES(null, '$n_categoria')";
 		$query = mysqli_query($db, $sql);
 	} else {
 		$_SESSION['errores'] = $errores;
 	}
}
header("Location: crear_categoria.php");