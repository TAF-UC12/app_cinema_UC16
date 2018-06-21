
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
	
	<div id="logo_topo">
		<img src="img/logo.png" alt="logo do site" class="logo">
	</div>	
	
	<div id="menu_topo">		
	<?php
	
		include('menu.php');
	
	?>
	</div>	
	

</header>

	<div class='categoriaPaginaNoticias'>

		<h2><i class='fas fa-chevron-circle-left' onclick='goBack()'></i> &thinsp;&thinsp;&thinsp;&thinsp;Notícias</h2>
		
		<script>
		function goBack() {
			window.history.back();
		}
		</script>

	</div>			
					

<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	



<section class="noticias_container">
	
<?php		
require_once "config/conectar.php";
//Agora é realizar a querie de busca no banco de dados	

$idNoticia = $_GET["news"];	
	
$sql = "SELECT * FROM noticias
		INNER JOIN login
		ON noticias.autorPost = login.idlogin
		WHERE idnoticias = $idNoticia";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];
	$rel_evento = $linha["relac_evento"];
	$autor = $linha["nome"];	
	
		
		
		
			echo "
			<article class='noticia_completa'>

			<div class='topoNoticia'>

				<h1>$titulo</h1>
				<h2>$subtitulo</h2>
				<p><i class='fas fa-user'></i> $autor</p>

			</div>

			<section class='corpo_noticia'>

				<img src='img/noticias/$img' alt='$img'>
				
				
				$texto

			</section>

		</article>
		
			";
}
?>	
	
			
	
</section>
									

<aside class="categorias_lancamento_container">
	
	<?php
require_once "config/conectar.php";
	
$tipocategoria = $_GET["categoria"];
		
if ($tipocategoria == "Cinema"){$tabela = "filmes" and $coluna = "idfilmes";}
if ($tipocategoria == "Series"){$tabela = "series" and $coluna = "idseries";}	
if ($tipocategoria == "Games"){$tabela = "games" and $coluna = "idgames";}
	

switch ($tipocategoria) {
		
    case "Cinema":	

	
$sql2 = "SELECT * FROM $tabela WHERE $coluna = $rel_filme";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 3");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idfilmes"];
$titulo = $linha["titulo"];
$titoriginal = $linha["titulo_original"];
$poster = $linha["poster"];	
	
	
	echo "<div class='info_relacionado'>
		
		<div class='poster_relacionado'><img src='img/posters/$poster' alt=''></div>
		<div class='info'>
			
			<h1>$titulo</h1>
			<h2>$titoriginal</h2>
			
			<div class='fichaTecnica'>

				<a href='ficha_tecnica.php?selecionado=$id&categoria=filmes'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Info</button></a>

			</div>
			
		</div>
		
	</div>
	
	<div class='noticias_relacionadas_container'>
		
		<p>Notícias sobre $titulo</p>";
			
$sql4 = "SELECT * FROM noticias WHERE relac_filmes = $id";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];				
			
		
		echo "<div class='noticia_relacionada'>
			
			<img src='img/noticias/$img' alt=''>
			<a href='noticia.php?news=$idnoticia&categoria=Cinema'><h1>$titulo</h1></a>
			
		</div>
		
	</div>";
}
}

	 break;
		
	 case "Series":	

		$sql2 = "SELECT * FROM series
		INNER JOIN emissoras
		ON series.canal = emissoras.idemissoras
		WHERE $coluna = $rel_serie";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 5");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idseries"];
$titulo = $linha["titulo"];
$emissora = $linha["nomeEmissora"];
$poster = $linha["poster"];	
	
	
	echo "<div class='info_relacionado'>
		
		<div class='poster_relacionado'><img src='img/posters/$poster' alt=''></div>
		<div class='info'>
			
			<h1>$titulo</h1>
			<h2>$emissora</h2>
			
			<div class='fichaTecnica'>

				<a href='ficha_tecnica.php?selecionado=$id&categoria=series'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Info</button></a>

			</div>
			
		</div>
		
	</div>
	
	<div class='noticias_relacionadas_container'>
		
		<p>Notícias sobre $titulo</p>";
			
$sql4 = "SELECT * FROM `noticias`
		 INNER JOIN series
		 ON noticias.relac_series = series.idseries
		 WHERE relac_series = $id AND idnoticias != $idNoticia ORDER BY idnoticias DESC
		 LIMIT 3";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados 666");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];				
			
		
		echo "<div class='noticia_relacionada'>
			
			<img src='img/noticias/$img' alt=''>
			<a href='noticia.php?news=$idnoticia&categoria=Series'><h1>$titulo</h1></a>
			
		</div>
		
	</div>";
}
}
	
	break;
		
	case "Games":	

		$sql2 = "SELECT * FROM $tabela
				INNER JOIN desenvolvedoras
				ON $tabela.desenvolvedora = desenvolvedoras.iddesenvolvedoras
				WHERE $coluna = $rel_game";	
		
		
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 6");
	
while ($linha=mysqli_fetch_array($resultado)) {


$id = $linha["idgames"];
$titulo = $linha["tituloGame"];
$desenvolvedora = $linha["nomeDesenvolvedora"];	
$titoriginal = $linha["titulo_original"];
$poster = $linha["imgGame"];	
	
	
	echo "<div class='info_relacionado'>
		
		<div class='poster_relacionado'><img src='img/posters/$poster' alt=''></div>
		<div class='info'>
			
			<h1>$titulo</h1>
			<h2>$desenvolvedora</h2>
			
			<div class='fichaTecnica'>

				<a href='ficha_tecnica.php?selecionado=$id&categoria=games'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Info</button></a>

			</div>
			
		</div>
		
	</div>
	
	<div class='noticias_relacionadas_container'>
		
		<p>Notícias sobre $titulo</p>";
			
$sql4 = "SELECT * FROM noticias WHERE relac_games = $id";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];				
			
		
		echo "<div class='noticia_relacionada'>
			
			<img src='img/noticias/$img' alt=''>
			<a href='noticia.php?news=$idnoticia&categoria=Games'><h1>$titulo</h1></a>
			
		</div>
		
	</div>";
}
}	
	
	break;	
		
}
?>
	
</aside>
																			
	
</div> <!--FIM DO CORPO DO SITE-->	

<div id="submenu_inferior">
	
	<?php
		require('submenu.php');
	?>
	
</div>	
		
				
<footer>
	
	<div id="logo_rodape">
		<img src="img/logo.png" alt="logo do site">
	</div>
	
	<div id="rodape_info">
		<p>2018 Todos os diretos reservados</p>
	</div>		
		
</footer>	
	
	
	
	
	
</main>


</body>
</html>