<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
};

require_once('db.class.php');

$nome_pessoa = $_POST['nome_pessoa'];
$id_usuario = $_SESSION['id_usuario'];


$objDb = new db();
$link = $objDb -> conecta_mysql();

$sql = "SELECT * FROM usuarios WHERE usuario like '%$nome_pessoa%' AND id <> $id_usuario";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
		echo ' <a href="#" class="list-group-item"> ';
			echo '<strong>'.$registro['usuario'].'</strong> <small>'.$registro['email'].'</small>';


		echo ' </p class="list-group-item-next pull-right">  ';
		echo '<button type="button" class="btn btn-default">Seguir </button>';

		echo '</p>';
		echo '<div class="clearfix"></div>';

		echo ' </a>  ';

	}

} else {
	echo ' erro na consulta de usuários no banco de dados';
}

?>