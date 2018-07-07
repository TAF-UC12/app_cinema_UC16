<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

// atribui a uma variável $categoria para menud e filtro
$categoria = $_GET["tipo"];

$titulo_aba_bavegador = $_GET["titulo"];

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Cinema: <?php echo "$titulo_aba_bavegador";?></title>

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
		WHERE noticias.idnoticias = $idNoticia";	
	
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
			
			<li id="tag<?php echo "$tipocategoria";?>"><?php echo "$tipocategoria";?></li>
<?php				
			
		$sql10 = "SELECT nomeTag FROM tags
				INNER JOIN tags_has_noticias
				ON tags.idtags = tags_has_noticias.tags_idtags
				INNER JOIN noticias
				ON noticias.idnoticias = tags_has_noticias.noticias_idnoticias
				WHERE noticias.idnoticias = $idNoticia";	
	
	$resultado = mysqli_query($strcon, $sql10)
	or die ("Não foi possível realizar a consulta ao banco de dados");

	while ($linha=mysqli_fetch_array($resultado)) {

		$tags = $linha["nomeTag"];	

	?>		
			
			
			
			<li><?php echo "$tags";?></li>
	<?php
	}
		?>
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
	
	<!--COMENTÁRIOS, COD DO DISCUS-->	
	<div id="comentarios_container">
		
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://cineontherocks.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		
		
		
		
	</div>					
	
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
		
			<a href='ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo "$id";?>&categoria=filmes'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<p><?php echo "$titoriginal";?></p>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h2>Notícias sobre <?php echo "$titulo";?></h2>
					
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
	
	if ($id_tipo_post == 1){$tipo_categoria = "Cinema"; $link_pg_categoria = "noticia_cinema.php";}
	if ($id_tipo_post == 2){$tipo_categoria = "Games"; $link_pg_categoria = "noticia_games.php";}
	if ($id_tipo_post == 3){$tipo_categoria = "Series"; $link_pg_categoria = "noticia_series.php";}
		
	if ($tipo == 1){$tipo_icon = "<i class='fas fa-film'></i>";}
	if ($tipo == 2){$tipo_icon = "<i class='fas fa-gamepad'></i>";}
	if ($tipo == 3){$tipo_icon = "<i class='fas fa-tv'></i>";}
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='<?php echo $link_pg_categoria; ?>?news=<?php echo $idnoticia; ?>&categoria=Cinema&titulo=<?php echo $titulo; ?>'><h1><?php echo "$titulo";?></h1></a>

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
				<p><?php echo "$emissora";?></p>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h2>Notícias sobre <?php echo "$titulo";?></h2>
					
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
					INNER JOIN publicadoras
					ON games.publicadora = publicadoras.idpublicadora
					INNER JOIN games_has_consoles
					ON games.idgames = games_has_consoles.games_idgames
					INNER JOIN consoles
					ON games_has_consoles.consoles_idconsoles = consoles.idconsoles
					WHERE $coluna = $rel_game LIMIT 1";	
	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados game");

		while ($linha=mysqli_fetch_array($resultado)) {

		$id = $linha["idgames"];
		$titulo = $linha["tituloGame"];
		$desenvolvedora = $linha["nomeDesenvolvedora"];	
		$publicadora = $linha["nomePublicadora"];
		$lancamento = $linha["lancamentoGame"];
		$poster = $linha["imgGame"];
			
?>	


		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=<?php echo "$tabela";?>'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<p><?php echo "$lancamento";?></p>
				<p><?php echo "$desenvolvedora";?></p>
				<p><?php echo "$publicadora";?></p>			

			</div>
		
		</div>

<?php
} //fecgamento do switch geral
?>		
		
		
		
					
										
														
																				
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h2>Notícias sobre <?php echo "$titulo";?></h2>
					
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


<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jquery-3.3.1.js"></script>	
<script src="js/aba_tipo_noticias.js"></script>		
			
</body>
</html>