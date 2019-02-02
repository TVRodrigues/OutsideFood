<?php
	require_once 'headeradmin.php';
    require_once 'assets/php/classes/classCidades.php';
    require_once 'assets/vendor/autoload.php';



    $cidades = new Cidades();
    use JasonGrimes\Paginator;

//Paginacao
$maxPorPagina = 150;
$paginaAtual = filter_var(isset($_GET['pagina']) ? $_GET['pagina'] : 1, FILTER_SANITIZE_NUMBER_INT);

$url = 'cidades.php?pagina=(:num)';
$inicio = ($maxPorPagina * $paginaAtual) - $maxPorPagina;

if(isset($_GET['nome'])){
  $quantidade = $cidades->contadorPesquisa($_GET['nome']);
  $index = $cidades->paginacaoPesquisa($_GET['nome'], $maxPorPagina, $inicio);
  $url = 'cidades.php?pagina=(:num)&nome=' . $_GET['nome'];
  $queryResult = $index;
}else{
  $quantidade = $cidades->contador();
  $index = $cidades->paginacao($maxPorPagina, $inicio);
  $queryResult = $index;
}

$paginator = new Paginator($quantidade, $maxPorPagina, $paginaAtual, $url);
$paginator->setMaxPagesToShow(7);
  //Fim paginacao



    if(isset($_POST['insert'])){
    $cidades->setNome($_POST['nome']);
   
    if($cidades->insert() == 1){
        $result = "Cidade inserida com sucesso!";
    }else{
        $error = "Erro ao inserir. Tente novamente";
    }
}

if(isset($_POST['edit'])){
    $cidades->setId($_POST['id']);
    $cidades->setNome($_POST['nome']);

    if($cidades->edit() == 1){
        $result = "Cidade editada com sucesso!";
    }else{
        $error = "Erro ao editar. Tente novamente";
    }
}


if(isset($_POST['delete'])){
    $cidades->setId($_POST['id']);

    if($cidades->delete() == 1){
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
                    <a href="./adicionarcidades.php">
                     	<button type="button" class="btn btn-warning">Adicionar</button>
                 	</a>
                       <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Pesquisar">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" name="pesquisa" id="pesquisa"  class="btn btn-white btn-round btn-just-icon">
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
                                    <h4 class="title">Cidades</h4>
                                </div>
      
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Nome</th>
                                             <th class="actions">Ações</th>
                                        </thead>
                                        <tbody>
                                            
                                                <?php

                                                    for($i=0;$i<sizeof($queryResult);$i++){
                                                ?>
                                                <tr>

                                                    <td class="nome"><?php echo $queryResult[$i]->nome; ?></td>
                                                        <td class="actions">
                                                        <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $queryResult[$i]->id ?>" ><i class="material-icons">delete</i></a>
                                                        <a href="./editarcidade.php?id=<?php echo $queryResult[$i]->id ?>"><i class="material-icons">mode_edit</i></a>
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
    <form action="cidade.php" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
<!--         <span aria-hidden="true">X</span>
 -->        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        Dessa excluir essa cidade?
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


 <script>
                  $(document).ready(function() {
                   setTimeout("$('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 )");
                  $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-success").alert('close');
                  window.location.href = "cidade.php";
                  });
                  $(".alert-danger").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-danger").alert('close');
                  window.location.href = "cidade.php";
                  });
                 });
               </script>

<script type="application/javascript">
    var active = document.getElementById("cidade");
    active.classList.add("active");
</script>
