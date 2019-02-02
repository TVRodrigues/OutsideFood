<?php
require_once 'headeradmin.php';
require_once 'assets/php/classes/classServicos.php';
require_once 'assets/php/classes/classVendas.php';
$servicos = new Servicos();
$vendas = new Vendas();

if(isset($_GET['nome'])&&isset($_GET['numero'])){
  $ranking = $vendas->quantidadePratosFT($_GET['nome'],$_GET['numero']);
  $rankingBarraca = $vendas->quantidadePratosB($_GET['nome'],$_GET['numero']);
}else{
  $ranking = $vendas->quantidadePratosFT();
   $rankingBarraca = $vendas->quantidadePratosB();
}

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
      <h4 class="title">Ranking dos food trucks e barracas que mais venderam</h4>
    </div>
    <div class="card-content table-responsive">
      <div class="col-md-6">
        <table class="table">
         <thead class="text-primary">
          <th>Colocação</th>
          <th>Food Truck</th>
          <th>Quantidade</th>
        </thead>
        <tbody>
          <?php
          $i = 0;
          while($row = $ranking->fetch(PDO::FETCH_OBJ)){
            $i++;
            ?>
            <tr>
             <td class="ranking"><?php echo $i ?></td>
             <td class="food"><?php echo $row->nome ?></td>
             <td class="quantidade"><?php echo $row->quantidade ?></td>
           </tr>
           <?php } ?>
         </tbody>
       </table>
     </div>
     <div class="col-md-6">
       <table class="table">
        <thead class="text-primary">
          <th>Colocação</th>
          <th>Barraca</th>
          <th>Quantidade</th>
        </thead>  
        <tbody>
          <?php
          $j=0;
          while($rowBarraca = $rankingBarraca->fetch(PDO::FETCH_OBJ)){
            $j++;
            ?>
            <tr>
             <td class="ranking"><?php echo $j ?></td>
             <td class="barraca"><?php echo $rowBarraca->nome ?></td>
             <td class="quantidade"><?php echo $rowBarraca->quantidade ?></td>

           </tr>

           <?php } ?>
         </tbody>
       </table>
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
  var active = document.getElementById("dashboard");
  active.classList.add("active");
</script>