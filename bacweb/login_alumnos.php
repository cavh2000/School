<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	include 'header.php';

  
if(isset($_POST['submit']))
{
  $errors=array();

  if($_POST['numb']=="")
  {
    $errors[]="No. de boleta vacío <br>";
  }//Filtro para validar una cadena
  $name=filter_var($_POST['rfcp'],FILTER_SANITIZE_STRING);

  if($_POST['Contraseña']=="")
  {
    $errors[]="Contraseña vacía <br>";
  }//Filtro para validar una cadena
  $name=filter_var($_POST['Contraseña'],FILTER_SANITIZE_STRING);

  //ACA INICIA PARA WACHAR SI HAY USUARIO O NO
  require 'conexion.php';
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn,$_POST['numb']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['Contraseña']); 
    $mypassword=hash('sha512', $mypassword);
      
    $sql = "select nombreAl from alumnos where idAl = '$myusername' and contrasenaAl = '$mypassword'";
    $result = mysqli_query($conn,$sql);
      

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
      
    $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) 
    {
      //session_register("myusername");
      $_SESSION['login_user'] = $myusername;
      $_SESSION["user_name"]=$_POST["user_name"]; 
      

     
      mysqli_close($conn);
      header("location: alumnos_principal.php");
    }
    else
    {
      $errors[]="No. de boleta/Contraseña no válidos <br>";
      //$error = "Your Login Name or Password is invalid";
      mysqli_close($conn);
    }
  }//ACA ACABA ESA WEA DE WACHAR

  if(!$errors)
  {

  }
  else
  {
    $response['status']="error";
    $response['msg']="Los siguientes
    errores sucedieron: ";
    $response['errors']=$errors;
  }
}//El cierre del if del principio



?>
	<div id="response"></div>
	<div class="col-xs-12 col-sm-8 col-md-8">
		<h1><br>Accede como alumno</h1>
  		<p>Llene la informacion solicitada a continuacion para ingresar</p>
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

	
  
  <form action="login_alumnos.php" method="post">
 <div class="form-group">
  

 <div class="form-group">
    <label for="numb" class="control-label">Número de boleta:</label>
    <div>
    <input type="text" class="form-control required"  maxlength="14" name="numb" placeholder="Teclee su no. de boleta">
</div>
    <small id="numbHelp" class="form-text text-muted"></small>
  </div><!-- RFC-->


  <div class="form-group">
  	<div> <label for="Contraseña">Contraseña: </label></div>
    <input type="password" class="form-control required" name="Contraseña" placeholder="Contraseña de Usuario">
  </div><!-- Contraseña-->

  <button type="submit" 
		class="btn btn-primary btn-lg btn-block"
		name="submit">Enviar</button>








	</form>
</div>


<?php include 'footer.php'?>