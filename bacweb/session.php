<?php
   $conn=mysqli_connect("localhost",
	"root","","bacbd")
	or die("Problemas con la conexión");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select idMae from maestros where idMae = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['idMae'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login_maestros.php");
   }
?>