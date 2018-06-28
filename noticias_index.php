<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Notícias</title>
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
<link href="css/noticias_index_v2.css" rel="stylesheet" type="text/css">


<!--ARQUIVO MANIFEST DE CONFIGURAÇÃO PARA PWA-->
<link rel="manifest" href="./manifest.json">


<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<script defer src="js/fontawesome/fontawesome-all.js"></script>


<style>
.noticia_selecionado { background-color: aqua; }	
</style>


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

	<p><i class='fas fa-chevron-circle-left' onclick='goBack()'></i> &thinsp;&thinsp; Últimas notícias</p>
	
	<script>
	function goBack() {
		window.history.back();
	}
	</script>


</div>	
	
	
<!--SECTION PARA FILTRO DE TITULOS-->	
<section>
	
	<?php
		require_once('filtro_noticias.php');
	?>
	
</section>


<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	

<section>
	
    <article>
    	<h2>Últimas notícias</h2>
    	
	    <?php
	
	$categoria = $_GET["tipo"];	
		
	switch ($categoria)	{
		
		case "1":
			
    include "config/conectar.php";
    $qtde_registros = 6;
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
			WHERE tipo = $categoria
			ORDER BY idnoticias DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			INNER JOIN login
			ON noticias.autorPost = login.idlogin
			WHERE tipo = $categoria");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;
    
	break;
		
		case "2":	
		
		include "config/conectar.php";
    $qtde_registros = 6;
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
			WHERE tipo = $categoria
			ORDER BY idnoticias DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			INNER JOIN login
			ON noticias.autorPost = login.idlogin
			WHERE tipo = $categoria");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;
		
	break;
		
		case "3":
			
		include "config/conectar.php";
    $qtde_registros = 6;
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
			WHERE tipo = $categoria
			ORDER BY idnoticias DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM noticias
			INNER JOIN tipoPostagem
			ON noticias.tipo = tipoPostagem.idtipoPostagem
			INNER JOIN login
			ON noticias.autorPost = login.idlogin
			WHERE tipo = $categoria");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;	
			
	break;
			
		default;
			
			include "config/conectar.php";
    $qtde_registros = 6;
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
			
	}
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
						<p><a href='noticias.php?news=<?php echo $idnoticia; ?>&categoria=<?php echo $tipo; ?>'><?php echo $titulo; ?></a></p>
					</div>

				</div>

			</div>
   
   
   
   
   <?php
     }	
	
	$anterior = $pagina - 1;
    $proximo = $pagina + 1;
    
    echo "<div class='pg_seletor'>";
    if($pagina > 1){
        echo "<a href=?pag=$anterior&tipo=$categoria> <i class='fas fa-angle-left'></i> </a>";
    }
    
    for($i = 1;$i<$contar_pages+1;$i++){
        echo "<a href=?pag=".$i."&tipo=$categoria>".$i."</a>";
    }
    
    if($pagina < $contar_pages){
        echo "<a href=?pag=$proximo&tipo=$categoria> <i class='fas fa-angle-right'></i> </a>";
    }
	echo "</div>";	
    ?>
		
		</article>	
	
</section>	


<!--ASIDE COM SECTIONS DE LANÇAMENTOS E TENTENCIAS DESKTOP-->
	<aside class="categorias_lancamento_container">
		
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
		
		<p><a href='ficha_tecnica.php?selecionado=$id&categoria=filmes'><i class='fas fa-plus'></i> Todos</button></a></p>
	
		<div id="lancamentos_desktop">
		
			<div class='desktop_info'>

				<a href=""><img src='img/posters/2001.jpg'></a>

			</div>
		
		<div class='desktop_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='desktop_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='desktop_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
		<div class='desktop_info'>

			<a href=""><img src='img/posters/2001.jpg'></a>

		</div>
		
	</div>
	
	
</section>
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

<script src="js/chama_service-worker.js"></script>
<script src="js/aba_tipo_noticias.js"></script>
	
</body>
</html>