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

		<h2><i class='fas fa-chevron-circle-left' onclick='goBack()'></i> &thinsp;&thinsp;Lançamentos</h2>
		
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
	
		require "ficha_tec_aba_filme.php";

		
break;
    
		
		case "series":

		require "ficha_tec_aba_serie.php";
		
break;
    
		
		case "games":

		require "ficha_tec_aba_game.php";	
		
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