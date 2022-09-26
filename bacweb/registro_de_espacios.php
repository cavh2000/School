<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  include 'header_administradores.php'; 
  include 'registrosBD.php';

  if(isset($_POST['submit'])){
    $errors=array();
  

    if($_POST['name']==""){
    $errors[]="Nombre vacío <br>";
  }//Filtro para validar una cadena
  $name=filter_var($_POST['name'],
  FILTER_SANITIZE_STRING);


     require 'conexion.php';

      $sql="select *from espacios where espacio = '$_REQUEST[name]';";

      $result = mysqli_query($conn,$sql);
      

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // Si si sale 1 row al contar es porque si existe
      if($count == 1) 
      {
        $errors[]="Nombre ya existente";
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
    $conn->registraEsp();
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
    <h1><br>Registro de espacios</h1>
      <p>Favor de llenar sólo los espacios correspondientes a su área</p>

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

 <form action="registro_de_espacios.php" method="post">
  <div class="form-group">
  <label for="name" class="control-label">Nombre del espacio:</label>
  <div>
    <input type="text"
    class="form-control required" name="name" placeholder="Ejempo: Laboratorio XXX">
  </div>
 </div><!--Nombre Esp-->

 <div class="form-group">
      <div class="form-group">
      <label>Computadora(s): </label>
      <div class="radio">
        <label>
          <input type="radio" name="comp"
          id="s" value="s" >
          Sí
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="comp"
          id="n" value="n" checked>
          No
        </label>
      </div>
    </div>

      <div class="form-group">
      <label>Proyector: </label>
      <div class="radio">
        <label>
          <input type="radio" name="proy"
          id="s" value="s" >
          Sí
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="proy"
          id="n" value="n" checked>
          No
        </label>
      </div>
    </div>

      <div class="form-group">
      <label>Televisión: </label>
      <div class="radio">
        <label>
          <input type="radio" name="tv"
          id="s" value="s" >
          Sí
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="tv"
          id="n" value="n" checked>
          No
        </label>
      </div>
    </div>

     <div class="form-group">
      <label>Audio: </label>
      <div class="radio">
        <label>
          <input type="radio" name="aud"
          id="s" value="s" >
          Sí
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="aud"
          id="n" value="n" checked>
          No
        </label>
      </div>
    </div><!--Lo que tiene-->

  <div class="form-group">
      <label>Mantenimiento: </label>
      <div class="radio">
        <label>
          <input type="radio" name="disp"
          id="s" value="s" >
          Sí
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="disp"
          id="n" value="n" checked>
          No
        </label>
      </div>
    </div><!--Género-->

  <button type="submit" 
    class="btn btn-primary btn-lg " 
    name="submit">Guardar</button>


  </form>
</div>

<br>
<?php include 'footer.php'?>