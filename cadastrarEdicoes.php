<?php
require_once 'assets/php/classes/classEdicoes.php';
require_once 'assets/php/classes/classEventos.php';

$edicao = new Edicoes();
$evento = new Eventos();

if (isset($_POST['select'])) {
    $edicao->setEventos($_POST['id']);
}

if(isset($_POST['insert'])){
	$edicao->setNumero($_POST['numero']);
	$edicao->setCapacidade($_POST['capacidade']);
	$edicao->setLotacao($_POST['lotacao']);
	$edicao->setEventos($_POST['id']);
	
	if($edicao->insert() == 1){
		$result = "Edição inserida com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarEdicoes.php");
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
	<h1>CADASTRAR EDIÇÕES</h1>
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
		<form action="cadastrarEdicoes.php" method="post">
			<div class="form-group">
				<label>Número</label>
				<input type="number" name="numero" class="form-control">
				<label>Capacidade</label>
				<input type="number" name="capacidade" class="form-control"">
				<label>Lotação</label>
				<input type="number" name="lotacao" class="form-control">
				<label>Evento</label>
				<select id="select" name="id" action="cadastrarEdicoes.php">
					<option>Selecione</option>
					<?php 
						$stmt = $evento->index();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<option id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>"><?php echo $row->nome ?></option>
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
