<?php


class db{


// host
private $host = 'localhost';

// usuario 
private $usuario = 'root';


// senha
private $senha = '';



// banco de dados
private $database = 'twitter_clone';


// criando a conexão
public function conecta_mysql(){

$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

// ajusta o charset de comunicação entre a aplicação e o BD
mysqli_set_charset($con, 'utf8');

// verificar se houve erro de conexão 
if(mysqli_connect_errno()){
	echo 'Houve um erro ao tentar se conectar ao MySQL: '.mysqli_connect_errno();
		}

		return $con;

	}

}

?>