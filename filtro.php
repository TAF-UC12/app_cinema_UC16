

<div class="filtro_container">		

	<form action="" method='get' class="form_filtro">
		
	
		  <div class="col-20 black rounded">
		  
			<select id="" name="filtro_categoria">
			  <option value="filmes">Filmes</option>
			  <option value="series">Séries</option>
			  <option value="games">Games</option>
			</select>
			
		  </div>
		  
		  <div class="col-20 black rounded">
		  
			<select id="" name="filtro_genero">
		  		<option value=''>Gêneros</option>
		  <?php 
				include_once("config/conectar.php");
				
				$sql = "SELECT * FROM generos";
				
				$resultado = mysqli_query($strcon, $sql)
					or die ("Não foi possível realizar a consulta ao banco de dados para obter os generos");
				
				while ($linha=mysqli_fetch_array($resultado)) {
					
					$id_generos = $linha["idgeneros"];
					$nome_generos = $linha["nomegenero"];
		  
			  echo "<option value='$id_generos'>$nome_generos</option>";
				}
				?>
			</select>
			
		  </div>
		  
		  <div class="col-20 black rounded">
		  
			<select id="" name="filtro_ano">
		  	  <option value="">Mês</option>
			  <option value="1">Janeiro</option>
			  <option value="2">Fevereiro</option>
			  <option value="3">Março</option>
			  <option value="4">Abril</option>
			  <option value="5">Maio</option>
			  <option value="6">Junho</option>
			  <option value="7">Julho</option>
			  <option value="8">Agosto</option>
			  <option value="9">Setembro</option>
			  <option value="10">Outubro</option>
			  <option value="11">Novembro</option>
			  <option value="12">Desembro</option>
			</select>
			
		  </div>
		  
		  <div class="btn_submit_filtro black rounded">
		  
			<input type="submit" value="Filtrar" name='submit'>
			
		  </div>
		  

	</form>
	
</div>