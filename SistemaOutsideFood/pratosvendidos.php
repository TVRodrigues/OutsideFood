<?php
    require_once 'headeradmin.php';
  ?>
<div class="content">
 <div class="container-fluid">
  <div class="collapse navbar-collapse">
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
      <h4 class="title">Pratos mais vendidos</h4>
  </div>
  <div class="card-content table-responsive">
      <table class="table">
       <thead class="text-primary">
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Preço</th>
    </thead>
    <tbody>

         <tr>
             <td class="tipo">Rouge</td>
             <td class="salario">1000</td>
             <td>R$10,00</td>


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