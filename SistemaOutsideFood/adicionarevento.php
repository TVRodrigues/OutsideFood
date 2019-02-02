 <?php
 require_once 'headeradmin.php';
 require_once 'assets/php/classes/classEventos.php';
   require_once 'assets/php/classes/classCidades.php';
   require_once 'assets/php/classes/classLocais.php';
   
   $eventos = New Eventos();
   $cidades = New Cidades();
   $locais = New Locais();
 ?>   

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Cadastrar</h4>
                        <p class="category">Cadastre seu evento</p>
                    </div>
                    <div class="card-content">
                        <form action="evento.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Organizador</label>
                                        <input type="text" name="organizador" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Data</label>
                                        <input id="formulario" type="date" name="data" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Horário</label>
                                        <input id="formulario" type="time" name="horario" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Cidade</label>
                                        <select id="select" name="cidades_id" id="cidades_id" for="cidade" action="evento.php" class="form-control">
                                            <option>Selecione</option>
                                            <?php 
                                            $stmtCidade = $cidades->index();
                                            while($rowCidade = $stmtCidade->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                <option id="<?php echo $rowCidade->id; ?>" value="<?php echo $rowCidade->id; ?>"><?php echo $rowCidade->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Local</label>
                                            <select id="select" name="locais_id" id="locais_id" for="local" action="evento.php" class="form-control">
                                            <option>Selecione</option>
                                            <?php 
                                            $stmtLocal = $locais->index();
                                            while($rowLocal = $stmtLocal->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                <option id="<?php echo $rowLocal->id; ?>" value="<?php echo $rowLocal->id; ?>"><?php echo $rowLocal->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                        <label>Banner</label>
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview">
                                            <input type="text" name="foto" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <i class="material-icons">delete_forever</i> Limpar
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <i class="material-icons">search</i>
                                                    <span class="image-preview-input-title">Procurar</span>
                                                    <input type="file" name="foto" accept="image/png, image/jpeg, image/gif"/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><!-- /input-group image-preview [TO HERE]--> 
                                    </div>
                                </div>
                                <button type="submit" name="insert" id="btnamarelo" class="btn btn-primary pull-right">Adicionar Evento</button>
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
    $(document).on('click', '#close-preview', function(){ 
        $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
         $('.image-preview').popover('show');
     }, 
     function () {
         $('.image-preview').popover('hide');
     }
     );    
});

    $(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Visualização</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Trocar");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>