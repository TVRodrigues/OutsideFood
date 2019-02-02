<?php
require_once 'assets/php/classes/classVendas.php';
require_once 'assets/php/classes/classServicos.php';
$vendas = new Vendas();
$servicos= new Servicos();

if(isset($_POST['insert'])){
	$vendas->setQuantidade($_POST['quantidade']);	
	$vendas->setServicos($_POST['servicos_id']);
	

	if($vendas->insert() == 1){
		$result = "Venda inserida com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarVendas.php");
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
	<h1>CADASTRAR VENDAS</h1>
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
		<form action="cadastrarVendas.php" method="post">
			<div class="form-group">
				<label>Quantidade:</label>
				<input type="number" name="quantidade" class="form-control">
				
				<label>Serviços</label>
				
				<input type="radio" name="servicos_id" value="0"> Food Truck
				<input type="radio" name="servicos_id" value="1"> Barraca
				
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
