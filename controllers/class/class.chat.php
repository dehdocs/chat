<?php
require('class.db.mysql.php');
class Chat{
	public $db;

	public function __construct(){
		$this->db = new MyDb();
	}
	
	public function insereFila($nome, $email, $telefone, $extra, $duvida){
		$qr = "INSERT INTO atendimento (nome, email, telefone, extra, duvida) VALUES ('$nome', '$email', '$telefone', '$extra', '$duvida')";
		
		if($qr = $this->db->execute($qr)){
			$idAtendimento = $this->getIdAtendimento($email);
			$sessId = $this->geraSessId();
			$q2 ="INSERT INTO     
                          fila
                         (atendido,
                          desistiu,
						  sessid,
						  time,
                          atendimento_idatendimento)
                         
                   SELECT '0',
                          '0',
						  '$sessId',
						  now(),
                          max(idatendimento)
                    FROM atendimento
   					WHERE email = '$email'";
					
			
			if($q2 = $this->db->execute($q2)){
				$this->montaSessao($idAtendimento, $sessId);
				return 1;
			}
		}else{
			return 0;
		}
		
	}
	
	public function getIdAtendimento($email){
		$qr = "SELECT MAX(idatendimento) FROM atendimento WHERE email = '$email'";
		$qr = $this->db->sql($qr);
		return $qr[0][0];
	}
	
	public function montaSessao($idAtendimento, $sessId){
		$senha = "SELECT MAX(senha) FROM fila WHERE atendimento_idatendimento = $idAtendimento";
		$senha= $this->db->sql($senha);
		$_SESSION['senha'] = $senha[0][0];
		$_SESSION['ID'] = $sessId;
	}
	
	public function getPosition($senha){
		$qr = "SELECT * FROM fila WHERE atendido =0 AND desistiu = 0 ORDER BY SENHA ASC";
		$qr = $this->db->sql($qr);
		$n = 1;
		foreach($qr as $q){
			if($q == $senha){
			break;
			}
			$n++;
		}
		echo $n-1;
	}
	
	public function gerenciaFila($sessId){
		$qr = "UPDATE fila SET time = now() WHERE sessid = '$sessId'";
		if($this->db->execute($qr)){
			$this->checaInativos();
		}	
	}
	
	public function checaInativos(){
		$minIns = "SELECT MINUTE(time),sessid FROM fila WHERE atendido = 0 and desistiu =0";
		$minIns = $this->db->sql($minIns);
		$minAtual = "SELECT MINUTE(now())";
		$minAtual = $this->db->sql($minAtual);
		$minAtual = $minAtual[0][0];
		foreach($minIns as $comp){
			if($comp[0] == $minAtual){
				return false;
			}else{
				$qr = "UPDATE fila set Desistiu = 1 where sessid = '$comp[1]'";
				if($this->db->execute($qr)){
					return true;
				}else{
					return false;
				}
			}
		}
	}
	
	public function geraSessId($tamanho = 36, $maiusculas = true, $numeros = true, $simbolos = false){
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
			return $retorno;
		}

}