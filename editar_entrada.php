<?php require_once 'includes/redireccion.php'; //La redireccion nos protege de accesos indebidos, importante?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<?php 
		$entryId = (int)$_GET['entryId'];
		$entrada = getEntrada($db, $entryId);	
	?>
	<h1>Editando la entrada: <?= $entrada['titulo']; ?> </h1>

	<form action="guardar_entrada.php" method="POST">
		<input type="number" name="entryId" value="<?=$entryId?>" hidden="true">
		<!-- EntryId, variable de control y no perder el indice de la entrada. Comprueba la redireccion en guardar_entrada.php en caso de error-->

		<label for="titulo" class='editarEntradaLabel'>Titulo Entrada</label>
		<input type="text" name="titulo" value="<?=$entrada['titulo']?>" style="width: 602px;" class='editarEntradaInput'>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?>

		<label for="descripcion" class="editarEntradaLabel">Descripción: </label>
		<textarea name="descripcion" rows="4" cols="83" maxlength="255" style="width: 612px;" class='editarEntradaInput'><?=$entrada['descripcion']?>
		</textarea>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?>

		<label for="categoria" class="editarEntradaLabel">Categoria</label>
		<select name="categoria" >
			<?php 	$categorias = getCategorias($db); 
					while  ($categoria = mysqli_fetch_assoc($categorias)):
			?>
				<?php if ($entrada['categoria_id'] == $categoria['id']): ?>
					<option value="<?=$categoria['id'] ?>" selected="selected"> <?=$categoria['nombre'] ?> </option>
				<?php else:?>
					<option value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?> </option>
				<?php endif; ?>
			<?php endwhile; ?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?>

		<input type="submit" value="Guardar entrada" style="margin-top: 20px;">
	</form>
	<?php borrarErrores('errores_entrada'); ?>
</div>	<!--Fin main !-->

<?php require_once 'includes/pie.php' ?>
