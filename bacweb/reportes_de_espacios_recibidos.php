<?php include 'header_administradores.php'; ?>

<div id="response"></div>
	<div class="col-xs-12 col-sm-8 col-md-8">

	
  
  <form action="reportes_espacios.php" method="post">
 
  	<div> <label for="mess"><br><br><br>AQUÍ SE VAN A RECIBIR LOS PROBLEMAS EN FORMA DE PDF <br><br><br></label></div>
  
 </div><!-- robvlema descrito-->	

 <?php 
	require 'conexion.php';
?> 
	<br>
    <h1>Problemas reportados:</h1><br>
    <table class="table table-sm table-light">

  <thead>
    <tr class ="table-success">
      <th scope="col">Grupo</th>
      <th scope="col">Materia</th>
      <th scope="col">Área/Salón</th>
      <th scope="col">Problema</th>
      <th scope="col">Descripción</th>
    </tr>
  </thead>
  
  <tbody>
    <?php  $sql="select idGrupo, materia, espacio, idProm, descrip from reportes inner join espacios where reportes.idEsp = espacios.idEsp;";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
    <tr>
      <th class="table-active"><?php echo $row['idGrupo'];?></th>
      <th class="table-active"><?php echo $row['materia']; ?></th>
      <th class="table-active"><?php echo $row['espacio']; ?></th>
      <th class="table-active"><?php if($row['idProm']==1){echo "Máquina lenta";}else{if($row['idProm']==2){echo "Sin internet";}else{if($row['idProm']==3){echo "Problemas con el software";}else{if($row['idProm']==4){echo "Problemas con el hardware";}else{echo "?";}}}}; ?></th>
      <th class="table-active"><?php echo $row['descrip']; ?></th>
    </tr>
   <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        mysqli_close($conn);
        ?> 
  </tbody>
</table><br><br>




	</form>
</div>


<?php include 'footer.php'?>