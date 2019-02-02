<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classEventos.php';
require_once 'assets/php/classes/classCidades.php';
require_once 'assets/php/classes/classLocais.php';
require_once 'assets/vendor/autoload.php';

$eventos = New Eventos();
$cidades = New Cidades();
$locais = New Locais();
use JasonGrimes\Paginator;

   //Paginacao
$maxPorPagina = 150;
$paginaAtual = filter_var(isset($_GET['pagina']) ? $_GET['pagina'] : 1, FILTER_SANITIZE_NUMBER_INT);

$url = 'eventos.php?pagina=(:num)';
$inicio = ($maxPorPagina * $paginaAtual) - $maxPorPagina;

if(isset($_GET['nome'])){
 $quantidade = $eventos->contadorPesquisa($_GET['nome']);
 $index = $eventos->paginacaoPesquisa($_GET['nome'], $maxPorPagina, $inicio);
 $url = 'eventos.php?pagina=(:num)&nome=' . $_GET['nome'];
 $queryResult = $index;
}else{
 $quantidade = $eventos->contador();
 $index = $eventos->paginacao($maxPorPagina, $inicio);
 $queryResult = $index;
}

$paginator = new Paginator($quantidade, $maxPorPagina, $paginaAtual, $url);
$paginator->setMaxPagesToShow(7);
     //Fim paginacao


if (isset($_POST['select'])) {
 $eventos->setCidade($_POST['cidades_id']);
 $eventos->setLocal($_POST['locais_id']);
}

if(isset($_POST['insert'])){
 $eventos->setNome($_POST['nome']);
 $eventos->setData($_POST['data']);
 $eventos->setHorario($_POST['horario']);
 $eventos->setOrganizador($_POST['organizador']);
 $eventos->setCidade($_POST['cidades_id']);
 $eventos->setLocal($_POST['locais_id']);

 if($_FILES['foto']['error'] != 4){
   if($_FILES['foto']['size'] <= 1000000){
               date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
               $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
               $foto = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

               if (!file_exists('../' . 'assets/img/eventos/' . $foto)) {
                 $eventos->setFoto('assets/img/eventos/' . $foto);
                 $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'another/type');
                 if(in_array($_FILES['foto']['type'], $allowed)){
                   if(!move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/eventos/' . $foto)){
                     die('Erro ao salvar imagem, tente novamente!');
                   }else{

                     if($eventos->insert() == 1){
                       $result = "Evento inserido com sucesso!";
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
           $eventos->setId($_POST['id']);
           $eventos->setNome($_POST['nome']);
           $eventos->setData($_POST['data']);
           $eventos->setHorario($_POST['horario']);
           $eventos->setOrganizador($_POST['organizador']);
           $eventos->setCidade($_POST['cidades_id']);
           $eventos->setLocal($_POST['locais_id']);

           if(isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
            if($_FILES['foto']['size'] <= 1000000){
date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
$ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
$foto = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
$dir = 'assets/img/eventos/'; //Diretório para BD
$eventos->setFoto($dir.$foto);
$dir = 'assets/img/eventos/'; //Diretório para uploads
move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto); //Fazer upload do arquivo
if(file_exists('../'.$_POST['photo_unlink'])){
  unlink('../'.$_POST['photo_unlink']);
}
if($eventos->edit() == 1){
  $result = "Evento editado com sucesso!";
}else{
  $error = "Erro ao editar. Tente novamente.";
}

}else {
  $error = "A imagem deve possuir tamanho menor que 1Mb!";
}
}else{
  if($eventos->edit2() == 1){
    $result = "Evento editado com sucesso!";
  }else{
    $error = "Erro ao editar. Tente novamente.";
  }
}

}

if(isset($_POST['delete'])){
 $eventos->setId($_POST['id']);

 if($eventos->delete() == 1){
   $result = "Evento deletado com sucesso!";
 }else{
   $error = "Erro ao deletar. Tente novamente";
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
   <a href="./adicionarevento.php">
     <button type="button" class="btn btn-warning">Adicionar</button>
   </a>
   <form class="navbar-form navbar-right" role="search" action="evento.php" method="get">
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
      <h4 class="title">Eventos</h4>
    </div>
    <div class="card-content table-responsive">
      <table class="table">
       <thead class="text-primary">
        <th>Nome</th>
        <th>Data</th>
        <th>Horário</th>
        <th>Organizador</th>
        <th>Cidade</th>
        <th>Local</th>
        <th>Folder</th>
        <th class="actions">Ações</th>
      </thead>
      <tbody>
        <?php
        for($i=0;$i<sizeof($queryResult);$i++){
         ?>
         <tr>
           <td class="nome"><?php echo $queryResult[$i]->nome; ?></td>
           <td class="data"><?php echo date("d/m/Y", strtotime($queryResult[$i]->data)); ?></td>
           <td class="horario"><?php echo $queryResult[$i]->horario; ?></td>
           <td class="organizador"><?php echo $queryResult[$i]->organizador; ?></td>
           <?php 
           $todasCidades = $cidades->index();
           while($rowCidade = $todasCidades->fetch(PDO::FETCH_OBJ)){
            if($rowCidade->id == $queryResult[$i]->cidades_id){ ?>
            <td class="cidade"><?php echo $rowCidade->nome; ?></td>
            <?php } } ?>
            <?php 
            $todosLocais = $locais->index();
            while($rowLocal = $todosLocais->fetch(PDO::FETCH_OBJ)){
              if($rowLocal->id == $queryResult[$i]->locais_id){ ?>
              <td class="local"><?php echo $rowLocal->nome; ?></td>
              <?php } } ?>
              <td class="foto"><img src="<?php echo $queryResult[$i]->foto ?>" alt="img"></td>
              <td class="actions">
                <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $queryResult[$i]->id ?>" ><i class="material-icons">delete</i></a>
                <a href="./editarevento.php?id=<?php echo $queryResult[$i]->id ?>"><i class="material-icons">mode_edit</i></a>
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
</div>
<!-- /#bottom -->
</div>
<!-- /#main -->
</div>
</div>
</div>
</div>
<!-- Modal -->
<?php
for($i=0;$i<sizeof($queryResult);$i++){
 ?>
 <div class="modal fade" id="exampleModal<?php echo $queryResult[$i]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
       var active = document.getElementById("eventos");
       active.classList.add("active");
     </script>
       <script>
    $(document).ready(function() {
     setTimeout("$('#temporizador').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 )");
     $(".alert-success").fadeTo(1000, 500).slideUp(300, function(){
      $(".alert-success").alert('close');
      window.location.href = "evento.php";
    });
     $(".alert-danger").fadeTo(1000, 500).sldideUp(300, function(){
      $(".alert-danger").alert('close');
      window.location.href = "evento.php";
    });
   });
 </script>