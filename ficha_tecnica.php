<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<html lang="pt-br">

<title>Ficha técnica</title>
<!--METADADOS PARA HABILITAR QUERYS DE FORMATAÇÃO PARA SITE RESPONSIVO-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no>
<meta name="mobile-web-app-capable" content="yes">


<!--LINK DO ÍCONE A SER MOSTRADO NA BARRA DE ENDEREÇOS DO NAVEGADOR-->
<link rel="shortcut icon" href="img/icon48px.png">


<!--LINKS INTERNOS DAS FOLHAS DE ESTILO CSS UTILIZADAS NA PÁGINA-->
<link href="css/estilo_v2.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/ficha_tecnica.css" rel="stylesheet" type="text/css">



<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script defer src="js/fontawesome/fontawesome-all.js"></script>




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


<!--TÍTULO DE IDENTIFICAÇÃO DA PÁGINA-->
	<div class='categoriaPaginaLancamentos'>

			<p><i class='fas fa-chevron-circle-left' onclick='goBack()'></i> &thinsp;&thinsp;Lançamentos</p>

			<script>
			function goBack() {
				window.history.back();
			}
			</script>

	</div>	


<!--DIV CONTAINER DO CONTÉUDO PRINCIPAL DO SITE-->
<div id="corpo_container"> <!--INICIO DO CORPO DO SITE-->	


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
	

</div> <!--FIM DO CORPO DO SITE-->	

<div id="submenu_inferior">
	
	<?php
		require('submenu.php');
	?>
	
</div>	
			
<footer>
	
	<div id="logo_rodape">
		<img src="img/logo.png" alt="logo do site">
	</div>
	
	<div id="rodape_info">
		<p>2018 Todos os diretos reservados</p>
	</div>		
		
</footer>	

</main>

<!--LINKS DOS ARQUIVOS JS INTERNOS PARA FUNCIONAMENTO DOS ELEMENTOS DO SITE-->
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>

<!--JS RESPONSÁVEL POR OCULTAR E EXIBIR ABAS DOS TÍTULOS-->			
<script src="js/aba_info_titulos.js"></script>
	
</body>
	
</html>