<?php
require_once 'headercliente.php';
require_once 'assets/php/classes/classServicos.php';
require_once 'assets/php/classes/classEspacos.php';
$servicos = New Servicos();
$espacos = New Espacos();

$servicos->setId($_GET['id']);
$serv = $servicos->view();
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Atualizar</h4>
                        <p class="category">Atualize seu serviço</p>
                    </div>
                    <div class="card-content">
                        <form action="servico.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Nome</label>
                                    <div class="form-group label-floating">
                                        <input type="text" name="nome" class="form-control" value="<?php echo $serv->nome ?>">   
                                    </div>
                                </div>

                                <div class="col-md-5">
                                	<label>Tipo</label>
                                    <div class="form-group label-floating">
                                        <?php if($serv->tipo == 0){ ?>
                                        <input type="radio" name="tipo" value="0" checked> Food Truck
                                        <input type="radio" name="tipo" value="1"> Barraca
                                        <?php }else{ ?>
                                        <input type="radio" name="tipo" value="0"> Food Truck
                                        <input type="radio" name="tipo" value="1" checked> Barraca
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Salário</label>
                                        <input type="text" name="salario" class="form-control" onkeyup="moeda(this);" value="<?php echo $serv->salario ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Espaço</label>
                                        <?php 
                                        $todosEspacos = $espacos->index();
                                        while($rowEspacos = $todosEspacos->fetch(PDO::FETCH_OBJ)){
                                           if($rowEspacos->id == $serv->espacos_id){ ?>
                                           <input type="text" name="espacos_id" class="form-control" value="<?php echo $rowEspacos->nome ?>" readonly>
                                           <?php } } ?>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">    
                                <img src="<?php echo $serv->foto ?>" alt="img">
                                <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                    <label>Foto</label>
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview">
                                        <input type="text" name="foto" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <input type="hidden" name="photo_unlink" value = "<?php echo $serv->foto; ?>">
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
                            <input type="hidden" name="id" value="<?php echo $serv->id ?>">
                            <button type="submit" name="edit" id="btnamarelo" class="btn btn-primary pull-right">Atualizar Serviço</button>
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


<script type="application/javascript">
    var active = document.getElementById("servico");
    active.classList.add("active");
</script>


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
    function moeda(z) {
        v = z.value;
        v = v.replace(/\D/g, "") // permite digitar apenas numero
        v = v.replace(/(\d{1})(\d{14})$/, "$1.$2") // coloca ponto antes dos ultimos digitos
        v = v.replace(/(\d{1})(\d{11})$/, "$1.$2") // coloca ponto antes dos ultimos 11 digitos
        v = v.replace(/(\d{1})(\d{8})$/, "$1.$2") // coloca ponto antes dos ultimos 8 digitos
        v = v.replace(/(\d{1})(\d{5})$/, "$1.$2") // coloca ponto antes dos ultimos 5 digitos
        v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2") // coloca virgula antes dos ultimos 2 digitos
        z.value = v;
    }
</script>