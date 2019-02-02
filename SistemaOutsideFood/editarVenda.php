 <?php
 require_once 'headercliente.php';

 ?>   

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Atualizar</h4>
                        <p class="category">Atualize suas vendas</p>
                    </div>
                    <div class="card-content">
                        <form action="evento.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Evento</label>
                                        <select id="select" name="cidades_id" id="cidades_id" for="cidade" action="evento.php" class="form-control">
                                            <option>Selecione</option>
                                                <option id="" value=""></option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Prato</label>
                                            <select id="select" name="locais_id" id="locais_id" for="local" action="evento.php" class="form-control">
                                            <option>Selecione</option>
                                                <option id="" value=""></option>                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Quantidade</label>
                                        <input type="number" name="nome" class="form-control">
                                    </div>
                                </div>
                                
                            </div>

                                <button type="submit" name="insert" id="btnamarelo" class="btn btn-primary pull-right">Atualizar Venda</button>
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
    var active = document.getElementById("vendas");
    active.classList.add("active");
</script>
