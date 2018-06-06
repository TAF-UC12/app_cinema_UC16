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

<section class="submenu">
	
	<?php
		require_once('submenu_filme.php');
	?>
	
</section>

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

		
			echo "<div id='filme_info'>
		
				<div id='poster_filme' style='background-image: url(img/posters/backgrounds/background_filmes.jpg)'>

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

		
		
		
			echo "<div id='filme_info'>
		
				<div id='poster_filme' style='background-image: url(img/posters/backgrounds/background_series.jpg)'>

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

		
		
		
			echo "<div id='filme_info'>
		
				<div id='poster_filme' style='background-image: url(img/posters/backgrounds/background_games.jpg)'>

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
					
					<div>
						<h3>Desenvolvedora </h3>
						<p>$desenvolvedora</p>
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


</body>
</html>