<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  include 'header_administradores.php'; 
  include 'registrosBD.php';

  if(isset($_POST['submit'])){
    $errors=array();
  

    if($_POST['num1']=="" and $_POST['num2']=="" and $_POST['num3']=="" and $_POST['num4']=="" and $_POST['num5']=="" and $_POST['num6']==""){
    $errors[]="Favor de llenar los grupos que desee modificar<br>";
  }//Filtro para validar que esten llenos


if(!$errors){
    $response['status']="sucess";
    $response['msg']="Cambios exitosos";

    

    $conn=new Cambios();
    $conn->cambiarGrup();

    $conn=new Registra();
    $conn->registraGrup();
  }else{
    $response['status']="error";
    $response['msg']="Los siguientes
    errores sucedieron: ";
    $response['errors']=$errors;

  }
  
}


if(isset($_POST['submit2'])){
    $errors=array();
  

    if($_POST['num1v']=="" and $_POST['num2v']=="" and $_POST['num3v']=="" and $_POST['num4v']=="" and $_POST['num5v']=="" and $_POST['num6v']==""){
    $errors[]="Favor de llenar los grupos que desee modificar<br>";
  }//Filtro para validar que esten llenos


if(!$errors){
    $response['status']="sucess";
    $response['msg']="Cambios exitosos";

    

    $conn=new Cambios();
    $conn->cambiarGrupV();

    $conn=new Registra();
    $conn->registraGrupV();
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
    <h1><br>Modificar grupos</h1>
    <p><br>Se muestran sólo los grupos ya registrados, teclee el nuevo numero de grupos</p>
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

 <form action="modificar_grupos.php" method="post">


  <div class="form-group">
  <button type="submit" class="btn btn-primary btn-lg btn-block" name="manana">Matutino</button>
  <button type="submit" class="btn btn-primary btn-lg btn-block" name="vespertino">Vespertino</button>

    <?php if(isset($_POST['manana'])): ?>
    <?php 
    $conn=mysqli_connect("localhost", "root","","bacbd") or die("Problemas con la conexión");
    //primero   
    $sql="select *from grupo where grupo = 'primero';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'segundo';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count2 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'tercero';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count3 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'cuarto';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count4 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'quinto';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count5 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'sexto';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count6 = mysqli_num_rows($result);

   mysqli_close($conn);
  ?>
    <?php if($count >= 1 || $count2 >= 1 || $count3 >= 1 || $count4 >= 1 || $count5 >= 1 || $count6 >= 1): ?>
     <h1><br>MATUTINO: <br></h1>
    <?php endif ?>
    <?php if($count >= 1): ?>
    <label for="num1" class="control-label">Primer Semestre: </label>
    <div>
      <input type="text" class="form-control required" name="num1" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>

    <div class="form-group">

    <?php if($count2 >= 1): ?>
    <label for="num2" class="control-label">Segundo Semestre: </label>
    <div>
      <input type="text" class="form-control required" name="num2" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count3 >= 1): ?>
    <label for="num3" class="control-label">Tercer Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num3" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count4 >= 1): ?>
     <label for="num4" class="control-label">Cuarto Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num4" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count5 >= 1): ?>
    <label for="num5" class="control-label">Quinto Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num5" placeholder="Teclee el número de grupos">
    </div>
  </div>
  <?php endif ?>
    <?php if($count6 >= 1): ?>
   <label for="num6" class="control-label">Sexto Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num6" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count >= 1 || $count2 >= 1 || $count3 >= 1 || $count4 >= 1 || $count5 >= 1 || $count6 >= 1): ?>
    <br><button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Enviar</button>
     <?php endif ?>
  <?php endif ?>



<!-- Vespertino-->

<?php if(isset($_POST['vespertino'])): ?>
    <?php 
    $conn=mysqli_connect("localhost", "root","","bacbd") or die("Problemas con la conexión");
  
    $sql="select *from grupo where grupo = 'primerov';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'segundov';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count2 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'tercerov';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count3 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'cuartov';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count4 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'quintov';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count5 = mysqli_num_rows($result);

    $sql="select *from grupo where grupo = 'sextov';";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count6 = mysqli_num_rows($result);

   mysqli_close($conn);
  ?>
  
  <?php if($count >= 1 || $count2 >= 1 || $count3 >= 1 || $count4 >= 1 || $count5 >= 1 || $count6 >= 1): ?>
     <h1><br>VESPERTINO: <br></h1>
    <?php endif ?>
    <?php if($count >= 1): ?>
    <label for="num1v" class="control-label">Primer Semestre: </label>
    <div>
      <input type="text" class="form-control required" name="num1v" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>

    <div class="form-group">

    <?php if($count2 >= 1): ?>
      <label for="num2v" class="control-label">Segundo Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num2v" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count3 >= 1): ?>
    <label for="num3v" class="control-label">Tercer Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num3v" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count4 >= 1): ?>
     <label for="num4v" class="control-label">Cuarto Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num4v" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count5 >= 1): ?>
    <label for="num5v" class="control-label">Quinto Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num5v" placeholder="Teclee el número de grupos">
    </div>
  </div>
  <?php endif ?>
    <?php if($count6 >= 1): ?>
   <label for="num6v" class="control-label">Sexto Semestre</label>
    <div>
      <input type="text" class="form-control required" name="num6v" placeholder="Teclee el número de grupos">
    </div>
    <?php endif ?>
    <?php if($count >= 1 || $count2 >= 1 || $count3 >= 1 || $count4 >= 1 || $count5 >= 1 || $count6 >= 1): ?>
    <br><button type="submit" class="btn btn-primary btn-lg btn-block" name="submit2">Enviar</button>
     <?php endif ?>
<?php endif ?>
  </div>


 

    
  

    



  


  </form>
</div>

<br><br>
<?php include 'footer.php'?>