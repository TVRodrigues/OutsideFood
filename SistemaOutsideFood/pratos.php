<?php
require_once 'headercliente.php';
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
   <a href="./adicionarprato.php">
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
      <h4 class="title">Pratos</h4>
  </div>
  <div class="card-content table-responsive">
      <table class="table">
       <thead class="text-primary">
        <th>Nome</th>
        <th>Ingredientes</th>
        <th>Foto</th>
        <th>Preço</th>
        <th class="actions">Ações</th>
    </thead>
    <tbody>

         <tr>
             <td class="">Arroz</td>
             <td class="">Arroz</td>
             <td class=""></td>
             <td class="">R$200,00</td>
             <td class="actions">
                      <a href="" data-toggle="modal" data-target="#exampleModal" ><i class="material-icons">delete</i></a>
                      <a href="./editarprato.php"><i class="material-icons">mode_edit</i></a>
                  </td>
              </tr>

      </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="evento.php" method="post">
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
            <input type="hidden" name="id" value="">
            <button id="btnamarelo" type="submit" name="delete" class="btn btn-primary">Sim</button>
        </div>
    </div>
</div>
</form>
</div>
<?php
require_once 'footer.php';
?>


<script type="application/javascript">
    var active = document.getElementById("pratos");
    active.classList.add("active");
</script>
            <script>
                  $(document).ready(function() {
                   setTimeout("$('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 )");
                  $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-success").alert('close');
                  window.location.href = "pratos.php";
                  });
                  $(".alert-danger").fadeTo(1000, 500).slideUp(300, function(){
                  $(".alert-danger").alert('close');
                  window.location.href = "pratos.php";
                  });
                 });
               </script>