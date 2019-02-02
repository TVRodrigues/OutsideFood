<?php
require_once 'assets/php/classes/classEventos.php';

$evento = new Eventos();

if(isset($_POST['edit'])){
	$evento->setId($_POST['id']);
	$evento->setNome($_POST['nome']);
	$evento->setData($_POST['data']);
	$evento->setHorario($_POST['horario']);
	$evento->setOrganizador($_POST['organizador']);
	$evento->setFoto($_POST['foto']);
	$evento->setCidades_id($_POST['cidades_id']);
	


	if($evento->edit() == 1){
		$result = "Evento editado com sucesso!";
	}else{
		$error = "Erro ao editar";
	}

}

if(isset($_POST['delete'])){
	$evento->setId($_POST['id']);

	if($evento->delete() == 1){
		$result = "Evento deletado com sucesso!";
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
			<h1>EVENTOS</h1>
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
						<th>Nome</th>
						<th>Data</th>
						<th>Horário</th>
						<th>Organizador</th>
						<th>Foto</th>
						<th>Cidade do Evento</th>
						
					</tr>

					<?php 
					$stmt = $evento->index();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						?>
						<tbody>
							<tr>
								<td><?php echo $row->nome ?></td>
								<td><?php echo $row->data ?></td>
								<td><?php echo $row->horario ?></td>
								<td><?php echo $row->organizador ?></td>
								<td><?php echo $row->foto ?></td>
								<td><?php echo $row->cidades_id ?></td>
								
								
									<button type="button" data-toggle="modal" data-target="#editar<?php echo $row->id ?>" class="btn btn-warning btn-sm">Editar</button>
									<button type="button" data-toggle="modal" data-target="#deletar<?php echo $row->id ?>" class="btn btn-danger btn-sm">Excluir</button>
								</td>
							</tr>
						</tbody>
						<?php } ?>
					</thead>
				</table>

				<?php 
				$stmt = $evento->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>

					<!-- MODAL EDITAR -->
					<div class="modal fade" id="editar<?php echo $row->id ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Editar evento</h3>
								</div>
								<div class="modal-body">
									<form action="editarEventos.php" method="post">
										<div class="form-group">
											<label>Nome</label>
											<input type="text" name="nome" class="form-control" value="<?php echo $row->nome ?>" required>
											<label>Data</label>
											<input type="text" name="data" class="form-control" value="<?php echo $row->data ?>" required>
											<!-- Duvida em Horario -->
											<label>Horario</label>
											<input type="text" name="horario" class="form-control" value="<?php echo $row->horario ?>" required>
											<label>Organizador</label>
											<input type="text" name="organizador" class="form-control" value="<?php echo $row->organizador ?>" required>
											<label>Foto</label>
											<input type="text" name="foto" class="form-control" value="<?php echo $row->foto ?>" required>
											<label>Cidades do Evento</label>
											<input type="text" name="cidades_id" class="form-control" value="<?php echo $row->cidades_id ?>" required>
											
											
											
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
									<h3>Deletar Evento</h3>	
								</div>
								<div class="modal-body">
									<h5> Deseja deletar o evento <?php echo $row->nome ?>? </h5>
									<form action="editarEventos.php" method="post">
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
		
