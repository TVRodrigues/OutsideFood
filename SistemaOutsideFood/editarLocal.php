 <?php
 require_once 'headeradmin.php';
 require_once 'assets/php/classes/classLocais.php';
 require_once 'assets/php/classes/classCidades.php';

 $locais = New Locais();
 $cidades = New Cidades();

 $locais = new Locais();
 $locais->setId($_GET['id']);
 $loc = $locais->view();
 ?>   

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Atualizar</h4>
                        <p class="category">Atualize o local do evento</p>
                    </div>
                    <div class="card-content">
                        <form action="local.php" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" value="<?php echo $loc->nome ?>">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Cidade</label>
                                        <select id="selectEdit" name="cidades_id" id="cidades_id" for="cidade" action="local.php" class="form-control">
                                            <?php 
                                            $stmtCidade = $cidades->index();
                                            while($rowCidade = $stmtCidade->fetch(PDO::FETCH_OBJ)){
                                                if($loc->cidades_id == $rowCidade->id){
                                                ?>
                                                <option id="<?php echo $rowCidade->id; ?>" value="<?php echo $rowCidade->id; ?>" selected><?php echo $rowCidade->nome ?></option>
                                                <?php }else{  ?>
                                                <option id="<?php echo $rowCidade->id; ?>" value="<?php echo $rowCidade->id; ?>"><?php echo $rowCidade->nome ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="id" value="<?php echo $loc->id ?>">
                                <button type="submit" name="edit" id="btnamarelo" class="btn btn-primary pull-right">Atualizar Local</button>
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

