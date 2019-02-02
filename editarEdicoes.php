<?php
require_once 'assets/php/classes/classEdicoes.php';
require_once 'assets/php/classes/classEventos.php';

$edicao = new Edicoes();
$evento = new Eventos();

if(isset($_POST['edit'])){
	$edicao->setId($_POST['id']);
	$edicao->setNumero($_POST['numero']);
	$edicao->setCapacidade($_POST['capacidade']);
	$edicao->setLotacao($_POST['lotacao']);

	if($edicao->edit() == 1){
		$result = "Edição editada com sucesso!";
	}else{
		$error = "Erro ao editar";
	}

}

if(isset($_POST['delete'])){
	$edicao->setId($_POST['id']);

	if($edicao->delete() == 1){
		$result = "Edição deletada com sucesso!";
	}else{
		$error = "Erro ao deletar";
	}
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Outside Food</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>EDIÇÕES</h1>
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

			<table>
				<thead>
					<tr>
						<th>Número</th>
						<th>Capacidade</th>
						<th>Lotação</th>
						<th>Eventos</th>
						<th>Ações</th>
					</tr>

					<?php 
					$stmt = $edicao->index();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						?>
						<tbody>
							<tr>
								<td><?php echo $row->numero ?></td>
								<td><?php echo $row->capacidade ?></td>
								<td><?php echo $row->lotacao ?></td>
								<?php
								$stmtEvento = $evento->index();
								while ($rowEvento = $stmtEvento->fetch(PDO::FETCH_OBJ)) {
									if ($rowEvento->id == $row->eventos_id) {
										?>
										<td><?php echo $rowEvento->nome; ?></td>
										<?php
									}
								}
								?>
								<td>
									<button type="button" data-toggle="modal" data-target="#editar<?php echo $row->id ?>" class="btn btn-warning btn-sm">Editar</button>
									<button type="button" data-toggle="modal" data-target="#deletar<?php echo $row->id ?>" class="btn btn-danger btn-sm">Excluir</button>
								</td>
							</tr>
						</tbody>
						<?php } ?>
					</thead>
				</table>
				<?php 
				$stmt = $edicao->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>

					<!-- MODAL EDITAR -->
					<div class="modal fade" id="editar<?php echo $row->id ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Editar Edição</h3>
								</div>
								<div class="modal-body">
									<form action="editarEdicoes.php" method="post">
										<div class="form-group">
											<label>Número</label>
											<input type="number" name="numero" class="form-control" value="<?php echo $row->numero ?>" required>
											<label>Capacidade</label>
											<input type="number" name="capacidade" value="<?php echo $row->capacidade ?>" class="form-control" required>
											<label>Lotação</label>
											<input type="number" name="lotacao" class="form-control" value="<?php echo $row->lotacao ?>" required>
											<label>Evento</label>
											<?php
											$stmtEvento = $evento->index();
											while ($rowEvento = $stmtEvento->fetch(PDO::FETCH_OBJ)) {
												if ($rowEvento->id == $row->eventos_id) {
													?>
													<input type="text" name="eventos_id" class="form-control" value="<?php echo $rowEvento->nome; ?>" readonly>
													<?php
												}
											}
											?>


										</div>
										<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $row->id; ?>">
											<button type="submit" name="edit" class="btn btn-success">Salvar</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										</div>		
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- MODAL DELETAR -->
					<div class="modal fade" id="deletar<?php echo $row->id ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Deletar Edição</h3>	
								</div>
								<div class="modal-body">
									<h5> Deseja deletar a edição? </h5>
									<form action="editarEdicoes.php" method="post">
										<input type="hidden" name="id" value="<?php echo $row->id; ?>">
										<button type="submit" class="btn btn-success" name="delete">Sim</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</body>
		</html>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
