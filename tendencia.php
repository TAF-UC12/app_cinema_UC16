<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

// atribui a uma variável $paginaLink toda a URL da página
$paginaLink = $_SERVER['SCRIPT_NAME'];

// atribui a variável $paginaLink apenas o nome da página
$paginaLink = basename($_SERVER['SCRIPT_NAME']);

$dataAtual = date('d/m/y');

$tendenciaA = $_GET["tendencia"];

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Tendência</title>
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
<link href="css/tendencia.css" rel="stylesheet" type="text/css">


<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
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
<div class='categoriaPaginaHome'>
	<p>Tendencia título</p>
</div>
				

<!--CONTAINER PARA A SECTION DO SLIDESHOW-->
<div id="topo_container">
	
	<section>
	
	<?php          
			 require_once "config/conectar.php";

			//Agora é realizar a querie de busca no banco de dados

			$sql = "SELECT * FROM tendencias
					WHERE idtendencias = $tendenciaA";


			$resultado = mysqli_query($strcon, $sql)
			or die ("Não foi possível realizar a consulta ao banco de dados de tendencia");

			// Agora iremos "pegar" cada campo da notícia
			// e organizar no HTML

			while ($linha=mysqli_fetch_array($resultado)) {
					
				$tendencia = $linha["nomeTendencia"];	
				$img = $linha["imgTendencia"];
		?>		
				
		<img src="img/tendencias/<?php echo "$img";?>" alt="">
		<h3><?php echo "$tendencia";?></h3>
		
		<div>
		
		
			
			<a href="#"><img src="img/posters/jurassicworld2.jpg" alt=""></a>
			
		</div>
		
		<?php
			}
		?>
		
		
	</section>
		

	</div>



<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	

	
<!--CADA SECTION É COMPOSTA POR TITULO, CONTEÚDO E LINK-->


<!--SECTION DE TENDENCIAS SOMENTE MOBILE-->
	<section class="destaques_mobile">

		<h2>Tendências</h2>

		<div id="tendencias_mobile">
			
			<?php		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM tendencias ORDER BY idtendencias DESC LIMIT 6";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtendencia = $linha["idtendencias"];	
					$tendencia = $linha["nomeTendencia"];	
					$img = $linha["imgTendencia"];
				?>	

						<div class='tendencia'>

							<a href='#'><img src='img/tendencias/<?php echo "$img";?>'><h4><?php echo "$tendencia";?></h4></a>
							
							
						</div>
			<?php			
				}
		?>		


		</div>


	</section>


<!--SECTION DE LANÇAMENTOS SOMENTE MOBILE-->
	<section class="destaques_mobile">
	
		<h2>Últimos lançamentos</h2>
		
		<p><a href='lancamentos.php?filtro_categoria=filmes'><i class='fas fa-plus'></i></a></p>
	
		<div id="lancamentos_mobile">
		
		
	<?php	
		
	
			$categoria = "filmes";
			$categoria3 = "series";
			$categoria2 = "games";
			
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM filmes
						WHERE filmes.lancamento BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["idfilmes"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
					$lancamento = $linha["lancamento"]	
						
				?>
		
		
		
			<div class='mobile_info'>

				<a href='ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo $idtitulo; ?>&categoria=<?php echo $categoria; ?>'><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
		
		<?php
				} //Fechamendo da query de cinema lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM series
						WHERE series.lancamento BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["idseries"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='mobile_info'>

				<a href="ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo $idtitulo; ?>&categoria=<?php echo $categoria3; ?>"><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
			
			
			<?php
				} //Fechamendo da query de series lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM games
						WHERE games.lancamentoGame BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["idgames"];	
					$titulo = $linha["tituloGame"];	
					$imgPoster = $linha["imgGame"];
				?>
		
			<div class='mobile_info'>

				<a href="ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo $idtitulo; ?>&categoria=<?php echo $categoria2; ?>"><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>

			<?php
					} //Fechamendo da query de games lançamentos
				?>
		
	</div>
	
</section>


<!--SECTION DE LISTA DE NOTÍCIAS-->
	<section>

		<h2>Últimas notícias</h2>
		
		<article class="lista_noticias">
			

			<?php
				include "config/conectar.php";
				$qtde_registros = 10;
				@$page = $_GET['pag'];
				if(!$page){
					$pagina = 1;
				}else{
					$pagina = $page;
				}

				$inicio = $pagina  - 1;
				$inicio = $inicio * $qtde_registros;
				$sel_parcial = mysqli_query($strcon,"SELECT * FROM noticias
						INNER JOIN tipoPostagem
						ON noticias.tipo = tipoPostagem.idtipoPostagem
						INNER JOIN login
						ON noticias.autorPost = login.idlogin
						ORDER BY idnoticias DESC LIMIT $inicio, $qtde_registros");

				$sel_total = mysqli_query($strcon,"SELECT * FROM noticias
						INNER JOIN tipoPostagem
						ON noticias.tipo = tipoPostagem.idtipoPostagem
						INNER JOIN login
						ON noticias.autorPost = login.idlogin");

				$contar = mysqli_num_rows($sel_total);
				$contar_pages = $contar / $qtde_registros;
				//echo $contar_pages;

				while($linha  = mysqli_fetch_array($sel_parcial)){
						$idnoticia = $linha["idnoticias"];	
						$titulo = $linha["tituloNoticia"];
						$subtitulo = $linha["subtitulo"];
						$texto = $linha["texto"];	
						$img = $linha["img"];
						$tipo = $linha["tipoPost"];	
						$id_tipo_post = $linha["idtipoPostagem"];
						$data = $linha["dataPost"];
						$autor = $linha["nome"];
					
						//Data devidamente configurada
						$datapost = substr($data,8,2) . "/" .substr($data,5,2) . 
						"/" . substr($data,0,4);
					

				if ($id_tipo_post == 1){$tipo_categoria = "Cinema";}
				if ($id_tipo_post == 2){$tipo_categoria = "Games";}
				if ($id_tipo_post == 3){$tipo_categoria = "Series";}

				if ($tipo == 1){$tipo_icon = "<i class='fas fa-film'></i>";}
				if ($tipo == 2){$tipo_icon = "<i class='fas fa-gamepad'></i>";}
				if ($tipo == 3){$tipo_icon = "<i class='fas fa-tv'></i>";}
					
				if ($id_tipo_post == 1){$tipo_categoria = "Cinema"; $link_pg_categoria = "noticia_cinema.php";}
				if ($id_tipo_post == 2){$tipo_categoria = "Games"; $link_pg_categoria = "noticia_games.php";}
				if ($id_tipo_post == 3){$tipo_categoria = "Series"; $link_pg_categoria = "noticia_series.php";}	

		?>


			<div class='noticia'>

					<div class='imgNoticia'>
						<img src='img/noticias/<?php echo $img; ?>' alt='<?php echo $img; ?>'>

					</div>

					<div class='infoNoticiaContainer'>
						<div class='infoNoticia'>

							<button type='button' class='<?php echo $tipo_categoria; ?>'><?php echo $tipo_icon; ?></button>

							<p><i class="far fa-calendar-alt"></i> <?php echo $datapost; ?> &thinsp;&thinsp;&thinsp;&thinsp;<i class="fas fa-user"></i> <?php echo $autor; ?></p>

						</div>

						<div class='chamadaNoticia'>
							<p><a href='<?php echo $link_pg_categoria; ?>?news=<?php echo $idnoticia; ?>&categoria=<?php echo $tipo; ?>&titulo=<?php echo $titulo; ?>'><?php echo $titulo; ?></a></p>
						</div>

					</div>

				</div>

	   <?php
		 }	

		$anterior = $pagina - 1;
		$proximo = $pagina + 1;

		echo "<div class='pg_seletor'>";
		if($pagina > 1){
			echo "<a href=?pag=$anterior> <i class='fas fa-angle-left'></i> </a>";
		}

		for($i = 1;$i<$contar_pages+1;$i++){
			echo "<a href=?pag=".$i.">".$i."</a>";
		}

		if($pagina < $contar_pages){
			echo "<a href=?pag=$proximo> <i class='fas fa-angle-right'></i> </a>";
		}
		echo "</div>";	
		?>

		</article>	

	</section>	
	
	


<!--ASIDE COM SECTIONS DE LANÇAMENTOS E TENTENCIAS DESKTOP-->
	<aside>
		
		<section class="destaques_desktop">

			<h2>Tendências</h2>

			<div id="tendencias_desktop">

				<?php		
					require_once "config/conectar.php";

					//Agora é realizar a querie de busca no banco de dados

					$sql = "SELECT * FROM tendencias ORDER BY idtendencias DESC LIMIT 6";	

					$resultado = mysqli_query($strcon, $sql)
					or die ("Não foi possível realizar a consulta ao banco de dados");

					while ($linha=mysqli_fetch_array($resultado)) {

						$idtendencia = $linha["idtendencias"];	
						$tendencia = $linha["nomeTendencia"];	
						$img = $linha["imgTendencia"];
					?>	

							<div class='tendencia'>

								<a href='#'><img src='img/tendencias/<?php echo "$img";?>'><h4><?php echo "$tendencia";?></h4></a>


							</div>
				<?php			
					}
			?>		


			</div>


		</section>

		<section class="destaques_desktop">
	
			<h2>Últimos lançamentos</h2>

			<p><a href='lancamentos.php?filtro_categoria=filmes'><i class='fas fa-plus'></i></a></p>

			<div id="lancamentos_desktop">

				<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM filmes
						WHERE filmes.lancamento BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["idfilmes"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='desktop_info'>

				<a href='ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo $idtitulo; ?>&categoria=<?php echo $categoria; ?>'><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
		
		<?php
				} //Fechamendo da query de cinema lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM series
						WHERE series.lancamento BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["idseries"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='desktop_info'>

				<a href="ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo $idtitulo; ?>&categoria=<?php echo $categoria3; ?>"><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
			
			
			<?php
				} //Fechamendo da query de series lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM games
						WHERE games.lancamentoGame BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["idgames"];	
					$titulo = $linha["tituloGame"];	
					$imgPoster = $linha["imgGame"];
				?>
		
			<div class='desktop_info'>

				<a href="ficha_tecnica.php?titulo=<?php echo $titulo; ?>&selecionado=<?php echo $idtitulo; ?>&categoria=<?php echo $categoria2; ?>"><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>

			<?php
					} //Fechamendo da query de games lançamentos
				?>
				
				

			</div>
	
	
		</section>
		
	</aside>
	
	
	
</div> <!--FIM DO CORPO DO SITE-->	
	



<!--MENU INFERIOR SOMENTE VISÍVEL NAS VERSOES MOBILE-->		
<div id="submenu_inferior">
	
	<?php
		require('submenu.php');
	?>
	
</div>


<!--FOOTER SOMENTE VISIVEL NA VERSÃO DESKTOP
	MOBILE E TELAS MENORES ELE FICA OCULTO PELO MENU INFERIOR-->		
<footer>
	
	<div id="logo_rodape">
		<img src="img/logo.png" alt="logo do site">
	</div>
	
	<div id="rodape_info">
		<p>2018 Todos os diretos reservados</p>
	</div>		
		
</footer>	

		
</main>



<!--SCRIPT JS DO SERVICE WORKER
	Chama script que habilita o service_worker.js-->
	
<script src="js/chama_service-worker.js"></script>

<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
	<script src="js/jquery-3.3.1.js" type="text/javascript"></script>	

</body>

</html>