// JavaScript Document

document.getElementById("btn_media").addEventListener("mouseover", function (){
			
			var pb = 5;
			var sb = 5;
			var tb = 8;
			var qb = 9;
			
			var media = (pb+sb+tb+qb)/4;
			
			document.write("Sua média é "+media+"<br>");
			
			if(media >= 7){
				document.write("Aluno aprovado!");
			}
			
			else if(media < 7 && media >= 5){
				document.write("Aluno em recuperação!");
			}
			
			else{
				document.write("Aluno reprovado!");
			}
		
	
		});