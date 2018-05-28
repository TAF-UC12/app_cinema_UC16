
<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Notícia</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/noticias.css" rel="stylesheet" type="text/css">
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

	<div class='categoriaPaginaNoticias'>

		<h2>Notícias</h2>

	</div>			
					

<section class="submenu">
	
	<?php
		require_once('submenu.php');
	?>
	
</section>


<section class="noticia_container">
	
<?php		
require_once "config/conectar.php";
//Agora é realizar a querie de busca no banco de dados	

$idNoticia = $_GET["news"];	
	
$sql = "SELECT * FROM noticias WHERE idnoticias = $idNoticia";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];			
		
		
		
			echo "
			
			<article class='noticia_completa'>

			<header class='topoNoticia'>

				<h1>$titulo </h1>
				<h2>$subtitulo</h2>
				<p>Autor da noticia</p>

			</header>

			<section class='corpo_noticia'>

				<img src='img/noticias/$img' alt='$img'>
				
				
				$texto

			</section>

		</article>
		
			";
}
?>	
	
			
	
</section>									
	
	
	
	
	
	
	
	
	
	
	
	
</main>


</body>
</html>