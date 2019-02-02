<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classAlbuns.php';
require_once 'assets/php/classes/classEventos.php';

$album = new Albuns();
$eventos = new Eventos();
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Cadastrar</h4>
                        <p class="category">Cadastre as fotos do álbum</p>
                    </div>
                    <div class="card-content">
                        <form action="albumfotos.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Evento</label>
                                        <select id="select" name="eventos_id" id="eventos_id" for="eventos" action="albumfotos.php" class="form-control">
                                            <option>Selecione</option>
                                            <?php 
                                            $stmtEvento = $eventos->index();
                                            while($rowEvento = $stmtEvento->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                <option id="<?php echo $rowEvento->id; ?>" value="<?php echo $rowEvento->id; ?>"><?php echo $rowEvento->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- IMPORTANT:  FORM's enctype must be "multipart/form-data" -->
                                    <div class="col-md-12" style="padding-right: 10px;">
                                        <input name="foto[]" id="foto" type="file" multiple="" />
                                  </div>
                              </div>
                              
                              <button type="submit" name="insert" id="btnamarelo" class="btn btn-primary pull-right">Adicionar Fotos</button>

                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>                                
              </div>
          </div>
      </div>
  </div>
</div>

<?php
require_once 'footer.php';
?>

<script>
  //get the input and UL list
  var input = document.getElementById('filesToUpload');
  var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
  list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
  //add to list
  var li = document.createElement('li');
  li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
  list.append(li);
}
</script>  

<script type="application/javascript">
    var active = document.getElementById("album");
    active.classList.add("active");
</script>
