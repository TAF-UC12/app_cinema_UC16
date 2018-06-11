<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ficha tecnica</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/ficha_tecnica.css" rel="stylesheet" type="text/css">
<script defer src="js/fontawesome/fontawesome-all.js"></script>
<meta name="viewport" content="initial-scale=1"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
.invisivel { display: none; }
.visivel { visibility: visible; }
.cor_selecionado { background-color: aqua; border:solid rgba(151,4,6,1.00) 5px; }	
</style>


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

<section class="lancamentos_container">
	
				
<?php		
require_once "config/conectar.php";

//Agora é realizar a querie de busca no banco de dados	
	
	
$idSelecionado = $_GET["selecionado"];
$categoria = $_GET["categoria"];	
	
switch ($categoria) {
		
    case "filmes":
	
	
$sql = "SELECT * FROM filmes WHERE idfilmes = $idSelecionado";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

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
$duracao = $linha["duracao"];

		
			echo "<div id='filme_info' style='background-image: url(img/posters/backgrounds/background_filmes.jpg)'>
			
			
				<div id='menu_filme'>
				
						<div id='submenu_filme'>";	
				?>
					
				<?php require_once "submenu_filme.php";
						
				echo "</div>
				
				
					<div id='poster_filme'>
						<img src='img/posters/$poster'>
					</div>

				</div>
				
				<div id='info' class='invisivel'>

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

				
					<div>
						<h3>Elenco </h3>
						<p>$elenco</p>
					</div>

					<div>
						<h3>Sinopse </h3>
						<p class='sinopse'>$sinopse</p>
					</div>";

?>	
	
	
					<ol>
						<li><h4>Gênero</h4></li>

<?php						
$sql2 = "SELECT nomegenero FROM filmes
				INNER JOIN filmes_has_generos
				ON filmes.idfilmes = filmes_has_generos.filmes_idfilmes
				INNER JOIN generos
				ON filmes_has_generos.generos_idgeneros = generos.idgeneros
				WHERE filmes.idfilmes = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$generos = $linha["nomegenero"];
		
								
						
						
						echo "<li>$generos</li>";
						
		}
		?>
	
<?php						
					echo "</ol>
					
					<ol>
						<li><h4>Duração</h4></li>
						<li>$duracao min</li>
					</ol>
						
					<ol>
						<li><h4>País</h4></li>
						<li>$pais</li>
					</ol>

				</div>
		
		
		
		
				<div id='info2' class='invisivel'>";?>

					<article class="lista_noticias">
					<h3>Notícias relacionadas</h3>
    
	    <?php
    include "config/conectar.php";
    $qtde_registros = 4;
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
		
	?>
	
	
	<div class='noticia'>

				<div class='imgNoticia'>
					<img src='img/noticias/<?php echo $img; ?>' alt='<?php echo $img; ?>'>

				</div>

				<div class='infoNoticiaContainer'>
					<div class='infoNoticia'>

						<p>Postado em <?php echo $data; ?> por <?php echo $autor; ?></p>

					</div>

					<div class='chamadaNoticia'>
						<p><a href='noticia.php?news=<?php echo $idnoticia; ?>&categoria=<?php echo $tipo; ?>'><?php echo $titulo; ?></a></p>
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

				<?php echo "</div>
				
				
				
				<div id='info3' class='invisivel'>

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

				
					<div>
						<h3>Elenco </h3>
						<p>$elenco</p>
					</div>

					<div>
						<h3>Sinopse </h3>
						<p class='sinopse'>$sinopse</p>
					</div>";

?>	
	
	
					<ol>
						<li><h4>Gênero</h4></li>

<?php						
$sql2 = "SELECT nomegenero FROM filmes
				INNER JOIN filmes_has_generos
				ON filmes.idfilmes = filmes_has_generos.filmes_idfilmes
				INNER JOIN generos
				ON filmes_has_generos.generos_idgeneros = generos.idgeneros
				WHERE filmes.idfilmes = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$generos = $linha["nomegenero"];
		
								
						
						
						echo "<li>$generos</li>";
						
		}
		?>
	
<?php						
					echo "</ol>
					
					<ol>
						<li><h4>Duração</h4></li>
						<li>$duracao min</li>
					</ol>
						
					<ol>
						<li><h4>País</h4></li>
						<li>$pais</li>
					</ol>

				</div>
				
				
				
				
	</div>";
}
		
break;
    
		
		case "series":

	
$sql = "SELECT * FROM series
		INNER JOIN emissoras
		ON series.canal = emissoras.idemissoras
		WHERE idseries = $idSelecionado";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {
	
$titulo = $linha["titulo"];
$titoriginal = $linha["titulo_original"];
$poster = $linha["poster"];	
$estreia = $linha["lancamento"];
$elenco = $linha["elenco"];	
$sinopse = $linha["sinopse"];
$canal = $linha["nomeEmissora"];
$pais = $linha["paisOrigem"];
$imgFundo = $linha["imgFundo"];
$trailer = $linha["trailer"];
$duracao = $linha["duracao"];
$ano = $linha["ano"];
$temp = $linha["temporadas"];


		
		
		
			echo "<div id='filme_info' style='background-image: url(img/posters/backgrounds/background_series.jpg)'>
		
				<div id='menu_filme'>
				
					<div id='submenu_filme'>";	
				?>
					
				<?php require_once "submenu_filme.php";
						
				echo "</div>
				
				
					<div id='poster_filme'>
						<img src='img/posters/$poster'>
					</div>

				</div>

				<div id='info'>

					<h1>$titulo</h1>
					<h2>$titoriginal</h2>
					
					<div>
						<h3>Ano lançamento </h3>
						<p>$ano</p>
					</div>

					<div>
						<h3>Lançamento </h3>
						<p>$estreia</p>
					</div>	
					
					<div>
						<h3>Temporadas </h3>
						<p>$temp temporadas</p>
					</div>	
				
					<div>
						<h3>Elenco </h3>
						<p>$elenco</p>
					</div>

					<div>
						<h3>Sinopse </h3>
						<p class='sinopse'>$sinopse</p>
					</div>";

?>	
	
	
					<ol>
						<li><h4>Gênero</h4></li>

<?php						
$sql2 = "SELECT nomegenero FROM series
		INNER JOIN series_has_generos
		ON series.idseries = series_has_generos.series_idseries
		INNER JOIN generos
		ON series_has_generos.generos_idgeneros = generos.idgeneros
		WHERE series.idseries = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$generos = $linha["nomegenero"];
		
						
						echo "<li>$generos</li>";
						
		}
		?>
	
<?php						
					echo "</ol>
					
					<ol>
						<li><h4>Emissora</h4></li>
						<li>$canal</li>
					</ol>
						
					<ol>
						<li><h4>País</h4></li>
						<li>$pais</li>
					</ol>

				</div>
		
	</div>";
}
		
break;
    
		
		case "games":

	
			$sql = "SELECT * FROM `games`
				INNER JOIN desenvolvedoras
				ON games.desenvolvedora = desenvolvedoras.iddesenvolvedoras
				INNER JOIN publicadoras
				ON games.publicadora = publicadoras.idpublicadora
				INNER JOIN games_has_consoles
				ON games.idgames = games_has_consoles.games_idgames
				INNER JOIN consoles
				ON games_has_consoles.consoles_idconsoles = consoles.idconsoles
				WHERE games.idgames = $idSelecionado";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

$idfilme = $linha["idgames"];	
$titulo = $linha["tituloGame"];
$desenvolvedora = $linha["nomeDesenvolvedora"];
$publicadora = $linha["nomePublicadora"];
$plataforma = $linha["nomeConsole"];
$poster = $linha["poster"];	
$estreia = $linha["lancamentoGame"];
$elenco = $linha["elenco"];	
$sinopse = $linha["sinopseGame"];
$diretor = $linha["diretor"];
$pais = $linha["paisOrigem"];
$poster = $linha["imgGame"];
$trailer = $linha["trailer"];

		
		
		
			echo "<div id='filme_info' style='background-image: url(img/posters/backgrounds/background_games.jpg)'>
		
				<div id='menu_filme'>
				
					<div id='submenu_filme'>";	
				?>
					
				<?php require_once "submenu_filme.php";
						
				echo "</div>
				
				
					<div id='poster_filme'>
						<img src='img/posters/$poster'>
					</div>

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
					
					<div>
						<h3>Desenvolvedora </h3>
						<p>$desenvolvedora</p>
					</div>
					
					<div>
						<h3>Públicado por </h3>
						<p>$publicadora</p>
					</div>

					<div>
						<h3>Sinopse </h3>
						<p class='sinopse'>$sinopse</p>
					</div>";

?>	
	
	
					<ol>
						<li><h4>Gênero</h4></li>

<?php						
$sql2 = "SELECT nomegenero FROM games
		INNER JOIN games_has_generos
		ON games.idgames = games_has_generos.games_idgames
		INNER JOIN generos
		ON games_has_generos.generos_idgeneros = generos.idgeneros
		WHERE games.idgames = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$generos = $linha["nomegenero"];
		
								
						
						
						echo "<li>$generos</li>";
						
		}
		?>
	
</ol>
					
					<ol>
						<li><h4>Plataformas</h4></li>
						
						
<?php						
$sql2 = "SELECT nomeConsole FROM games
		INNER JOIN games_has_consoles
		ON games.idgames = games_has_consoles.games_idgames
		INNER JOIN consoles
		ON games_has_consoles.consoles_idconsoles = consoles.idconsoles
		WHERE games.idgames = $idSelecionado";	

		$resultado = mysqli_query($strcon, $sql2)
		or die ("Não foi possível realizar a consulta ao banco de dados");

		while ($linha=mysqli_fetch_array($resultado)) {

		$console = $linha["nomeConsole"];
		
								
						
						
						echo "<li>$console</li>";
						
		}
		?>
				
					</ol>

	
<?php					
					
					echo "<ol>
						<li><h4>Pubicado por</h4></li>
						<li>$publicadora</li>
					</ol>

				</div>
		
	</div>";
}
		
break;
}
		
?>
	
</section>									
	
	
<footer>
	
	<div id="logo_rodape">
		<img src="img/logo.png" alt="logo do site">
	</div>
	
	<div id="rodape_info">
		<p>2018 Todos os diretos reservados</p>
	</div>		
		
</footer>	

</main>
<script language="Javascript">

	function myFunction() {	
		
	var element = document.getElementById("lista");	
	element.classList.toggle("info_ativa");	
	
	var element = document.getElementById("lista2");	
	element.classList.remove("info_ativa");		
		
	var element = document.getElementById("lista3");	
	element.classList.remove("info_ativa");	
		
		

	var element = document.getElementById("info");
	element.classList.toggle("invisivel");
		
	var element = document.getElementById("info2");
	element.classList.add("invisivel");		
			
	var element = document.getElementById("info3");
	element.classList.add("invisivel");
		
}
	
	
	
	function myFunction2() {
		
	var element = document.getElementById("lista");	
	element.classList.remove("info_ativa");	
	
	var element = document.getElementById("lista2");	
	element.classList.toggle("info_ativa");		
		
	var element = document.getElementById("lista3");	
	element.classList.remove("info_ativa");	
		
		
		
	 var element = document.getElementById("info");
	element.classList.add("invisivel");	
		
    var element = document.getElementById("info2");
	element.classList.toggle("invisivel");
		
		
		
	 var element = document.getElementById("info3");
	element.classList.add("invisivel");	
}
	
	function myFunction3() {
		
	var element = document.getElementById("lista");	
	element.classList.remove("info_ativa");	
	
	var element = document.getElementById("lista2");	
	element.classList.remove("info_ativa");		
		
	var element = document.getElementById("lista3");	
	element.classList.toggle("info_ativa");	
		
		
		
	 var element = document.getElementById("info");
	element.classList.add("invisivel");		
					
    var element = document.getElementById("info2");
	element.classList.add("invisivel");	
		
		
	 var element = document.getElementById("info3");
	element.classList.toggle("invisivel");	
}
	
</script>
</body>
</html>