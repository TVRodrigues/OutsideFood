
<?php
require_once 'headercliente.php';
require_once 'assets/php/classes/classFuncionarios.php';
require_once 'assets/php/classes/classServicos.php';
require_once 'assets/php/classes/classCulinaria.php';
//require_once 'assets/php/classes/classFuncionariosHasCulinaria.php';

$funcionarios = new Funcionarios();
$servicos= new Servicos();
$culinaria = new Culinaria();
//$fhc= new FuncionariosHasCulinaria();

if (isset($_POST['select'])) {
    $servicos->setServicos($_POST['servicos_id']);
}
if (isset($_POST['select'])) {
    $culinaria->setCulinaria($_POST['culinaria_id']);
}
if(isset($_POST['insert'])){
  $funcionarios->setNome($_POST['nome']);
  $funcionarios->setTipo($_POST['tipo']);
  $funcionarios->setServicos($_POST['servicos_id']);
  //$funcionarios->setCulinaria($_POST['culinaria_id']);
  $funcionariosid=$funcionarios->insert();
  //$fhc->setFuncionarios($funcionariosid);
   //$fhc->setCulinaria($)

  if($funcionarios->insert() == 1){
    $result = "Funcionario inserido com sucesso!";
  }else{
    $error = "Erro ao inserir. Tente novamente";
  }
}
if(isset($_POST['edit'])){
  $funcionarios->setId($_POST['id']);
  $funcionarios->setNome($_POST['nome']);
  $funcionarios->setTipo($_POST['tipo']);
  $funcionarios->setServicos($_POST['servicos_id']);
   $funcionarios->setCulinaria($_POST['culinaria_id']);  

  if($funcionarios->edit() == 1){
        $result = "Funcionario editado com sucesso!";
    }else{
        $error = "Erro ao editar. Tente novamente";
    }
}
if(isset($_POST['delete'])){
  $funcionarios->setId($_POST['id']);
  if($funcionarios->delete() == 1){
    $result = "Deletado";
  }else{
    $error = "Erro ao deletar";
  }
}
?>


<div class="content">
  <?php
      if(isset($warning)){
        ?>
        <div class="alert alert-warning">
          <?php echo $warning; ?>      
        </div> 
        <?php }else if(isset($result)) {
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
 <div class="container-fluid">
  <div class="collapse navbar-collapse">
   <a href="./adicionarfuncionario.php">
       <button type="button" class="btn btn-warning">Adicionar</button>
   </a>
   <form class="navbar-form navbar-right" role="search" action="funcionarios.php" method="get">
    <div class="form-group  is-empty">
     <input type="text" name="nome" class="form-control" placeholder="Search">
     <span class="material-input"></span>
 </div>
 <button type="submit" name="pesquisa" class="btn btn-white btn-round btn-just-icon">
     <i class="material-icons">search</i>
     <div class="ripple-container"></div>
 </button>
</form>
</div>
</div>
<div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
    <div class="card">
     <div class="card-header" data-background-color="orange">
      <h4 class="title">Funcionários</h4>
  </div>
  <div class="card-content table-responsive">
      <table class="table">
       <thead class="text-primary">
        <th>Nome</th>
        <th>Tipo</th>
        <th class="actions">Ações</th>
    </thead>
    <tbody>

         <?php
                $todosFuncionarios = $funcionarios->index();
                while($row = $todosFuncionarios->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <tr>

                    <td class="nome"><?php echo $row->nome; ?></td>
                    <td class="tipo"><?php echo $row->tipo; ?></td>
                    
             <td class="actions">
                      <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row->id ?>" ><i class="material-icons">delete</i></a>
                      <a href="./editarfuncionario.php?id=<?php echo $row->id ?>"><i class="material-icons">mode_edit</i></a>
                  </td>
              </tr>
                <?php
                }
                ?>

      </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<?php
$todosFuncionarios= $funcionarios->index();
while($row = $todosFuncionarios->fetch(PDO::FETCH_OBJ)){
  ?>
 <div class="modal fade" id="exampleModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="funcionarios.php" method="post">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
            <!--         <span aria-hidden="true">X</span>
            -->        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            Dessa excluir esse evento?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <input type="hidden" name="id" value="<?php echo $row->id ?>">
            <button id="btnamarelo" type="submit" name="delete" class="btn btn-primary">Sim</button>
        </div>
    </div>
</div>
</form>
</div>
<?php } ?>
<?php
require_once 'footer.php';
?>

<script type="application/javascript">
    var active = document.getElementById("funcionarios");
    active.classList.add("active");
</script>
