<?php

//Iniciar Session
require_once 'includes/conexion.php';

//Recoger datos del formulario
if (isset($_POST)) {
	//Borrar error antiguo
	if (isset($_SESSION['error_login'])) {
		session_unset($_SESSION['error_login']);
	}	

	//	Recojo datos del form
	$email = trim($_POST['email']);
	$password = $_POST['password'];

//Consulta db para verificar las credenciales del usuario
	$sql = "SELECT * FROM usuarios WHERE email='$email'";
	$query = mysqli_query($db, $sql);

	if ($query) {
		$usuario = mysqli_fetch_assoc($query);
//Comprobar password		
		$verificado = password_verify($password, $usuario['password']);

		if ($verificado) {
//Utilizar una session para guardar los datos del usuario logueado			
			$_SESSION['usuario'] = $usuario;
//Si algo falla, enviar una session con el fallo			
		} else {
			$_SESSION['error_login'] = "Login Incorrecto";
		}
	} else {
		$_SESSION['error_login'] = "Login Incorrecto";
	}
}

//Redirigir
header('Location: index.php');