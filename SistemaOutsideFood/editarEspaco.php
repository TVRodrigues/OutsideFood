<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classEspacos.php';

$espacos = new Espacos();
$espacos->setId($_GET['id']);
$esp = $espacos->view();
?>   

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Atualizar</h4>
                        <p class="category">Atualize o espaço do evento</p>
                    </div>
                    <div class="card-content">
                        <form action="espaco.php" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" value="<?php echo $esp->nome ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Aluguel</label>
                                        <input type="text" name="aluguel" class="form-control" value="<?php echo $esp->aluguel ?>" onkeyup="moeda(this);">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Metragem</label>
                                        <input id="formulario" type="number" name="metragem" class="form-control" value="<?php echo $esp->metragem ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Benfeitoria</label>
                                        <input id="formulario" type="text" name="benfeitoria" class="form-control" value="<?php echo $esp->benfeitoria ?>">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $esp->id ?>">
                            <button type="submit" name="edit" id="btnamarelo" class="btn btn-primary pull-right">Atualizar Espaço</button>
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

<script type="text/javascript">
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
