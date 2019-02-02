<?php
	require_once 'headercliente.php';
    require_once 'assets/php/classes/classIngredientes.php';

    $ingrediente = new Ingredientes();
?>

           <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Cadastrar</h4>
                                    <p class="category">Cadastre o ingrediente</p>
                                </div>
                                <div class="card-content">
                                    <form action="ingredientes.php" method="post">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control">
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                        <button type="submit" name="insert" id="btnamarelo" class="btn btn-primary pull-right">Adicionar Ingrediente</button>
                                        <div class="clearfix"></div>
                                    </form>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script type="application/javascript">
    var active = document.getElementById("ingredientes");
    active.classList.add("active");
</script>