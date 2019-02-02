<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classAlbuns.php';

$album = new Albuns();

if(isset($_POST['insert'])){
  $album->setEvento($_POST['eventos_id']);

  /*if(isset($_POST['insert'])){*/
    foreach ($_POST['foto'] as $imagem) {
      echo $imagem."<br>";
      if($_FILES['foto']['error'] != 4){
        if($_FILES['foto']['size'] != 1000000){
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
      $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
      $foto = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

      if (!file_exists('../' . 'assets/img/nomeAlbum/' . $foto)) {
        $album->setFoto('assets/img/nomeAlbum/' . $imagem);
        $allowed = array('image/jpeg', 'image/jpg', 'image/png', 'another/type');
        if(in_array($_FILES['foto']['type'], $allowed)){
          if(!move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/nomeAlbum/' . $imagem)){
            die('Erro ao salvar imagem, tente novamente!');
          }else{

            if($album->insert() == 1){
              $result = "Album inserido com sucesso!";
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
     <a href="./adicionarfotos.php">
       <button type="button" class="btn btn-warning">Adicionar</button>
     </a>
     <div class="collapse navbar-collapse">
      <div class="form-group label-floating">
        <label class="control-label">Evento</label>
        <select id="select" name="cidades_id" id="cidades_id" for="cidade" action="evento.php" class="form-control">
          <option>Selecione</option>
          <option id="" value=""></option>                   
        </select>
      </div>   <form class="navbar-form navbar-right" role="search" action="evento.php" method="get">
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
      <h4 class="title">Galeria</h4>
    </div>
    <div class="card-content table-responsive">
      <?php $todasFotos = $album->index();
      while($row = $todasFotos->fetch(PDO::FETCH_OBJ)){
        ?>
        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
          <img src="<?php echo $row->foto ?>" class="img-responsive">

        </div>

        <?php } ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php 
require_once 'footer.php';
?>

<script type="application/javascript">
  var active = document.getElementById("album");
  active.classList.add("active");
</script>