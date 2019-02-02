<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classEspacos.php';
require_once 'assets/vendor/autoload.php';

$espacos = new Espacos();
use JasonGrimes\Paginator;

//Paginacao
$maxPorPagina = 150;
$paginaAtual = filter_var(isset($_GET['pagina']) ? $_GET['pagina'] : 1, FILTER_SANITIZE_NUMBER_INT);

$url = 'espacos.php?pagina=(:num)';
$inicio = ($maxPorPagina * $paginaAtual) - $maxPorPagina;

if(isset($_GET['nome'])){
  $quantidade = $espacos->contadorPesquisa($_GET['nome']);
  $index = $espacos->paginacaoPesquisa($_GET['nome'], $maxPorPagina, $inicio);
  $url = 'espacos.php?pagina=(:num)&nome=' . $_GET['nome'];
  $queryResult = $index;
}else{
  $quantidade = $espacos->contador();
  $index = $espacos->paginacao($maxPorPagina, $inicio);
  $queryResult = $index;
}

$paginator = new Paginator($quantidade, $maxPorPagina, $paginaAtual, $url);
$paginator->setMaxPagesToShow(7);
  //Fim paginacao

if(isset($_POST['insert'])){
  $espacos->setNome($_POST['nome']);
  $espacos->setAluguel($_POST['aluguel']);
  $espacos->setMetragem($_POST['metragem']);
  $espacos->setBenfeitoria($_POST['benfeitoria']);

  if($espacos->insert() == 1){
    $result = "Espaço inserido com sucesso!";
  }else{
    $error = "Erro ao inserir. Tente novamente";
  }
}

if(isset($_POST['edit'])){
  $espacos->setId($_POST['id']);
  $espacos->setNome($_POST['nome']);
  $espacos->setAluguel($_POST['aluguel']);
  $espacos->setMetragem($_POST['metragem']);
  $espacos->setBenfeitoria($_POST['benfeitoria']);

  if($espacos->edit() == 1){
    $result = "Espaço editado com sucesso!";
  }else{
    $error = "Erro ao editar. Tente novamente";
  }
}

if(isset($_POST['delete'])){
  $espacos->setId($_POST['id']);
  if($espacos->delete() == 1){
    $result = "apagou";
  }else{
    $error = "erro";
  }
}
?>

<div class="content">
  <div class="container-fluid">
    <div class="collapse navbar-collapse">
      <a href="./adicionarespaco.php">
        <button type="button" class="btn btn-warning">Adicionar</button>
      </a>
      <form class="navbar-form navbar-right"  role="search">
        <div class="form-group  is-empty">
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Pesquisar">
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
            <h4 class="title">Espaço</h4>
          </div>
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-primary">
                <th>Nome</th>
                <th>Aluguel</th>
                <th>Metragem</th>
                <th>Benfeitoria</th>
                <th class="actions">Ações</th>
              </thead>
              <tbody>

                <?php
                for($i=0;$i<sizeof($queryResult);$i++){
                  ?>
                  <tr>

                    <td class="nome"><?php echo $queryResult[$i]->nome; ?></td>
                    <td class="aluguel"><?php echo $queryResult[$i]->aluguel; ?></td>
                    <td class="metragem"><?php echo $queryResult[$i]->metragem; ?></td>
                    <td class="benfeitoria"><?php echo $queryResult[$i]->benfeitoria; ?></td>
                    <td class="actions">
                      <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $queryResult[$i]->id ?>" ><i class="material-icons">delete</i></a>
                      <a href="./editarEspaco.php?id=<?php echo $queryResult[$i]->id ?>"><i class="material-icons">mode_edit</i></a>
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
for($i=0;$i<sizeof($queryResult);$i++){
  ?>
  <div class="modal fade" id="exampleModal<?php echo $queryResult[$i]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="espaco.php" method="post">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
<!--         <span aria-hidden="true">X</span>
-->        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
  Dessa excluir esse espaço?
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
  <input type="hidden" name="id" value="<?php echo $queryResult[$i]->id ?>">
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
  var active = document.getElementById("espaco");
  active.classList.add("active");
</script>