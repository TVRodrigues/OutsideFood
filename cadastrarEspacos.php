<?php
require_once 'assets/php/classes/classEspacos.php';

$espaco = new Espacos();

if(isset($_POST['insert'])){
	$espaco->setNome($_POST['nome']);
	$espaco->setAluguel($_POST['aluguel']);
	$espaco->setMetragem($_POST['metragem']);
	$espaco->setBenfeitoria($_POST['benfeitoria']);
	

	if($espaco->insert() == 1){
		$result = "Espaço inserido com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarEspacos.php");
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
	<h1>CADASTRAR ESPAÇOS</h1>
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
		<form action="cadastrarEspacos.php" method="post">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" name="nome" class="form-control">
				<label>Aluguel</label>
				<input type="text" name="aluguel" class="form-control" onkeyup="moeda(this);">
				<!-- Duvida em Metragem -->
				<label>Metragem</label>
				<input type="text" name="metragem" class="form-control">
				<label>Benfeitoria</label>
				<input type="text" name="benfeitoria" class="form-control">
				
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
