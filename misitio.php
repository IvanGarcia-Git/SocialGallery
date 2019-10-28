<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Sitio de ".$user;?></title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

	<!-- Script para hacer scroll lento -->

	<script>
		$(document).ready(function() {
		$('a[href^="#"]').click(function() {
			var destino = $(this.hash);
			if (destino.length == 0) {
			destino = $('a[name="' + this.hash.substr(1) + '"]');
			}
			if (destino.length == 0) {
			destino = $('html');
			}
			$('html, body').animate({ scrollTop: destino.offset().top }, 500);
			return false;
		});
		});
	</script>


	<!-- //////////CONTENIDO HEADER////////// -->
	<div class="home">
		<div class="header">
			<div class="seccion1" style="width: 20%"><img src="img/home/logo.png"></div>
			<div class="seccion2" style="width: 80%; text-align: right;">
					<?php
						include "./header.php";
					?>	
			</div>
		</div>

		<!-- //////////CONTENIDO INICIO////////// -->

		<div class="contenido">
			<div class="particiones part1">
				<h1 class="titulos">Bienvenido, <?php echo $_SESSION['nombre'];?></h1>
				<p class="textos">¡Echa un vistazo a las imágenes que has subido!</p>
			</div>	

			<div class="particiones part2">
				<a data-ancla="gal_fin" href="#gal_fin"><img src="img/home/home.png"></a>
			</div>
		</div>
	</div>
		<!-- //////////FIN CONTENIDO HEADER////////// -->

	<!-- //////////SUBIR IMAGEN////////// -->

	<?php
	// include "./login/services/login.proc.php";
	// include "./servicios/conexion.php";
	// $consult="SELECT user.id_user FROM user WHERE user.nom_user LIKE ".$_SESSION['nombre'].";" ;
	// $resultad=mysqli_query($conn,$consult);
	// $muestra=mysqli_fetch_array($resultad);
	$variableid = $_GET['variableid'];
	?>


	<div class="buscador">
		<form method="post" enctype="multipart/form-data" action="./procesa.php?variableid=<?php echo $variableid; ?>">
			<input type="text" name="titulo" size="35" style="width: 30%">
			<input type="file" name="imagen" style="width: 30%" accept="image/gif,image/jpeg,image/png,image/jpg"> <!-- El accept restringe la subida de archivos (Parte 1 de la validacion) -->
			<input type="submit" value="Enviar">
		</form>
	</div>

	<!-- //////////FIN SUBIR IMAGEN////////// -->

	<!-- //////////CONTENIDO GALERIA JUEGOS////////// -->
	<div class="fondogal">

	<div class="titulohome"><a id="gal_fin" name="gal_fin" class="gal_fin">Mis imágenes</a></div>

		<h1 class="titulos"> <?php  ?></h1>
		<div class="cont_gal">
		
		<?php
			// Conexion a la base de datos
			include "./servicios/conexion.php";
			// include "./login/services/login.proc.php";
			$variableid = $_GET['variableid'];
			$usuar = $_SESSION['nombre'];
			
			// $varid = mysqli_real_escape_string($conn,$variableid);


			$sql="SELECT imagen.link_img FROM imagen WHERE imagen.id_user='$variableid';" ;
			$res=mysqli_query($conn,$sql);

		?>
		</div>
		<div class="divimagen">
			<?php

			while ($data=mysqli_fetch_array($res)) {
			?>
				<img <?php echo 'src='.$data['link_img'];?> style="width: 100%">
			<?php
			}	 
			?>
			</div>
			
		</div>
	</div>
</body>
</html>