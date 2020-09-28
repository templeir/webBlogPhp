<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<?php 
		$entryId = (int)$_GET['entryId'];
		$entrada = getEntrada($db, $entryId);	
	?>

	<h1>Entrada <?= $entrada['titulo']; ?> </h1>

	<a href="">
		<article class='entry'>		
			<h2> <?= $entrada['titulo'] ?> </h2>
			<span class="fecha"> 
				<a href="entradas_categoria.php?categoria=<?=$entrada['categoria'] ?>">
					<?= $entrada['categoria'] ?></a><?= " | " . $entrada['fecha'] ?>
				</a>
			</span>
			<p>
				<?= $entrada['descripcion'] ?>
			</p>
			<p class='autor'>
				Escrito por <?= $entrada['nombreUsuario'] ?>
			</p>
		</article>
	</a>
	<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada['usuario_id']): ?>
		<div class="botones">
			<a href="editar_entrada.php?entryId=<?=$entryId?>" class="botonEntrada">Editar Entrada</a>
			<a href="borrar_Entrada.php?entryId=<?=$entryId?>" class="botonEntrada">Borrar Entrada</a>
		</div>
	<?php endif; ?>


</div>	<!--Fin main !-->

<?php require_once 'includes/pie.php' ?>
