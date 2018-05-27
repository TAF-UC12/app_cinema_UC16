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
			
			<div id='filme_info'>
		
				<div id='poster_filme'>

					<img src='img/posters/$poster'>

				</div>

				<div id='info'>

					<h1>$titulo</h1>
					<h2>$titoriginal</h2>

					<div>
						<h3>Lançamento </h3>
						<p>$estreia</p>
					</div>
					
					<div>
						<h3>Direção </h3>
						<p>$diretor</p>
					</div>
					
					<div class='fichaTecnica'>

						<a href='filme.php?filme=$idfilme'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Ficha técnica</button></a>

					</div>

				</div>
								
		
	</div>";
}
?>	

<article class="noticia_completa">

	<header class="topoNoticia">
		
		<h1>Titulo noticia</h1>
		<h2>Subtitulo da noticia</h2>
		<p>Autor da noticia</p>
		
	</header>
	
	<section class="corpo_noticia">
		
		<img src="img/noticias/handmaids.jpg" alt="">
		
		
		
	</section>
	
</article>	
			
	
</section>									
	
	
	
	
	
	
	
	
	
	
	
	
</main>


</body>
</html>