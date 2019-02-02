<?php
require_once 'assets/php/classes/classCulinaria.php';

$culinaria = new Culinaria();

if(isset($_POST['insert'])){
	$culinaria->setTipo_culinaria($_POST['tipo_culinaria']);
	$culinaria->setTempo($_POST['tempo']);
	

	

	if($culinaria->insert() == 1){
		$result = "Culinária inserida com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarCulinaria.php");
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
	<h1>CADASTRAR CULINÁRIA</h1>
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
		<form action="cadastrarCulinaria.php" method="post">
			<div class="form-group">
				<label>Tipo de Culinária</label>
				<input type="text" name="tipo_culinaria" class="form-control">
				<!-- Duvida com Tempo -->
				<label>Tempo</label>
				<input type="int" name="tempo" class="form-control" >
				
				
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
