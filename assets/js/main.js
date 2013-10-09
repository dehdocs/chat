$(document).ready(function(){
	 //ação ao clicar no botão "solicitar atendimento"
	 $('.toFila').click(function(){
		 var nome = $('#nome').val();
		 var email = $('#email').val();
		 var telefone = $('#telefone').val();
		 var codPedido = $('#codPedido').val();
		 var duvida = $('#duvida').val();
		 
		 $.ajax({
			type:"POST",
			url:"redirects.php",
			data:{action:'entraFila', nome:nome, email:email, telefone:telefone, codPedido:codPedido, duvida:duvida},
			success:function(data){
				$('#geral').html(data);
				if(data == 1){
					window.location='index.php';
				}else{
					alert('erro');
				}
			}
		});
	 });
	 	
});
//anima os pontos da posição na fila
function verificaPontos(){
	var qtPontos = $('.animationPoint').html();
	qtPontos = qtPontos.length;
	if(qtPontos == 1){
		$('.animationPoint').html('..');
	}else if(qtPontos == 2){
		$('.animationPoint').html('...');
	}else if(qtPontos == 3){
		$('.animationPoint').html('.');
	}
}
function gerenciaFila(sessId){
	$.ajax({
		type:"POST",
		url:"redirects.php",
		data:{action:'removeFila', sessId:sessId},
		success:function(data){
		}
	});
}

function atualizaPosicao(senha){
	$.ajax({
		type:"POST",
		url:"redirects.php",
		data:{action:'atualizaPosicao', senha:senha},
		success:function(data){
			$('.position').html(data);
		}
	});
}