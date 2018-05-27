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

	<?php
	
		include('menu.php');
	
	?>	
	
</header>

	<div class='categoriaPaginaLancamentos'>

		<h2>Lançamentos</h2>

	</div>			
					

<section class="submenu">
	
	<?php
		require_once('submenu.php');
	?>
	
</section>


<section class="lancamentos_container">
	
<?php		
require_once "config/conectar.php";
//Agora é realizar a querie de busca no banco de dados	

	
$sql = "SELECT * FROM filmes";	
	
$resultado = mysqli_query($strcon, $sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

$idfilme = $linha["idfilmes"];	
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
		
		
		
			echo "
			
			<div id='filme_info'>
		
				<div id='poster_filme'>

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
					
					<div class='fichaTecnica'>

						<a href='filme.php?filme=$idfilme'><button type='button' class='btn_ficha'><i class='fas fa-plus'></i> Ficha técnica</button></a>

					</div>

				</div>
								
		
	</div>";
}
?>	
	
	
</section>									
	
	
	
	
	
	
	
	
	
	
	
	
</main>


</body>
</html>