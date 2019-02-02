 <?php
 require_once 'headeradmin.php';
 require_once 'assets/php/classes/classCidades.php';

 $cidades = new Cidades();
 $cidades->setId($_GET['id']);
 $cid = $cidades->view();

 ?>   

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Atualizar</h4>
                        <p class="category">Edite o nome da cidade</p>
                    </div>
                    <div class="card-content">
                        <form action="cidade.php" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" value="<?php echo $cid->nome ?>">
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="id" value="<?php echo $cid->id ?>">
                            <button type="submit" name="edit" id="btnamarelo" class="btn btn-primary pull-right">Atualizar Cidade</button>
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

