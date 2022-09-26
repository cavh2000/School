<?php 
	
	class Registra{
		function registraMae(){
	$conn=mysqli_connect("localhost",
			"root","","bacbd")
			or die("Problemas con la conexión");

			$sql="insert into maestros(apePMae, apeMMa, nombreM, idMae, correoM, contrasenaM) 
			values('$_REQUEST[apePat]',
			'$_REQUEST[apeMat]',
			'$_REQUEST[name]',
			'$_REQUEST[rfcp]',
			'$_REQUEST[email]',
			'$_REQUEST[Contraseña]');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: "
				.mysqli_error($conn));
			}
			mysqli_close($conn);
			return $conn;
		}

		function registraAdmin(){
		$conn=mysqli_connect("localhost",
			"root","","bacbd")
			or die("Problemas con la conexión");

			$sql="insert into administradores(apePAd, apeMAd, nombreAd, idAdmin, correoAd, contrasenaAd) 
			values('$_REQUEST[apePat]',
			'$_REQUEST[apeMat]',
			'$_REQUEST[name]',
			'$_REQUEST[rfca]',
			'$_REQUEST[email]',
			'$_REQUEST[Contraseña]');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: "
				.mysqli_error($conn));
			}
			mysqli_close($conn);
			return $conn;
		}		
	}
?>
	