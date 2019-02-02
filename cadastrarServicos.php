<?php
require_once 'assets/php/classes/classServicos.php';

require_once 'assets/php/classes/classEspacos.php';


$servicos = new Servicos();
$espacos = new Espacos();


if(isset($_POST['insert'])){
	$servicos->setTipo($_POST['tipo']);
	$servicos->setFoto($_POST['foto']);
	$servicos->setSalario($_POST['salario']);
	$servicos->setEspacos($_POST['espacos_id']);


	if($servicos->insert() == 1){
		$result = "Serviços inserido com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarServicos.php");
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
	<h1>CADASTRAR SERVIÇOS</h1>
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
		<form action="cadastrarServicos.php" method="post">
			<div class="form-group">
				<label>Tipo do Serviço</label>
				<input type="radio" name="tipo" value="0"> Food Truck
				<input type="radio" name="tipo" value="1"> Barraca
				
				</select>
				<label>Foto</label>
				<input type="text" name="foto" class="form-control" >
				<label>Salario</label>
				<input type="text" name="salario" class="form-control" onkeyup="moeda(this);">
				<label>Espaços</label>
				<select id="select" name="espacos_id" action="cadastrarServicos.php">
				<option>Selecione</option>
					<?php 
						$stmt = $espacos->index();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<option id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>"><?php echo $row->nome ?> - Benfeitoria: <?php echo $row->benfeitoria ?></option>
					<?php } ?>
				</select>
				
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
