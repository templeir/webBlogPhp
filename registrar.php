<?php
/*Primero Validar Informacion, luego Guardarla*/
if (isset($_POST)) {
	require_once 'includes/conexion.php';

	//Recoger los valores del formulario
	//mysqli_real_escape_string - Limpia el contenido del formulario convirtiendo a string todo lo que haya.
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
	$password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
	$fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($db,$_POST['fecha']) : false;

	//Array errores
	$errores = array();

	//Validacion de datos
	if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
		$nombre_validado = true;
	}else {
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}
	
	if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
		$apellidos_validado = true;
	}else {
		$apellidos_validado = false;
		$errores['apellidos'] = "Los apellidos no es válido";
	}

	if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$email_validado = true;
	}else {
		$email_validado = false;
		$errores['email'] = "El email no es válido";
	}

	if (!empty($password) ) {
		$password_validado = true;
	}else {
		$password_validado = false;
		$errores['password'] = "El password no es válido";
	}

	if (!empty($fecha) ) {
		$fecha_validado = true;
	}else {
		$fecha_validado = false;
		$errores['fecha'] = "La fecha no es válido";
	}

	$guardar_usuario = 0;

	if (count($errores) == 0) {
		$guardar_usuario = true;		

//cifrar contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
		//password_verify($password, $password_segura); <- Si es true, es correcta.
		$sql = "INSERT INTO usuarios VALUES (null,'$nombre', '$apellidos', '$fecha', '$email', '$password_segura')";
		$query = mysqli_query($db, $sql);

		if ($query) {
			$_SESSION['completado']='El registro se ha realizado con exito';
		} else {
			$_SESSION['errores']['general'] = 'Fallo al guardar el usuario en la DB';
		}
	} else {
		$_SESSION['errores'] = $errores;
	}
}

header('Location: index.php');