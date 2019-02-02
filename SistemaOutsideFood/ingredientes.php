<?php
	require_once 'headercliente.php';
  require_once 'assets/php/classes/classIngredientes.php';

    $ingrediente = new Ingredientes();

    if(isset($_POST['insert'])){
      $ingrediente->setNome($_POST['nome']);

      if($ingrediente->insert() == 1){
        $result = "Ingrediente inserido com sucesso";
      }else{
        $error = "Erro ao inserir";
      }
    }

     if(isset($_POST['edit'])){
      $ingrediente->setId($_POST['id']);
      $ingrediente->setNome($_POST['nome']);

      if($ingrediente->edit() == 1){
        $result = "Ingrediente editado com sucesso";
      }else{
        $error = "Erro ao editar";
      }
    }


    if(isset($_POST['delete'])){
      $ingrediente->setId($_POST['id']);

      if($ingrediente->delete() == 1){
        $result = "Ingrediente deletado com sucesso";
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
                    <a href="./adicionaringrediente.php">
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
                                    <h4 class="title">Ingredientes</h4>
                                </div>
      
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Nome</th>
                                             <th class="actions">Ações</th>
                                        </thead>
                                        <tbody>
                                          <?php $todosIng = $ingrediente->index();
                                          while($row = $todosIng->fetch(PDO::FETCH_OBJ)){ ?>

                                                <tr>

                                                    <td class="nome"><?php echo $row->nome ?></td>
                                                        <td class="actions">
                                                        <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row->id ?>" ><i class="material-icons">delete</i></a>
                                                        <a href="./editaringrediente.php?id=<?php echo $row->id ?>"><i class="material-icons">mode_edit</i></a>
                                                      </td>                                                  
                                                </tr>

                                                <?php } ?>
                                                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /#list -->
                <div id="bottom" class="row" align="center">
                  <div class="col-md-12">
   
                  </ul><!-- /.pagination -->
                </div>
              </div> <!-- /#bottom -->
            </div><!-- /#main -->
                        </div>
                    </div>
                </div>
            </div>


<!-- Modal -->
<?php $todosIng = $ingrediente->index();
                                          while($row = $todosIng->fetch(PDO::FETCH_OBJ)){ ?>
                                          <form action="ingredientes.php" method="post">
<div class="modal fade" id="exampleModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Dessa excluir esse ingrediente?
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
</form>
<?php } ?>
<?php
require_once 'footer.php';
?>


 <script>
                  $(document).ready(function() {
                   setTimeout("$('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 )");
                  $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-success").alert('close');
                  window.location.href = "ingredientes.php";
                  });
                  $(".alert-danger").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-danger").alert('close');
                  window.location.href = "ingredientes.php";
                  });
                 });
               </script>

<script type="application/javascript">
    var active = document.getElementById("ingredientes");
    active.classList.add("active");
</script>