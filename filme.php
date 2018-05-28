<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Filme app</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/filme.css" rel="stylesheet" type="text/css">
<script defer src="js/fontawesome/fontawesome-all.js"></script>
<meta name="viewport" content="initial-scale=1"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<main role="main">
	
<header>
	
	<?php
	
		include('menu.php');
	
	?>
	
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
	
	
$filme = $_GET["filme"];	
	
$sql = "SELECT * FROM filmes WHERE idfilmes = $filme";	
	
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
		
				<div id='poster_filme' style='background-image: url(img/posters/backgrounds/$imgFundo)'>

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
				WHERE filmes.idfilmes = $filme";	

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
?>
	
</section>									
	
	
	
	
	
	
	
	
	
	
	
	
</main>


</body>
</html>