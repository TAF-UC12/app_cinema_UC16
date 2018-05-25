<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Filme app</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="initial-scale=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<main role="main">
	
<header>
	
	
</header>


<section class="submenu">
	
	<a href="index.php">home</a>
	
</section>

<section class="noticias_container">
	
<?php		
require_once "config/conectar.php";
mysqli_set_charset('utf8');
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
					</div>

					<ol>
						<li><h4>Gênero</h4>Cinema</li>
						<li><h4>Duração</h4> min</li>
						<li><h4>País</h4>$pais</li>
					</ol>

				</div>
		
	</div>";
}
?>	
	
</section>									
	
	
	
	
	
	
	
	
	
	
	
	
</main>


</body>
</html>