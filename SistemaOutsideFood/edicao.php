<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classEdicoes.php';
require_once 'assets/php/classes/classEventos.php';
require_once 'assets/vendor/autoload.php';

$edicoes = new Edicoes();
$eventos = new Eventos();
use JasonGrimes\Paginator;


//Paginacao
$maxPorPagina = 150;
$paginaAtual = filter_var(isset($_GET['pagina']) ? $_GET['pagina'] : 1, FILTER_SANITIZE_NUMBER_INT);

$url = 'edicoes.php?pagina=(:num)';
$inicio = ($maxPorPagina * $paginaAtual) - $maxPorPagina;

if(isset($_GET['nome'])){
  $quantidade = $edicoes->contadorPesquisa($_GET['nome']);
  $index = $edicoes->paginacaoPesquisa($_GET['nome'], $maxPorPagina, $inicio);
  $url = 'edicoes.php?pagina=(:num)&nome=' . $_GET['nome'];
  $queryResult = $index;
}else{
  $quantidade = $edicoes->contador();
  $index = $edicoes->paginacao($maxPorPagina, $inicio);
  $queryResult = $index;
}

$paginator = new Paginator($quantidade, $maxPorPagina, $paginaAtual, $url);
$paginator->setMaxPagesToShow(7);
  //Fim paginacao


if (isset($_POST['select'])) {
    $edicoes->setEventos($_POST['eventos_id']);
}

if(isset($_POST['insert'])){
    $edicoes->setNumero($_POST['numero']);
    $edicoes->setCapacidade($_POST['capacidade']);
    $edicoes->setLotacao($_POST['lotacao']);
    $edicoes->setEventos($_POST['eventos_id']);

    if($edicoes->insert() == 1){
        $result = "Edição inserida com sucesso!";
    }else{
        $error = "Erro ao inserir. Tente novamente";
    }
}

if(isset($_POST['edit'])){
    $edicoes->setId($_POST['id']);
    $edicoes->setNumero($_POST['numero']);
    $edicoes->setCapacidade($_POST['capacidade']);
    $edicoes->setLotacao($_POST['lotacao']);
    $edicoes->setEventos($_POST['eventos_id']);

    if($edicoes->edit() == 1){
        $result = "Edição alterada com sucesso!";
    }else{
        $error = "Erro ao alterar. Tente novamente";
    }
}


if(isset($_POST['delete'])){
    $edicoes->setId($_POST['id']);

    if($edicoes->delete() == 1){
        $result = "apagou";
    }else{
        $error = "erro";
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
        <a href="./adicionaredicao.php">
          <button type="button" class="btn btn-warning">Adicionar</button>
      </a>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group  is-empty">
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Pesquisar">
            <span class="material-input"></span>
        </div>
        <button type="submit" name="pesquisa" id="pesquisa" class="btn btn-white btn-round btn-just-icon">
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
                    <h4 class="title">Edição</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Evento</th>
                            <th>Numero</th>
                            <th>Capacidade</th>
                            <th>Lotação</th> 
                            <th class="actions">Ações</th>
                        </thead>
                        <tbody>

                            <?php

                            $todasEdicoes = $edicoes->index();
                            while($row = $todasEdicoes->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <tr>
                                    <?php 
                                    $todosEventos = $eventos->index();
                                    while($rowEvento = $todosEventos->fetch(PDO::FETCH_OBJ)){
                                       if($rowEvento->id == $row->eventos_id){ ?>
                                       <td class="evento"><?php echo $rowEvento->nome ?></td>
                                       <?php } } ?>
                                       <td class="numero"><?php echo $row->numero; ?></td>
                                       <td class="capacidade"><?php echo $row->capacidade; ?></td>                                                  
                                       <td class="lotacao"><?php echo $row->lotacao; ?></td>
                                       <td class="actions">
                                        <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row->id ?>" ><i class="material-icons">delete</i></a>
                                        <a href="./editaredicao.php?id=<?php echo $row->id ?>"><i class="material-icons">mode_edit</i></a>
                                    </td> 
                                </tr>


                                <?php

                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /#list -->
                <div id="bottom" class="row" align="center">
                  <div class="col-md-12">
                    <?php echo $paginator->toHtml(); ?>
                  </ul><!-- /.pagination -->
                </div>
              </div> <!-- /#bottom -->
            </div><!-- /#main -->
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<?php

$todasEdicoes = $edicoes->index();
while($row = $todasEdicoes->fetch(PDO::FETCH_OBJ)){
    ?>
    <div class="modal fade" id="exampleModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="edicao.php" method="post">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
<!--         <span aria-hidden="true">X</span>
-->        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
    Dessa excluir essa edição?
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
<script type="application/javascript">
    var active = document.getElementById("edicao");
    active.classList.add("active");
</script>
<?php
require_once 'footer.php';
?>

 <script>
                  $(document).ready(function() {
                   setTimeout("$('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 )");
                  $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-success").alert('close');
                  window.location.href = "edicao.php";
                  });
                  $(".alert-danger").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-danger").alert('close');
                  window.location.href = "edicao.php";
                  });
                 });
               </script>