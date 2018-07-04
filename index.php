<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Home app</title>
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



<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<link rel="manifest" href="manifest.json">
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<script defer src="js/fontawesome/fontawesome-all.js"></script>


<!--LINKS PARA HABILITAR PWA-->
<link rel="manifest" href="manifest.json">


<!--SCRIPT JS PARA FUNCIONAMENTO DO SLIDER DA PÁGINA-->
<script src="js/slideshow.js"></script>


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
	<p>Home</p>
</div>
				

<!--CONTAINER PARA A SECTION DO SLIDESHOW-->
<div id="topo_slides_container">

		<!--ESTA SECTION SÓ TEM O SLIDER-->
		<section>



			<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
			<!-- Loading Screen -->
			<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
				<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
			</div>

			<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">

		
	<?php          
			 require_once "config/conectar.php";

			//Agora é realizar a querie de busca no banco de dados

			$sql = "SELECT * FROM noticias WHERE destaque = 'on' ORDER BY 
			idnoticias DESC LIMIT 3";


			$resultado = mysqli_query($strcon, $sql)
			or die ("Não foi possível realizar a consulta ao banco de dados");

			// Agora iremos "pegar" cada campo da notícia
			// e organizar no HTML

			while ($linha=mysqli_fetch_array($resultado)) {

			$id = $linha["idnoticias"];	
			$titulo = $linha["tituloNoticia"];
			$subtitulo = $linha["subtitulo"];
			$imgDestaque = $linha["imgDestaque"];	
		
		?>
						<div data-p='225.00'>
							<img data-u='image' src='img/slideshow/<?php echo "$imgDestaque" ?>' />

							<article>
								<hgroup>
									<h1><?php echo "$titulo" ?></h1>
									<h2><?php echo "$subtitulo" ?></h2>
								</hgroup>

								<a href='noticia.php?news=<?php echo "$id" ?>&pgtitulo=<?php echo "$titulo" ?>'><i class='fas fa-arrow-circle-right'></i> Continuar lendo</a>

							</article>

						</div>	          

			 <?php        			        
}
		
			?>
			
			</div>
				
				
				
			<!-- Bullet Navigator -->
			<div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;left:150px;" data-scale="0.5" data-scale-bottom="0.75">
				<div data-u="prototype" class="i" style="width:16px;height:16px;">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<circle class="b" cx="8000" cy="8000" r="5800"></circle>
					</svg>
				</div>
			</div>

		</div>

		<script type="text/javascript">jssor_1_slider_init();</script>
		<!-- #endregion Jssor Slider End -->

		</section>
		<!--FIM DA SECTION QUE SÓ TEM O SLIDER-->

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
				
				$sql = "SELECT * FROM tendencias ORDER BY idtendencias LIMIT 6";	

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
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM lancamentos
						INNER JOIN lancamentos_has_filmes
						ON lancamentos.idlancamentos = lancamentos_has_filmes.lancamentos_idlancamentos
						INNER JOIN filmes
						ON lancamentos_has_filmes.filmes_idfilmes = filmes.idfilmes
						ORDER BY lancamentos.idlancamentos ASC LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["filmes_idfilmes"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='mobile_info'>

				<a href=""><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
		
		<?php
				} //Fechamendo da query de cinema lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM lancamentos
						INNER JOIN lancamentos_has_series
						ON lancamentos.idlancamentos = lancamentos_has_series.lancamentos_idlancamentos
						INNER JOIN series
						ON lancamentos_has_series.series_idseries = series.idseries
						ORDER BY lancamentos.idlancamentos ASC LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["series_idseries"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='mobile_info'>

				<a href=""><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
			
			
			<?php
				} //Fechamendo da query de series lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM lancamentos
						INNER JOIN lancamentos_has_games
						ON lancamentos.idlancamentos = lancamentos_has_games.lancamentos_idlancamentos
						INNER JOIN games
						ON lancamentos_has_games.games_idgames = games.idgames
						ORDER BY lancamentos.idlancamentos ASC LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["games_idgames"];	
					$titulo = $linha["tituloGame"];	
					$imgPoster = $linha["imgGame"];
				?>
		
			<div class='mobile_info'>

				<a href=""><img src='img/posters/<?php echo "$imgPoster";?>'></a>

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

							<p><i class="far fa-calendar-alt"></i> <?php echo $data; ?> &thinsp;&thinsp;&thinsp;&thinsp;<i class="fas fa-user"></i> <?php echo $autor; ?></p>

						</div>

						<div class='chamadaNoticia'>
							<p><a href='<?php echo $link_pg_categoria; ?>?news=<?php echo $idnoticia; ?>&categoria=<?php echo $tipo; ?>'><?php echo $titulo; ?></a></p>
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

					$sql = "SELECT * FROM tendencias ORDER BY idtendencias LIMIT 6";	

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
				
				$sql = "SELECT * FROM lancamentos
						INNER JOIN lancamentos_has_filmes
						ON lancamentos.idlancamentos = lancamentos_has_filmes.lancamentos_idlancamentos
						INNER JOIN filmes
						ON lancamentos_has_filmes.filmes_idfilmes = filmes.idfilmes
						ORDER BY lancamentos.idlancamentos ASC LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["filmes_idfilmes"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='desktop_info'>

				<a href=""><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
		
		<?php
				} //Fechamendo da query de cinema lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM lancamentos
						INNER JOIN lancamentos_has_series
						ON lancamentos.idlancamentos = lancamentos_has_series.lancamentos_idlancamentos
						INNER JOIN series
						ON lancamentos_has_series.series_idseries = series.idseries
						ORDER BY lancamentos.idlancamentos ASC LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["series_idseries"];	
					$titulo = $linha["titulo"];	
					$imgPoster = $linha["poster"];
				?>
		
		
		
			<div class='desktop_info'>

				<a href=""><img src='img/posters/<?php echo "$imgPoster";?>'></a>

			</div>
			
			
			<?php
				} //Fechamendo da query de series lançamentos
			?>
		
		<?php	
		
				require_once "config/conectar.php";
			
				//Agora é realizar a querie de busca no banco de dados
				
				$sql = "SELECT * FROM lancamentos
						INNER JOIN lancamentos_has_games
						ON lancamentos.idlancamentos = lancamentos_has_games.lancamentos_idlancamentos
						INNER JOIN games
						ON lancamentos_has_games.games_idgames = games.idgames
						ORDER BY lancamentos.idlancamentos ASC LIMIT 2";	

				$resultado = mysqli_query($strcon, $sql)
				or die ("Não foi possível realizar a consulta ao banco de dados");

				while ($linha=mysqli_fetch_array($resultado)) {

					$idtitulo = $linha["games_idgames"];	
					$titulo = $linha["tituloGame"];	
					$imgPoster = $linha["imgGame"];
				?>
		
			<div class='desktop_info'>

				<a href=""><img src='img/posters/<?php echo "$imgPoster";?>'></a>

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