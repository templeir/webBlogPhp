	<?php 
	require_once 'includes/conexion.php';

	if (isset($_SESSION['usuario']) && isset($_GET['entryId'])) {
		$entryId = (int)$_GET['entryId'];
		$userId = $_SESSION['usuario']['id'];

		$sql = "DELETE FROM entradas WHERE id = '$entryId' AND usuario_id = '$userId'";
		$query = mysqli_query($db, $sql);		
	}
	
	header("Location: index.php");
	
	?>