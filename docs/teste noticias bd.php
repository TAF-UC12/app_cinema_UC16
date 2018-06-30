<?php

//SWITCH PUXA DADOS DE ACORDO COM O TIPO DE NOTÍCIA

switch ($tipocategoria) {
		
    case "Cinema":
		
$sql2 = "SELECT * FROM $tabela WHERE $coluna = $rel_filme";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 3");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idfilmes"];
$titulo = $linha["titulo"];
$titoriginal = $linha["titulo_original"];
$poster = $linha["poster"];
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=filmes'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$titoriginal";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
	$sql4 = "SELECT * FROM noticias WHERE relac_filmes = $id";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];	
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Cinema'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
}
?>
				
										
			</div>
		
	</section>

<?php		
		
	break;
		
		
		
	case "Series":	
		
		$sql2 = "SELECT * FROM $tabela WHERE $coluna = $rel_serie";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 3");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idseries"];
$titulo = $linha["titulo"];
$emissora = $linha["nomeEmissora"];
$poster = $linha["poster"];	
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=<?php echo "$tabela";?>'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$emissora";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
	$sql4 = "SELECT * FROM `noticias`
		 INNER JOIN series
		 ON noticias.relac_series = series.idseries
		 WHERE relac_series = $id AND idnoticias != $idNoticia ORDER BY idnoticias DESC
		 LIMIT 3";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Cinema'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
}
?>
				
										
			</div>
		
	</section>

<?php		

		
	case "Games":
		
		$sql2 = "SELECT * FROM $tabela
				INNER JOIN desenvolvedoras
				ON $tabela.desenvolvedora = desenvolvedoras.iddesenvolvedoras
				WHERE $coluna = $rel_game";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 3");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idgames"];
$titulo = $linha["tituloGame"];
$desenvolvedora = $linha["nomeDesenvolvedora"];	
$titoriginal = $linha["titulo_original"];
$poster = $linha["imgGame"];
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=<?php echo "$tabela";?>'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$desenvolvedora";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
	$sql4 = "SELECT * FROM noticias WHERE relac_games = $id";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];	
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Cinema'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
}
?>
				
										
			</div>
		
	</section>

<?php		

		
		
	default;	
		
		
		
	case "":
		
		$sql2 = "SELECT * FROM $tabela WHERE $coluna = $rel_filme";	
	
$resultado = mysqli_query($strcon, $sql2)
or die ("Não foi possível realizar a consulta ao banco de dados 3");
	
while ($linha=mysqli_fetch_array($resultado)) {

$id = $linha["idfilmes"];
$titulo = $linha["titulo"];
$titoriginal = $linha["titulo_original"];
$poster = $linha["poster"];
	
	
?>	
		
		<div id='titulo_relacionado'>
		
			<a href='ficha_tecnica.php?selecionado=<?php echo "$id";?>&categoria=<?php echo "$tabela";?>'><img src='img/posters/<?php echo "$poster";?>' alt=''></a>

			<div>

				<h1><?php echo "$titulo";?></h1>
				<h2><?php echo "$titoriginal";?></h2>			

			</div>
		
		</div>

<?php
}
?>		
						
	</section>
	
	
	<!--SECTION COM OUTRAS NOTÍCIAS RELACIONADAS AO TITULO OU EVENTO-->
	<section>
							
		<h3>Notícias sobre <?php echo "$titulo";?></h3>
					
			<div id='noticia_relacionada'>
	
		
		<?php
	
	$sql4 = "SELECT * FROM noticias WHERE relac_filmes = $id";	
	
$resultado = mysqli_query($strcon, $sql4)
or die ("Não foi possível realizar a consulta ao banco de dados");
	
while ($linha=mysqli_fetch_array($resultado)) {

	$idnoticia = $linha["idnoticias"];	
	$titulo = $linha["tituloNoticia"];
	$subtitulo = $linha["subtitulo"];
	$texto = $linha["texto"];	
	$img = $linha["img"];
	$tipo = $linha["tipoPost"];	
	$rel_filme = $linha["relac_filmes"];	
	$rel_serie = $linha["relac_series"];	
	$rel_game = $linha["relac_games"];	
	
?>	
					
							
											
				<div class="noticia">

					<img src='img/noticias/<?php echo "$img";?>' alt=''>
					<a href='noticia.php?news=<?php echo "$idnoticia";?>&categoria=Cinema'><h1><?php echo "$titulo";?></h1></a>

				</div>
<?php
}
?>
				
										
			</div>
		
	</section>

<?php		

		
		
	break;	

		
		
}
?>		