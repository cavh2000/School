<?php 
include 'header_alumnos.php'?>

<section i="alumnos" class="row">
  <div class="col-xs-12 col-sm-8 col-md-8">

<?php 
session_start();
$user_name=$_SESSION["user_name"];
echo $user_name;
?>

 <br><br><br><br><center><h2>Bienvenido estudiante: <?php echo $user_name; ?> </h2></center><br><br><br><br>
</div>


</section>
<?php include 'footer.php'?>