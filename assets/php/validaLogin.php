<?php
require_once './classes/classLogin.php';

$user = new Login();

$email = $_POST['email'];
$senha = $_POST['senha'];


$login = $user->setEmail($email);
$login = $user->locate();

if(is_null($login) || empty($login)){
	echo "E-mail inválido";
	exit();
}

if(sha1($senha) == $login->senha){
	if(!isset($_SESSION)){
		session_start();
	}

	$_SESSION['email'] = $login->email;
	$_SESSION['tipo'] = $login->tipo;

	echo "Bem vindo!<br>";

	if (!isset($_SESSION['tipo'])) {
		session_destroy();
		header("Location: ../../index.php");
		exit;
	} else {
		switch ($_SESSION['tipo']) {
			case 0:
			echo "Redireciona para a home do adm";
		            //header("Location: ../../home.php");
			break;
			case 1:
			echo "Redireciona para a home do serviço";
		            //header("Location: ../../home.php");
			break;
		}
	}
	exit();
}else{
	echo "Senha inválida";
	exit();
}

?>