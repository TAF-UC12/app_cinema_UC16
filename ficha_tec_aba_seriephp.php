<?php

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

<?php
}