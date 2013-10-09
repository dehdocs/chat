<?php

class MyDb{
	
	public $host 	= BDHOST;
	public $user 	= BDUSER;
	public $pwd 	= BDPASS;
	public $dbname 	= BDNAME;
	
	public function open(){
		$conn = mysql_connect($this->host,$this->user,$this->pwd) 
				or die('falha na conexao com o banco de dados!');
		mysql_select_db($this->dbname, $conn);
		return $conn;
	}
	
	public function sql($query){
		$this->open();
		$res = mysql_query($query) or die("Erro no banco de dados: " . mysql_error() . "\nSintaxe: $query");
		$ret = array();
		if(mysql_num_rows($res) > 0) {
			for($i=0; $i < mysql_num_rows($res); $i++) {
				$ret[] = mysql_fetch_array($res);
			}
		}
		return $ret;
		$this->close();
	}
	
	public function execute($query){
		$this->open();
		$res = mysql_query($query) or die('Erro no banco de dados: ' . mysql_error() . "\nSintaxe: $query");
		return $res;
		$this->close();
	}
	public function numRows($query){
		$this->open();
		$res = mysql_query($query) or die('Erro no banco de dados: ' . mysql_error() . "\nSintaxe: $query");
		$res = mysql_num_rows($res);
		return $res;
		$this->close();
	}
	
	public function close(){
		mysql_close();
		return NULL;	
	}
	
}

?>
