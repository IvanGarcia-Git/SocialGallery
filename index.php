<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="codi.js"></script>

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
			<div class="seccion2" style="width: 80%">
				<?php
					//Mantengo la sesión. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
					session_start();
					if(isset($_SESSION['nombre'])){
						echo "<a href='./login/services/logout.proc.php'>Cerrar sesión de ".$_SESSION['nombre']."</a>&nbsp;&nbsp;";
					}else{
						echo "<a href='./login/index.php'>¡Inicia sesión!</a>";
					}
				?>
			</div>
		</div>

		<!-- //////////CONTENIDO INICIO////////// -->

		<div class="contenido">
			<div class="particiones part1">
				<h1 class="titulos">Galimg</h1>
				<p class="textos">Bienvenido a Galimg, una galería de imagenes separadas por secciones. Elige la que más te guste!</p>
			</div>	

			<div class="particiones part2">
				<a data-ancla="gal_fin" href="#gal_fin"><img src="img/home/home.png"></a>
			</div>
		</div>
	</div>
		<!-- //////////FIN CONTENIDO HEADER////////// -->

	<!-- //////////SUBIR IMAGEN////////// -->

	<div class="buscador">
	<p class="mensaje" id="mensaje"></p>
		<form method="post" enctype="multipart/form-data" action="./procesa.php" onsubmit="return subirimg()">
			<input id="tituloimg" type="text" name="titulo" size="35" style="width: 30%">
			<input id="linkimg" type="file" name="imagen" style="width: 30%" accept="image/gif,image/jpeg,image/png,image/jpg"> <!-- El accept restringe la subida de archivos (Parte 1 de la validacion) -->
			<input type="submit" value="Enviar">
		</form>
	</div>

	<!-- //////////FIN SUBIR IMAGEN////////// -->

	<!-- //////////CONTENIDO GALERIA JUEGOS////////// -->
	<div class="fondogal">
				
		<div class="titulohome"><a id="gal_fin" name="gal_fin" class="gal_fin">Todas las imágenes</a></div>
			
		<h1 class="titulos"> <?php  ?></h1>
		<div class="cont_gal">
		
		<?php
			// Conexion a la base de datos
			include "./servicios/conexion.php";
			
			$sql="SELECT imagen.nombre_img, imagen.link_img FROM imagen";
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