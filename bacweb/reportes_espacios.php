<?php include 'header_maestros.php'; 
include 'registrosBD.php';

error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['submit'])){
    $errors=array();

    if($_POST['grupo']==""){
      $errors[]="Favor de llenar el campo de grupo <br>";
    }

    if($_POST['mater']==""){
      $errors[]="Favor de llenar el campo de materia <br>";
    }

    if($_POST['salon']==""){
      $errors[]="Favor de llenar el campo de área/salón <br>";
    }

    if($_POST['problem']==""){
      $errors[]="Favor de llenar el campo de problemas <br>";
    }
     

if(!$errors){
    $response['status']="sucess";
    $response['msg']="Registro exitoso"; 

    $conn=new Registra();
    $conn->registraReport();
  }else{
    $response['status']="error";
    $response['msg']="Los siguientes
    errores sucedieron: ";
    $response['errors']=$errors;
  }
  
}
?>

<div id="response"></div>
	<div class="col-xs-12 col-sm-12 col-md-12">

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
  
  <form action="reportes_espacios.php" method="post">
 <div class="form-group">
  <?php 
   require 'conexion.php';
    $sql="select *from grupo ;";
    $result = mysqli_query($conn,$sql);
    $n= mysqli_num_rows( $result);
    $aux=0;
  ?> 




 <div class="form-group"><br>
			<label class="control-label">Grupo:</label>
			<select class="form-control" name="grupo" id="grupo">
				<option value="0" disabled selected>Seleccionar grupo</option>
				<?php for($aux=1;$aux<=$n+1;$aux ++){
				$row =mysqli_fetch_array($result) ?>
				<option value='<?php echo $row['idGrupo']?>'><?php echo $row['idGrupo']?></option>
				<?php } ?>
			</select>
		</div><!--Grupo-->



  <div class="form-group">
  	<div> <label for="problemadesc">Materia: </label></div>
    <input type="text" class="form-control required" name="mater" placeholder="Ejemplo: Programación Orientada a Objetos ó POO">
 </div><!-- Asig-->	


	<div class="form-group">
			<label class="control-label">Área/Salón:</label>
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
			<label class="control-label">Problema:</label>
			<select class="form-control" name="problem" id="problem">
				<option value="0" disabled selected>Problemas comunes</option>
				<?php $sql="select *from problemas ;";
    				$result = mysqli_query($conn,$sql);
    				$n= mysqli_num_rows( $result);
				for($aux=1;$aux<=$n+1;$aux ++){
				$row =mysqli_fetch_array($result) ?>
				<option value='<?php echo $row['idProm']?>'><?php echo $row['problemas']?></option>
				<?php } ?>
				
			</select>
		</div><!--Problema-->

<div class="form-group">
  	<div> <label for="problemadesc">Especificación/Descripción del problema: </label></div>
    <input type="text" style="HEIGHT: 80px" size=32 class="form-control required" rows="30" name="problemadesc" placeholder="Ejemplo: Programa/Máquina que tiene el problema">
 </div><!-- robvlema descrito-->	


  <button type="submit" 
		class="btn btn-primary btn-lg "
		name="submit" >Enviar</button>








	</form>
</div>




<?php include 'footer.php'?>