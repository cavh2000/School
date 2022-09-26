<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	include 'header.php';

  include 'registrosBD.php';

	if(isset($_POST['submit'])){
		$errors=array();
	
if(!$_POST['terms']){
    $errors[]="Debes aceptar los términos <br>";
  }
	
 if($_POST['apePat']==""){
      $errors[]="Apellído Paterno vacío <br>";
    }if($_POST['apePat']==is_numeric($_POST['apePat'])){
    $errors[]="Apellído no válido <br>";
  }if($_POST['apePat']!=ltrim($_POST['apePat'])){
    $errors[]="Apellído sin espacios al inicio  <br>";
  }//Filtro para validar una cadena
    $apePat=filter_var($_POST['apePat'],
    FILTER_SANITIZE_STRING);

    if($_POST['apeMat']==""){
      $errors[]="Apellído Materno vacío <br>";
    }if($_POST['apeMat']==is_numeric($_POST['apeMat'])){
    $errors[]="Apellido Materno no válido <br>";
  }if($_POST['apeMat']!=ltrim($_POST['apeMat'])){
    $errors[]="Apellido Materno no válido <br>";
  }//Filtro para validar una cadena
    $apeMat=filter_var($_POST['apeMat'],
    FILTER_SANITIZE_STRING);

    if($_POST['name']==""){
    $errors[]="Nombre vacío <br>";
  } if($_POST['name']==is_numeric($_POST['name'])){
    $errors[]="Nombre no válido <br>";
  }if($_POST['name']!=ltrim($_POST['name'])){
    $errors[]="Nombre no válido <br>";
  }
  //Filtro para validar una cadena
  $name=filter_var($_POST['name'],
  FILTER_SANITIZE_STRING);

  
  if($_POST['rfcp']==""){
    $errors[]="RFC vacío <br>";
  }if($_POST['rfcp']!=trim($_POST['rfcp'])){
    $errors[]="RFC no valido <br>";
  }

  //Filtro para validar una cadena
  $name=filter_var($_POST['rfcp'],
  FILTER_SANITIZE_STRING);
  
  //Email
  if($_POST['email']==""){
    $errors[]="Email vacío <br>";
  }
  if(!filter_var($_POST['email'],
  FILTER_VALIDATE_EMAIL)){
    $errors[]="Email no válido <br>";
  }
  $email=$_POST['email'];
if($_POST['Contraseña']==""){
      $errors[]="Contraseña vacía <br>";
    }if($_POST['Contraseña']!=trim($_POST['Contraseña'])){
      $errors[]="Su contraseña tiene espacios <br>";
    }if($_POST['Contraseña']!=$_POST['Contraseña2']){
      $errors[]="Su contraseña es diferente <br>";
    } ////Filtro para validar una cadena
    $pass=filter_var($_POST['Contraseña'],
    FILTER_SANITIZE_STRING);

    require 'conexion.php';

      $sql="select *from maestros where idMae = '$_REQUEST[rfcp]';";

      $result = mysqli_query($conn,$sql);
      

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);

      
      // Si si sale 1 row al contar es porque si existe
      if($count == 1) 
      {
        $errors[]="RFC ya existente";
        mysqli_close($conn);
      }
      else
      {
        mysqli_close($conn);
      }

if(!$errors){
		$response['status']="sucess";
		$response['msg']="Registro exitoso";

		$conn=new Registra();
		$conn->registraMae();
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
		<h1><br>Registro de Usuario (Maestro)</h1>
  		<p>Llene la informacion solicitada a continuacion para el registro de su cuenta</p>
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

	
  
  <form action="registro_de_maestros.php" method="post">
 <div class="form-group">
   <label for="apePat" class="control-label">Apellido Paterno</label>
  <div>
    <input type="text"
    class="form-control required" name="apePat" placeholder="Ejempo: Hernández" required>
  </div>
 </div><!--Apellido Paterno-->

 <div class="form-group">
  <label for="apeMat" class="control-label">Apellido Materno</label>
  <div>
    <input type="text"
    class="form-control required" name="apeMat" placeholder="Ejempo: Gómez" required>
  </div>
 </div><!--Apellido Materno-->

  <div class="form-group">
  <label for="name" class="control-label">Nombre(s)</label>
  <div>
    <input type="text"
    class="form-control required" name="name" placeholder="Ejempo: Fernanda" required>
  </div>
 </div><!--Nombres-->

 <div class="form-group">
    <label for="rfcp" class="control-label">RFC</label>
    <div>
    <input type="text" class="form-control required" maxlength="14" name="rfcp" placeholder="Teclee su RFC" required>
</div>
    <small id="rfcpHelp" class="form-text text-muted"></small>
  </div><!-- RFC-->

  <div class="form-group">
    <label for="Email" class="control-label">Introduzca la direccion de su correo electronico</label>
    <div>
    <input type="text" class="form-control required" name="email" placeholder="ejemplo@mail.com" required>
</div>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div><!-- Email-->


  <div class="form-group">
    <div> <label for="Contraseña">Elija una contraseña para su registro</label></div>
    <input type="password" class="form-control required" name="Contraseña" placeholder="Contraseña de Usuario" required>
  </div><!-- Contraseña-->

  <div class="form-group">
    <div> <label for="Contraseña2"></label></div>
    <input type="password" class="form-control required" name="Contraseña2" placeholder="Confirmar contraseña" required>
  </div><!-- Contraseña-->

  <div class="form-group">
      <label>Términos y condiciones</label>
      <div class="checkbox">
        <label>
          <input type="checkbox"
          name="terms" checked>
          Acepto términos y condiciones 
        </label>
         <label style="color:#2E9AFE"> <a  href="terminis_y_condicones.html">(ver términos y condiciones)</a></label>
      </div>
    </div><!--Términos y condiciones-->

  <button type="submit" 
		class="btn btn-primary btn-lg btn-block"
		name="submit">Enviar</button>








	</form>
</div>


<?php include 'footer.php'?>