<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="main">
	<?php 
		$categoria = $_GET['categoria'];
		if ( !checkCategoria($db, $categoria)) {
			header("Location: index.php");
		}
	?>
	<h1>Entradas de <?= $categoria ?></h1>
	<?php 	
			$entradas = getEntradas($db, null, null, $categoria);
	
			if (!empty($entradas)) {
				while ( $entrada = mysqli_fetch_assoc($entradas)):
			
	?>	
	<a href="entrada.php?entryId=<?=$entrada['id']?>">
		<article class="entry">		
			<h2> <?= $entrada['titulo'] ?> </h2>
			<span class="fecha"> 
				<a href="entradas_categoria.php?categoria=<?=$entrada['categoria'] ?>">
					<?= $entrada['categoria']." | ".$entrada['fecha'] ?>					
				</a>
			</span>
			<p>
				<?= substr($entrada['descripcion'], 0,200)."..." ?>
			</p>
		</article>
	</a>
	<?php 		endwhile; 
			} else {
				echo "	<div class='alerta'> 
							Aún no hay entradas para esta categoria.
						</div>
					 ";

			};
	?>

</div>	<!--Fin main !-->

<?php require_once 'includes/pie.php' ?>
