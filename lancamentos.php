<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Títulos</title>
<!--METADADOS PARA HABILITAR QUERYS DE FORMATAÇÃO PARA SITE RESPONSIVO-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no>
<meta name="mobile-web-app-capable" content="yes">


<!--LINK DO ÍCONE A SER MOSTRADO NA BARRA DE ENDEREÇOS DO NAVEGADOR-->
<link rel="shortcut icon" href="img/icon48px.png">


<!--LINKS INTERNOS DAS FOLHAS DE ESTILO CSS UTILIZADAS NA PÁGINA-->
<link href="css/estilo_v2.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/lancamentos_v2.css" rel="stylesheet" type="text/css">

<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
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


<!--TÍTULO DE IDENTIFICAÇÃO DA CATEGORIA SENDO PESQUISADA-->
	<div class='categoriaPaginaLancamentos'>

	<?php
	$categoria = $_GET["filtro_categoria"];
	
	if ($categoria == "filmes"){$tipo = "Cinema";}
	if ($categoria == "series"){$tipo = "Series";}
	if ($categoria == "games"){$tipo = "Games";}
	
?>

		<p><i class='fas fa-chevron-circle-left' onclick='goBack()'></i> &thinsp;&thinsp; Títulos em <?php echo "<b>$tipo</b>"; ?></p>
		
		<script>
		function goBack() {
			window.history.back();
		}
		</script>

	</div>	


<!--SECTION PARA FILTRO DE TITULOS-->
<section>
	
	<?php
	
		require_once('filtro_titulos.php');
	
	?>	
	
</section>


<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	


<!--SECTION LISTA DE TÍTULOS-->
<section>
<div id="lancamentos_lista">

	
<?php		
require_once "config/conectar.php";
//Agora é realizar a querie de busca no banco de dados	

$filtro_categoria = $_GET["filtro_categoria"];	
$filtro_genero = $_GET["filtro_genero"];	
$filtro_mes = $_GET["filtro_mes"];	
	
switch ($filtro_categoria) {
		
    case "filmes":
        

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
    $sel_parcial = mysqli_query($strcon,"SELECT * FROM filmes ORDER BY idfilmes DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM filmes");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;
    
    while($linha  = mysqli_fetch_array($sel_parcial)){
            $id = $linha["idfilmes"];	
			$titulo = $linha["titulo"];
			$titoriginal = $linha["titulo_original"];
			$poster = $linha["poster"];	
			$estreia = $linha["lancamento"];
			$elenco = $linha["elenco"];	
			$sinopse = $linha["sinopse"];
			$diretor = $linha["diretor"];
			$pais = $linha["paisOrigem"];
			$imgFundo = $linha["imgFundo"];
			$trailer = $linha["trailer"];	
		
	?>
		
	<div id='titulo_container'>

					
					
	<div class='titulo_poster'>
				
		<a href='ficha_tecnica.php?selecionado=<?php echo $id; ?>&categoria=<?php echo $categoria; ?>'>
					
			<img src='img/posters/<?php echo $poster;?>'>
						
		</a>

	</div>

	<article>
		<hgroup>
			<h1><?php echo "$titulo"; ?></h1>
			<h2><?php echo "$titoriginal"; ?></h2>
		<hgroup>
		
		<div>
		
			<p><span>Lançamento: </span> <?php echo "$estreia"; ?></p>

		</div>
					
		<div>
		
			<p><span>Direção: </span> <?php echo "$diretor"; ?></p>
			
		</div>

	</article>
				
</div>	
		
		
		
	<?php		
			
	}
		
	break;
	
	case "series":
        

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
    $sel_parcial = mysqli_query($strcon,"SELECT * FROM series
			ORDER BY idseries DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM series");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;
    
    while($linha  = mysqli_fetch_array($sel_parcial)){
            $id = $linha["idseries"];	
			$titulo = $linha["titulo"];
			$poster = $linha["poster"];	
			$estreia = $linha["lancamento"];
			$elenco = $linha["elenco"];	
			$pais = $linha["paisOrigem"];
			$imgFundo = $linha["imgFundo"];
			$trailer = $linha["trailer"];	
		
		?>
	
<div id='titulo_container'>

					
					
	<div class='titulo_poster'>
				
		<a href='ficha_tecnica.php?selecionado=<?php echo $id; ?>&categoria=<?php echo $categoria; ?>'>
					
			<img src='img/posters/<?php echo $poster;?>'>
						
		</a>

	</div>

	<article>
		<hgroup>
			<h1><?php echo "$titulo"; ?></h1>
			<h2><?php echo "$titoriginal"; ?></h2>
		<hgroup>
		
		<div>
		
			<p><span>Lançamento: </span> <?php echo "$estreia"; ?></p>

		</div>
					
		<div>
		
			<p><span>Elenco: </span> </p><p><?php echo "$elenco"; ?></p>
			
		</div>

	</article>
				
</div>




	<?php		
			
	}
		
	break;	
	
	
	case "games":
        

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
    $sel_parcial = mysqli_query($strcon,"SELECT * FROM games
				INNER JOIN desenvolvedoras
				ON games.desenvolvedora = desenvolvedoras.iddesenvolvedoras 
				ORDER BY idgames DESC LIMIT $inicio, $qtde_registros");
	
    $sel_total = mysqli_query($strcon,"SELECT * FROM games");
    
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtde_registros;
    //echo $contar_pages;
    
    while($linha  = mysqli_fetch_array($sel_parcial)){
            $id = $linha["idgames"];	
			$titulo = $linha["tituloGame"];
			$desenvolvedora = $linha["nomeDesenvolvedora"];
			$poster = $linha["poster"];	
			$estreia = $linha["lancamentoGame"];
			$elenco = $linha["elenco"];	
			$sinopse = $linha["sinopseGame"];
			$diretor = $linha["diretor"];
			$pais = $linha["paisOrigem"];
			$poster = $linha["imgGame"];
			$trailer = $linha["trailer"];	
		
	?>
		
<div id='titulo_container'>

					
					
	<div class='titulo_poster'>
				
		<a href='ficha_tecnica.php?selecionado=<?php echo $id; ?>&categoria=<?php echo $categoria; ?>'>
					
			<img src='img/posters/<?php echo $poster;?>'>
						
		</a>

	</div>

	<article>
		<hgroup>
			<h1><?php echo "$titulo"; ?></h1>
			<h2><?php echo "$titoriginal"; ?></h2>
		<hgroup>
		
		<div>
		
			<p><span>Lançamento: </span> <?php echo "$estreia"; ?></p>

		</div>
					
		<div>
		
			<p><span>Desenvolvedora: </span> <?php echo "$desenvolvedora"; ?></p>
			
		</div>

	</article>
				
</div>
		
		
			
	<?php		
			
	}
		
	break;	
		
	?>
 	
	
</div>

  <?php
     }	
	
	$anterior = $pagina - 1;
    $proximo = $pagina + 1;
    
    echo "<div class='pg_seletor'>";
    if($pagina > 1){
        echo "<a href=?pag=$anterior&filtro_categoria=$filtro_categoria> <i class='fas fa-angle-left'></i> </a>";
    }
    
    for($i = 1;$i<$contar_pages+1;$i++){
        echo "<a href=?pag=".$i."&filtro_categoria=$filtro_categoria>".$i."</a>";
    }
    
    if($pagina < $contar_pages){
        echo "<a href=?pag=$proximo&filtro_categoria=$filtro_categoria> <i class='fas fa-angle-right'></i> </a>";
    }
	echo "</div>";	
    ?>																		
	
</section>
	
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
<body>
