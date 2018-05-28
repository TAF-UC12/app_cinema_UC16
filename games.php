<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Games</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<script defer src="js/fontawesome/fontawesome-all.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<main role="main">
	
<header>

	<?php
	
		include('menu.php');
	
	?>	
	
</header>

<?php
	require_once "config/conectar.php";	

	$sql = "SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			WHERE tipoPostagem.idtipoPostagem = 2 LIMIT 1";	

	$resultado = mysqli_query($strcon, $sql)
	or die ("Não foi possível realizar a consulta ao banco de dados");

	while ($linha=mysqli_fetch_array($resultado)) {

	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	

			echo "<div class='categoriaPagina$tipo'>

						<h2><i class='fas fa-angle-left' onclick='goBack()'></i> $tipo</h2>

					</div>";
	}
	?>
	
	
	<script>
	function goBack() {
		window.history.back();
	}
	</script>

<section class="slider">
	
	
</section>

<section class="submenu">
	
	<?php
		require_once('submenu.php');
	?>
	
</section>


<section class="noticias_container">
	
	
	
	<article class="lista_noticias">

	<?php
	require_once "config/conectar.php";	

	$categoria = $_GET["tipo"];	
		
	$sql = "SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			WHERE tipoPostagem.idtipoPostagem = $categoria";	

	$resultado = mysqli_query($strcon, $sql)
	or die ("Não foi possível realizar a consulta ao banco de dados");

	while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	


			echo "<div class='noticia'>

				<div class='imgNoticia'>
					<img src='img/noticias/$img' alt='$img'>

				</div>

				<div class='infoNoticiaContainer'>
					<div class='infoNoticia'>

						<button type='button' class='$tipo'>$tipo</button>


					</div>

					<div class='chamadaNoticia'>
						<p><a href='noticia.php?news=$idnoticia'>$titulo</a></p>
					</div>

				</div>

			</div>";

	}
	?>
			</article>	
	
	
</section>									
	
	
	
	
	
	
	
	
	
	
	
	
</main>


</body>
</html>