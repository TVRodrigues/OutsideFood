<?php
 require_once 'headeradmin.php';
 require_once 'assets/php/classes/classEdicoes.php';
 require_once 'assets/php/classes/classEventos.php';
 $edicoes = new Edicoes();
 $eventos = new Eventos();
 ?>   

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Cadastrar</h4>
                        <p class="category">Cadastre o espaço do evento</p>
                    </div>
                    <div class="card-content">
                        <form action="edicao.php" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Evento</label>
                                        <select id="select" name="eventos_id" id="eventos_id" for="eventos" action="edicao.php" class="form-control">
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

                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Edição</label>
                                        <input type="number" name="numero" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Capacidade</label>
                                        <input type="number" name="capacidade" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Lotação</label>
                                        <input id="formulario" name="lotacao" type="number" class="form-control">
                                    </div>
                                </div>
                                
                                </div>
                                <button type="submit" name="insert" id="btnamarelo" class="btn btn-primary pull-right">Adicionar Edição</button>

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