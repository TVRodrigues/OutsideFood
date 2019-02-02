<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classEdicoes.php';
require_once 'assets/php/classes/classEventos.php';

$edicoes = new Edicoes();
$eventos = new Eventos();
$edicoes->setId($_GET['id']);
$edi = $edicoes->view();
?>   

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Atualizar</h4>
                        <p class="category">Atualize a edição</p>
                    </div>
                    <div class="card-content">
                        <form action="edicao.php" method="post">
                           <div class="row">
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Evento</label>
                                        <?php 
                                        $todosEventos = $eventos->index();
                                        while($rowEvento = $todosEventos->fetch(PDO::FETCH_OBJ)){
                                           if($rowEvento->id == $edi->eventos_id){ ?>
                                           <input type="text" name="eventos_id" class="form-control" value="<?php echo $rowEvento->nome; ?>" readonly>
                                           <?php } } ?>
                                   </div>
                               </div>


                               <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Edição</label>
                                    <input type="number" name="numero" class="form-control" value="<?php echo $edi->numero ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Capacidade</label>
                                    <input type="number" name="capacidade" class="form-control" value="<?php echo $edi->capacidade ?>">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lotação</label>
                                    <input id="formulario" name="lotacao" type="number" class="form-control" value="<?php echo $edi->lotacao ?>">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $edi->id ?>">
                        <button type="submit" name="edit" id="btnamarelo" class="btn btn-primary pull-right">Atualizar Edição</button>

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