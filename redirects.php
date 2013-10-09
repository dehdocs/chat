<?php
include('controllers/init.php');
$action = isset($_POST['action'])?$_POST['action']:NULL;

switch($action){
	case 'entraFila';
		$nome = isset($_POST['nome'])?$_POST['nome']:NULL;
		$email = isset($_POST['email'])?$_POST['email']:NULL;
		$telefone = isset($_POST['telefone'])?$_POST['telefone']:NULL;
		$codPedido = isset($_POST['codPedido'])?$_POST['codPedido']:NULL;
		$duvida = isset($_POST['duvida'])?$_POST['duvida']:NULL;
		
		echo $chat->insereFila($nome, $email, $telefone, $codPedido, $duvida);
		break;
	case 'removeFila';
		$sessId= isset($_POST['sessId'])?$_POST['sessId']:NULL;
		$chat->gerenciaFila($sessId);
		break;
	case 'atualizaPosicao';
		$senha= isset($_POST['senha'])?$_POST['senha']:NULL;
		$chat->getPosition($senha);
		break;
	default:
		echo 0;
		break;
}