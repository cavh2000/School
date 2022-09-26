<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  include 'header_administradores.php'; 
  include 'registrosBD.php';
?>


  <div id="response"></div>
  <div class="col-xs-12 col-sm-8 col-md-8">

 <form action="mostrar_grupos.php" method="post">


  <div class="form-group">
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

 <br><h2>Número actual de grupos de primero: <?php echo $count; ?> </h2><br>
 <br><h2>Número actual de grupos de segundo: <?php echo $count2; ?> </h2><br>
 <br><h2>Número actual de grupos de tercero: <?php echo $count3; ?> </h2><br>
 <br><h2>Número actual de grupos de cuarto: <?php echo $count4; ?> </h2><br>
 <br><h2>Número actual de grupos de quinto: <?php echo $count5; ?> </h2><br>
 <br><h2>Número actual de grupos de sexto: <?php echo $count6; ?> </h2><br>

</div>
  </form>
</div>

<br><br>
<?php include 'footer.php'?>

