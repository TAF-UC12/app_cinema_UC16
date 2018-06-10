<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lançamentos</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/lancamentos.css" rel="stylesheet" type="text/css">
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

	<div class='categoriaPaginaLancamentos'>

		<h2><i class='fas fa-angle-left' onclick='goBack()'></i> Lançamentos</h2>
		
		<script>
		function goBack() {
			window.history.back();
		}
		</script>

	</div>			
					

<section class="submenu">
	
	<?php
		require_once('filtro.php');
	?>
	
</section>


<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	

<section class="lancamentos_container">
<div class="lancamentos_lista">

	
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
		
	
	echo "<div id='filme_info'>

					<a href='ficha_tecnica.php?selecionado=$id&categoria=filmes'><div id='poster_filme'><img src='img/posters/$poster'></a>

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

						<a href='ficha_tecnica.php?selecionado=$id&categoria=filmes'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Ficha técnica</button></a>

					</div>

				</div>
				
			</div>";
	}
		
	break;
	
	case "series":
        

    include "config/conectar.php";
    $qtde_registros = 3;
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
		
	
	echo "<div id='filme_info'>

					<a href='ficha_tecnica.php?selecionado=$id&categoria=series'><div id='poster_filme'><img src='img/posters/$poster'></a>

				</div>

				<div id='info'>

					<h1>$titulo</h1>

					<div>
						<h3>Lançamento </h3>
						<p>$estreia</p>
					</div>
					
					<div>
						<h3>Elenco </h3>
						<p>$elenco</p>
					</div>
					
					<div class='fichaTecnica'>

						<a href='ficha_tecnica.php?selecionado=$id&categoria=series'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Ficha técnica</button></a>

					</div>

				</div>
				
			</div>";
	}
		
	break;	
	
	
	case "games":
        

    include "config/conectar.php";
    $qtde_registros = 3;
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
		
	
	echo "<div id='filme_info'>

					<a href='ficha_tecnica.php?selecionado=$id&categoria=games'><div id='poster_filme'><img src='img/posters/$poster'></a>

				</div>

				<div id='info'>

					<h1>$titulo</h1>

					<div>
						<h3>Lançamento </h3>
						<p>$estreia</p>
					</div>
					
					<div>
						<h3>Desenvolvedora </h3>
						<p>$desenvolvedora</p>
					</div>
					
					<div class='fichaTecnica'>

						<a href='ficha_tecnica.php?selecionado=$id&categoria=games'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Ficha técnica</button></a>

					</div>

				</div>
				
			</div>";
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