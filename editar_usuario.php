<?php require_once 'includes/redireccion.php'; //La redireccion nos protege de accesos indebidos, importante?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<h1>Actualizar mis datos</h1>
	<!-- Mostrar errores -->
	<?php if (isset($_SESSION['completado'])) : ?>
		<div class="alerta alerta-exito">
			<?= $_SESSION['completado']; ?>					
		</div>
		<?php elseif (isset($_SESSION['errores']['general'])): ?>	
			<div class="alerta alerta-error">
				<?= $_SESSION['errores']['general']; ?>					
			</div>				
	<?php endif; ?>	

	<form action="actualizar_usuario.php" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']?>"></input>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'): ''; ?>

		<label for="apellidos">Apellidos</label>
		<input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos']?>" ></input>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'): ''; ?>

<!-- 		<label for="fecha">Fecha</label>
		<input type="text" name="fecha" placeholder="<?= gmdate("Y-m-d", $_SESSION['usuario']['fecha']); ?>"></input>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'fecha'): ''; ?> -->

		<label for="email">Email</label>
		<input type="email" name="email" value="<?= $_SESSION['usuario']['email']?>"></input>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'): ''; ?>

<!-- 		<label for="password">Contraseña</label>
		<input type="password" name="password"></input>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'): ''; ?> -->

		<input type="submit" value="Actualizar"></input>
	</form>	
	<?php borrarErrores('errores'); ?>
	<?php borrarErrores('completado'); ?>
</div>	

<?php require_once 'includes/pie.php' ?>
