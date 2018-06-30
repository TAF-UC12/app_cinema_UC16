<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Notícia completa</title>
<!--METADADOS PARA HABILITAR QUERYS DE FORMATAÇÃO PARA SITE RESPONSIVO-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no>
<meta name="mobile-web-app-capable" content="yes">


<!--LINK DO ÍCONE A SER MOSTRADO NA BARRA DE ENDEREÇOS DO NAVEGADOR-->
<link rel="shortcut icon" href="img/icon48px.png">


<!--LINKS INTERNOS DAS FOLHAS DE ESTILO CSS UTILIZADAS NA PÁGINA-->
<link href="css/estilo_v2.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/index_v2.css" rel="stylesheet" type="text/css">
<link href="css/noticias_v2.css" rel="stylesheet" type="text/css">


<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script defer src="js/fontawesome/fontawesome-all.js"></script>


</head>

<body>
<main role="main">
	
<header>
	
	<div id="logo_topo">
		<img src="img/logo.png" alt="logo do site">
	</div>	
		
	<div id="barrabusca">
		
	</div>
							
	<?php
	
		include('menu.php');
	
	?>

</header>


<!--TÍTULO DE IDENTIFICAÇÃO DA PAGINA-->
<div class='categoriaPaginaNoticias'>

	<p><i class='fas fa-chevron-circle-left' onclick='goBack()'></i> &thinsp;&thinsp; Notícias</p>
	
	<script>
	function goBack() {
		window.history.back();
	}
	</script>


</div>	
	


<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	




<!--SECTION CONTAINER DO CONTÉUDO DA NOTÍCIA
	- Article com header e conteudo
	- Header com hgroup e info auto e post-->
<section>

	<?php
	
//PUXA O TIPO DE NOTÍCIA
$tipocategoria = $_GET["categoria"];
		
if ($tipocategoria == "Cinema"){$tabela = "filmes" and $coluna = "idfilmes";}
if ($tipocategoria == "Series"){$tabela = "series" and $coluna = "idseries";}	
if ($tipocategoria == "Games"){$tabela = "games" and $coluna = "idgames";}		
	
	
	
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
	$data = $linha["dataPost"];
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];
	$rel_evento = $linha["relac_evento"];
	$autor = $linha["nome"];
	$autorEmail = $linha["email"];
	$imgAutor = $linha["imgAutor"];
?>	

		<div id="tags">
			
			<li><?php echo "$tipocategoria";?></li>
			<li>Tag1</li>
			<li>Tag2</li>
			
		</div>

	<article id="noticia_completa">
		
		<header>
			
			<hggroup>
				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$subtitulo";?></h2>
			</hggroup>
			
			<div id="info_post">
				
				<div>
					
					<img src="img/colaboradores/<?php echo "$imgAutor";?>" alt="">

					<p>Notícia por: <?php echo "$autor";?></p>
					<p><?php echo "$autorEmail";?></p>	
				
				</div>
				
				<div>
					
					<p>Postado em: </p>
					<p><?php echo "$data";?></p>
					
				</div>
				
			</div>
			
		</header>
		
		<img src="img/noticias/<?php echo "$img";?>" alt="<?php echo "$img";?>">
		
		<p><?php echo "$texto";?></p>
		
	<?php	
	}
	?>
		
				
	</article>		
	
</section>		


<!--ASIDE COM SECTIONS COM INFO RELACIONADA A NOTÍCIA-->
<aside>
	
	<!--SECTION COM INFO RELACIONADA AO TITULO OU EVENTO-->
	<section>
	
	<?php

//SWITCH PUXA DADOS DE ACORDO COM O TIPO DE NOTÍCIA				

switch ($tipocategoria) {
		
    case "Cinema":
		
$sql2 = "SELECT * FROM $tabela WHERE $coluna = $rel_filme";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados cinema");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idfilmes"];
$titulo = $linha["titulo"];
$titoriginal = $linha["titulo_original"];
$poster = $linha["poster"];
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=filmes'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$titoriginal";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
	$sql4 = "SELECT * FROM noticias WHERE relac_filmes = $id AND idnoticias != $idNoticia ORDER BY idnoticias DESC LIMIT 3";	
	
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
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Cinema'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
}
?>
				
										
			</div>
		
	</section>

<?php		
		
	break;
		
		
		
	case "Series":	
		
		$sql2 = "SELECT * FROM series
		INNER JOIN emissoras
		ON series.canal = emissoras.idemissoras
		WHERE $coluna = $rel_serie";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 8");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idseries"];
$titulo = $linha["titulo"];
$emissora = $linha["nomeEmissora"];
$poster = $linha["poster"];	
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=<?php echo "$tabela";?>'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$emissora";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
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
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Series'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
	
}
?>
				
										
			</div>
		
	</section>

<?php	
		
break;	
		
	case "Games":
		
		$sql2 = "SELECT * FROM $tabela
				INNER JOIN desenvolvedoras
				ON $tabela.desenvolvedora = desenvolvedoras.iddesenvolvedoras
				WHERE $coluna = $rel_game";	
	

$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados game");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idgames"];
$titulo = $linha["tituloGame"];
$desenvolvedora = $linha["nomeDesenvolvedora"];	
$titoriginal = $linha["titulo_original"];
$poster = $linha["imgGame"];
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=<?php echo "$tabela";?>'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$desenvolvedora";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
	$sql4 = "SELECT * FROM noticias WHERE relac_games = $id AND idnoticias != $idNoticia ORDER BY idnoticias DESC LIMIT 3";	
	
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
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Cinema'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
}
?>
				
										
			</div>
		
	</section>
	

									
			</div>
		
	</section>

<?php	
		
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


<script src="js/aba_tipo_noticias.js"></script>

<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jquery-3.3.1.js"></script>	
			
</body>
</html>