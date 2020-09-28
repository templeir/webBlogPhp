<?php require_once 'includes/redireccion.php'; //La redireccion nos protege de accesos indebidos, importante?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<h1>Crear Categoria</h1>

	<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'categoria') : ''; ?>
	<form action="guardar_categoria.php" method="POST">
		<label for="categoria">Nombre Categoria</label>
		<input type="text" name="categoria">

		<input type="submit" value="Crear categoria">
	</form>
	<?php borrarErrores('errores'); ?>
</div>	

<?php require_once 'includes/pie.php' ?>
