<?php
require_once 'headercliente.php';
require_once 'assets/php/classes/classServicos.php';
require_once 'assets/php/classes/classEspacos.php';

$servicos = new Servicos();
$espacos = new Espacos();

if (isset($_POST['select'])) {
  $servicos->setEspaco($_POST['espacos_id']);
}

if(isset($_POST['insert'])){
  $servicos->setNome($_POST['nome']);
  $servicos->setTipo($_POST['tipo']);
  $servicos->setSalario($_POST['salario']);
  $servicos->setEspaco($_POST['espacos_id']);

  if($_FILES['foto']['error'] != 4){
    if($_FILES['foto']['size'] <= 1000000){
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
      $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
      $foto = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

      if (!file_exists('../' . 'assets/img/servicos/' . $foto)) {
        $servicos->setFoto('assets/img/servicos/' . $foto);
        $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'another/type');
        if(in_array($_FILES['foto']['type'], $allowed)){
          if(!move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/servicos/' . $foto)){
            die('Erro ao salvar imagem, tente novamente!');
          }else{

            if($servicos->insert() == 1){
              $result = "Serviço inserido com sucesso!";
            }else{
              $error = "Erro ao inserir, tente novamente!";
            }
          }
        }else{
          $error = "Insira uma imagem no formato .png ou .jpg ou .jpeg!";
        }
      }else{
        $error = "Erro ao inserir, tente novamente!";
      }
    }else {
      $error = "A imagem deve possuir tamanho menor que 1Mb!";
    }
  }else{
    $error = "Erro ao inserir, tente novamente!";
  }
}

if(isset($_POST['edit'])){
  $servicos->setId($_POST['id']);
  $servicos->setNome($_POST['nome']);
  $servicos->setTipo($_POST['tipo']);
  $servicos->setSalario($_POST['salario']);
  $servicos->setEspaco($_POST['espacos_id']);

  if(isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
    if($_FILES['foto']['size'] <= 1000000){
date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
$ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
$foto = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
$dir = 'assets/img/servicos/'; //Diretório para BD
$servicos->setFoto($dir.$foto);
$dir = 'assets/img/servicos/'; //Diretório para uploads
move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto); //Fazer upload do arquivo
if(file_exists('../'.$_POST['photo_unlink'])){
  unlink('../'.$_POST['photo_unlink']);
}
if($servicos->edit() == 1){
  $result = "Serviço editado com sucesso!";
}else{
  $error = "Erro ao editar. Tente novamente.";
}

}else {
  $error = "A imagem deve possuir tamanho menor que 1Mb!";
}
}else{
  if($servicos->edit2() == 1){
    $result = "Serviço editado com sucesso!";
  }else{
    $error = "Erro ao editar. Tente novamente.";
  }
}
}


if(isset($_POST['delete'])){
  $servicos->setId($_POST['id']);
  if($servicos->delete() == 1){
    $result = "Serviço deletado com sucesso!";
  }else{
    $error = "Erro ao excluir. Tente novamente.";
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
     <a href="./adicionarservico.php">
       <button type="button" class="btn btn-warning">Adicionar</button>
     </a>
     <form class="navbar-form navbar-right" role="search" action="evento.php" method="get">
      <div class="form-group  is-empty">
       <input type="text" name="nome" class="form-control" placeholder="Pesquisar">
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
          <h4 class="title">Serviço</h4>
        </div>
        <div class="card-content table-responsive">
          <table class="table">
           <thead class="text-primary">
            <th>Nome</th>
            <th>Tipo</th>
            <th>Salário</th>
            <th>Foto</th>
            <th>Espaço</th>
            <th class="actions">Ações</th>
          </thead>
          <tbody>
            <?php
            $todosServicos = $servicos->index();
            while($row = $todosServicos->fetch(PDO::FETCH_OBJ)){
              ?>
              <tr>
                <td class="nome"><?php echo $row->nome ?></td>
                <td class="tipo">
                  <?php if($row->tipo == 0){ ?>Food Truck
                  <?php }else{ ?>Barraca
                  <?php } ?>
                </td>
                <td class="salario"><?php echo $row->salario ?></td>
                <td class="foto"><img src="<?php echo $row->foto ?>" alt="img"></td>
                <?php
                $todosEspacos = $espacos->index();
                while($rowEspacos = $todosEspacos->fetch(PDO::FETCH_OBJ)){
                  if($rowEspacos->id == $row->espacos_id){
                    ?> 
                    <td class="espacos"><?php echo $rowEspacos->nome ?> - Benfeitoria: <?php echo $rowEspacos->benfeitoria ?></td>
                    <?php } } ?>
                    <td class="actions">
                      <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row->id ?>" ><i class="material-icons">delete</i></a>
                      <a href="./editarservico.php?id=<?php echo $row->id ?>"><i class="material-icons">mode_edit</i></a>
                    </td>
                  </tr>
                  <?php } ?>
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
  $todosServicos = $servicos->index();
  while($row = $todosServicos->fetch(PDO::FETCH_OBJ)){
    ?>
    <div class="modal fade" id="exampleModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="servico.php" method="post">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
            <!--         <span aria-hidden="true">X</span>
            -->        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            Dessa excluir esse serviço?
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
    var active = document.getElementById("servico");
    active.classList.add("active");
  </script>
  <script>
    $(document).ready(function() {
     setTimeout("$('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 )");
     $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
      $(".alert-success").alert('close');
      window.location.href = "servico.php";
    });
     $(".alert-danger").fadeTo(1000, 500).sldideUp(300, function(){
      $(".alert-danger").alert('close');
      window.location.href = "servico.php";
    });
   });
 </script>
