<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  include 'header_administradores.php'; 
  include 'registrosBD.php';

  
?>


  <div id="response"></div>
  <div class="col-xs-12 col-sm-12 col-md-12">

 <form action="mostrar_grupos.php" method="post">
  <div class="form-group">

    <?php 
    require 'conexion.php';
    ?> 
    <br>
    <h1>Grupos de la mañana:</h1><br>
    <table class="table table-sm table-light">
  
  <tbody>
    <tr>
         <th scope="row">Primero</th>
        <?php $sql="select *from grupo where grupo='primero';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
           
      <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
    <tr>
        <th scope="row">Segundo</th>
        <?php $sql="select *from grupo where grupo='segundo';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
    <tr>
        <th scope="row">Tercero</th>
        <?php $sql="select *from grupo where grupo='tercero';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
    <tr>
        <th scope="row">Cuarto</th>
        <?php $sql="select *from grupo where grupo='cuarto';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>

    <tr>
        <th scope="row">Quinto</th>
        <?php $sql="select *from grupo where grupo='quinto';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>

    <tr>
        <th scope="row">Sexto</th>
        <?php $sql="select *from grupo where grupo='sexto';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
   
  </tbody>
</table>
    

     <br>
    <h1>Grupos de la tarde:</h1><br>
    <table class="table table-sm table-light">
  
  <tbody>
    <tr>
         <th scope="row">Primero</th>
        <?php $sql="select *from grupo where grupo='primerov';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
           
      <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
    <tr>
        <th scope="row">Segundo</th>
        <?php $sql="select *from grupo where grupo='segundov';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
    <tr>
        <th scope="row">Tercero</th>
        <?php $sql="select *from grupo where grupo='tercerov';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
    <tr>
        <th scope="row">Cuarto</th>
        <?php $sql="select *from grupo where grupo='cuartov';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>

    <tr>
        <th scope="row">Quinto</th>
        <?php $sql="select *from grupo where grupo='quintov';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>

    <tr>
        <th scope="row">Sexto</th>
        <?php $sql="select *from grupo where grupo='sextov';";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
      
       <td class="table-active"><?php echo $row['idGrupo'];?></td>
      <?php } 
        //Liberas el resultado 
        mysqli_free_result($result); 
        ?> 
      
    </tr>
   
  </tbody>
</table>
        
        <?php
        //Cerras coneccion 
        mysqli_close($conn); 
        ?> 
      
</div>
  </form>
</div>

<br><br>
<?php include 'footer.php'?>




