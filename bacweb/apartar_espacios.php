<?php include 'header_maestros.php'; 
include 'registrosBD.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['submit'])){
    $errors=array();

    if($_POST['salon']==""){
      $errors[]="Favor de llenar el campo de espacio <br>";
    }

    if($_POST['hora']==""){
      $errors[]="Favor de llenar el campo de hora <br>";
    }

    if($_POST['dia']==""){
      $errors[]="Favor de llenar el campo de dia <br>";
    }

    if($_POST['dia']!="" and $_POST['hora']!="" and $_POST['hora']!=""){

    require 'conexion.php';
    $sql="select *from apartados where idEsp = '$_REQUEST[salon]' and idHor = '$_REQUEST[hora]' and idDia = '$_REQUEST[dia]';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      
      $count = mysqli_num_rows($result);

      if($count == 1) 
      {
        $errors[]="Ya está apartado";
        mysqli_close($conn);
      }
      else
      { 
        mysqli_close($conn);
      }

    }
     

if(!$errors){
    $response['status']="sucess";
    $response['msg']="Registro exitoso"; 

    $conn=new Registra();
    $conn->registraApart();
  }else{
    $response['status']="error";
    $response['msg']="Los siguientes
    errores sucedieron: ";
    $response['errors']=$errors;
  }
  
}
?>

<div id="response"></div>
	<div class="col-xs-12 col-sm-8 col-md-8">
    <h1><br>Apartado de espacios</h1>
      <p>Llene la solicitud para el registro de su pedido</p>
   <!--Si hay response -->
    <?php if(isset($response)): ?>
      <!--El dive recibe la clase de auerdo al response status -->
      <div class="<?php echo $response['status']; ?>"

        <p><?php echo $response['msg']; ?></p>
    
        <!--Si hay errores -->
        <?php if(isset($response['errors'])); ?>

        <ul>
          <?php foreach ((array)$response['errors'] as $error): ?>
          <li><?php echo $error; ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>


	
  
  <form action="apartar_espacios.php" method="post">
 <div class="form-group">

<?php 
	require 'conexion.php';
?> 
	<br>
    <h1>Espacios:</h1><br>
    <table class="table table-sm table-light">

  <thead>
    <tr class ="table-success">
      <th scope="col">Espacio</th>
      <th scope="col">Computadora</th>
      <th scope="col">Proyector</th>
      <th scope="col">Televisión</th>
      <th scope="col">Audio</th>
    </tr>
  </thead>
  
  <tbody>
    <?php  $sql="select *from espacios  ;";
            $result = mysqli_query($conn,$sql);

            //Aca recorres todas las filas y te va devolviendo el resultado 
            while ($row =mysqli_fetch_array($result)) { ?> 
    <tr>
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

<?php 
  require 'conexion.php';
?> 
 

<div class="form-group">
			<label class="control-label">¿Cuál espacio desea apartar?:</label>
			<select class="form-control" name="salon" id="salon">
				<option value="0" disabled selected>Seleccionar espacio</option>
				<?php $sql="select *from espacios ;";
    				$result = mysqli_query($conn,$sql);
    				$n= mysqli_num_rows( $result);
				for($aux=1;$aux<=$n+1;$aux ++){
				$row =mysqli_fetch_array($result) ?>
				<option value='<?php echo $row['idEsp']?>'><?php echo $row['espacio']?></option>
				<?php } ?>
			</select>
		</div><!--Salon-->

<div class="form-group">
			<label class="control-label">¿En qué hora?:</label>
			<select class="form-control" name="hora" id="hora">
				<option value="0" disabled selected>Seleccionar hora</option>
				<?php $sql="select *from horas ;";
    				$result = mysqli_query($conn,$sql);
    				$n= mysqli_num_rows( $result);
				for($aux=1;$aux<=$n+1;$aux ++){
				$row =mysqli_fetch_array($result) ?>
				<option value='<?php echo $row['idHor']?>'><?php echo $row['horas']?></option>
				<?php } ?>
			</select>
		</div><!--Hora-->

<div class="form-group">
			<label class="control-label">¿En qué día?:</label>
			<select class="form-control" name="dia" id="dia">
				<option value="0" disabled selected>Seleccionar día</option>
				<?php $sql="select *from dias ;";
    				$result = mysqli_query($conn,$sql);
    				$n= mysqli_num_rows( $result);
				for($aux=1;$aux<=$n+1;$aux ++){
				$row =mysqli_fetch_array($result) ?>
				<option value='<?php echo $row['idDia']?>'><?php echo $row['dia']?></option>
				<?php } ?>
			</select>
		</div><!--Hora-->

<?php mysqli_close($conn); ?> 

		<button type="submit" 
    class="btn btn-primary btn-lg " 
    name="submit">Guardar</button>




	</form>
</div>




<?php include 'footer.php'; ?>