<?php require_once 'includes/redireccion.php'; //La redireccion nos protege de accesos indebidos, importante?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<h1>Crear Entrada</h1>

	<form action="guardar_entrada.php" method="POST">
		<label for="titulo">Titulo Entrada</label>
		<input type="text" name="titulo">
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?>

		<label for="descripcion">Descripción: </label>
		<textarea name="descripcion" rows="4" cols="83" maxlength="255"></textarea>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?>

		<label for="categoria">Categoria</label>
		<select name="categoria" >
			<?php 	$categorias = getCategorias($db); 
					while  ($categoria = mysqli_fetch_assoc($categorias)):
			?>
				<option value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?> </option>
			<?php endwhile; ?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?>

		<input type="submit" value="Crear entrada">
	</form>
	<?php borrarErrores('errores_entrada'); ?>
</div>	

<?php require_once 'includes/pie.php' ?>