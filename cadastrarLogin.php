<?php
require_once "assets/php/classes/classLogin.php";

$login = new Login();

if(isset($_POST['action'])){
	switch ($_POST['action']){
		case "insert":
		$login->setEmail($_POST['email']);
		$login->setSenha($_POST['senha']);
		$login->setTipo(2);
		$login->insert();
		echo "Cadastrado";
	}
}

?>

<head><title>outsideFood</title></head>
<body>
	<form action="cadastrarLogin.php" method="post">
		<input type="text" name="email" placeholder="E-mail">
		<input type="text" name="senha" placeholder="Senha">
		<input type="hidden" name="action" value="insert">
        <button type="submit" value="Cadastrar" id="btnenviar" class="btn btn-primary">Enviar</button>
    </form>
</body>
