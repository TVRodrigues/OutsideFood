<?php
require_once 'assets/php/classes/classPratos.php';

$prato = new Pratos();

if(isset($_POST['insert'])){
	$prato->setNome($_POST['nome']);
	$prato->setPreco($_POST['preco']);
	$prato->setFoto($_POST['foto']);
	

	if($prato->insert() == 1){
		$result = "Prato inserido com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarPratos.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Outside Food</title>
</head>
<body>
	<h1>CADASTRAR PRATOS</h1>
	<?php
	if (isset($result)) {
		?>
		<div class="alert alert-success">
			<?php echo $result; ?>
		</div>
		<?php
	}else if(isset($error)){
		?>
		<div class="alert alert-danger">
			<?php echo $error; ?>
		</div>
		<?php
	}
	?>
	<div class="col-md-6">
		<form action="cadastrarPratos.php" method="post">
			<div class="form-group">
				<label>Nome do Prato</label>
				<input type="text" name="nome" class="form-control">
				<label>Preço</label>
				<input type="text" name="preco" class="form-control" onkeyup="moeda(this);">
				<label>Foto</label>
				<input type="text" name="foto" class="form-control">
				
			</div>
			<div class="form-group">
				<button type="submit" name="cancel" class="btn btn-danger">Cancelar</button>
				<button type="submit" name="insert" class="btn btn-success">Cadastrar</button>
			</div>			
		</form>
	</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
