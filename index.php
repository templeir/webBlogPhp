<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<h1>Ultimas Entradas</h1>
	<?php 	$entradas = getEntradas($db, $limit = true);

			if (!empty($entradas)):
				while ( $entrada = mysqli_fetch_assoc($entradas)):
	?>	
	<a href="entrada.php?entryId=<?=$entrada['id']?>">
		<article class="entry">		
			<h2> <?= $entrada['titulo'] ?> </h2>
			<span class="fecha"> <?= $entrada['categoria']." | ".$entrada['fecha'] ?></span>
			<p>
				<?= substr($entrada['descripcion'], 0,200)."..." ?>
			</p>
		</article>
	</a>
	<?php 		endwhile; 
			endif;
	?>

	<div id="ver-todas">
		<a href="entradas.php">Ver todas las entradas</a>
	</div>
</div>	<!--Fin main !-->

<?php require_once 'includes/pie.php' ?>
