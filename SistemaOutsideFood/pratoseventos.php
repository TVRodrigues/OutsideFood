<?php
    require_once 'headeradmin.php';
  ?>
<div class="content">
 <div class="container-fluid">
  <div class="collapse navbar-collapse">
                    <div class="form-group label-floating">
                    <label class="control-label">Evento</label>
                    <select id="select" name="cidades_id" id="cidades_id" for="cidade" action="evento.php" class="form-control">
                    <option>Selecione</option>
                    <option id="" value=""></option>                   
                     </select>
                    </div>   <form class="navbar-form navbar-right" role="search" action="evento.php" method="get">
     <div class="ripple-container"></div>
 </button>
</form>
</div>
</div>
<div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
    <div class="card">
     <div class="card-header" data-background-color="orange">
      <h4 class="title">Pratos vendidos nos eventos</h4>
  </div>
  <div class="card-content table-responsive">
      <table class="table">
       <thead class="text-primary">
        <th>Evento</th>
        <th>Prato</th>
        <th>Foto</th>
        <th>Preço</th>
    </thead>
    <tbody>

         <tr>
             <td class="tipo">Rouge</td>
             <td class="salario">Arroz</td>
             <td class="espaco"></td>
             <td class="foto">R$ 20,00</td>

              </tr>

      </tbody>
  </table>
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
    var active = document.getElementById("dashboard");
    active.classList.add("active");
</script>