<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  include 'header_maestros.php'; 
  include 'registrosBD.php';
?>


  <div id="response"></div>
  <div class="col-xs-12 col-sm-12 col-md-12">

 <form action="mostrar_espacios.php" method="post">


  <div class="form-group">
  



  <div id="response"></div>
  <div class="col-xs-12 col-sm-8 col-md-8">
  
    <?php 
    require 'conexion.php';
    ?> 
    <br>
    <h1>Espacios:</h1><br>
    <table class="table table-sm table-light">

  <thead>
    <tr class ="table-success">
      <th scope="col">ID</th>
      <th scope="col">Espacio</th>
      <th scope="col">Computadora</th>
      <th scope="col">Proyector</th>
      <th scope="col">Televisión</th>
      <th scope="col">Audio</th>
    </tr>
  </thead>
  
  <tbody>
    <?php $sql="select *from espacios ;";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
    <tr>
        
      <th scope="row"><?php echo $row['idEsp'];?></th>
      <th class="table-active"><?php echo $row['espacio'];?></th>
      <th class="table-active"><?php if($row['compu']=='s'){echo "Sí";}else{if($row['compu']=='n'){echo "No";}else{echo "";}} ?></th>
      <th class="table-active"><?php if($row['proyec']=='s'){echo "Sí";}else{if($row['proyec']=='n'){echo "No";}else{echo "";}} ?></th>
      <th class="table-active"><?php if($row['tv']=='s'){echo "Sí";}else{if($row['tv']=='n'){echo "No";}else{echo "";}} ?></th>
      <th class="table-active"><?php if($row['aud']=='s'){echo "Sí";}else{if($row['aud']=='n'){echo "No";}else{echo "";}} ?></th> 
    </tr>
   <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        mysqli_close($conn);
        ?> 
  </tbody>
</table>
    
    



    


 
  


</div>
  </form>
</div>

<br><br>
<?php include 'footer.php'?>