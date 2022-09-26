<?php 
	
	class Registra
	{
		function registraMae()
		{
			require 'conexion.php';

			$p=hash('sha512', $_REQUEST[Contraseña]);

			$sql="insert into maestros(apePMae, apeMMa, nombreM, idMae, correoM, contrasenaM) 
			values('$_REQUEST[apePat]',
			'$_REQUEST[apeMat]',
			'$_REQUEST[name]',
			'$_REQUEST[rfcp]',
			'$_REQUEST[email]',
			'$p');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: "
				.mysqli_error($conn));
			}
			mysqli_close($conn);
			return $conn;
		}

		function registraAdmin()
		{
			require 'conexion.php';

			$p=hash('sha512', $_REQUEST[Contraseña]);

			$sql="insert into administradores(apePAd, apeMAd, nombreAd, idAdmin, correoAd, contrasenaAd) 
			values('$_REQUEST[apePat]',
			'$_REQUEST[apeMat]',
			'$_REQUEST[name]',
			'$_REQUEST[rfca]',
			'$_REQUEST[email]',
			'$p');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: "
				.mysqli_error($conn));
			}
			mysqli_close($conn);
			return $conn;
		}


		function registraAlum()
		{
			require 'conexion.php';
			$p=hash('sha512', $_REQUEST[Contraseña]);
			
    		$sql="insert into alumnos(apePAl, apeMAl, nombreAl, idAl, correoAl, contrasenaAl) 
			values(
			'$_REQUEST[apePat]',
			'$_REQUEST[apeMat]',
			'$_REQUEST[name]',
			'$_REQUEST[numboleta]',
			'$_REQUEST[email]',
			'$p');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: ".mysqli_error($conn));
			}
    		

			
			mysqli_close($conn);
			return $conn;
		}	

		function registraEsp()
		{
			require 'conexion.php';
			
    		$sql="insert into espacios(espacio,compu,proyec,tv,aud,mant) values('$_REQUEST[name]','$_REQUEST[comp]','$_REQUEST[proy]','$_REQUEST[tv]','$_REQUEST[aud]','$_REQUEST[disp]');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: ".mysqli_error($conn));
			}
    		

			
			mysqli_close($conn);
			return $conn;
		}	

		function registraGrup()
		{
			require 'conexion.php';

			$g1=$_REQUEST[num1];
			$g2=$_REQUEST[num2];
			$g3=$_REQUEST[num3];
			$g4=$_REQUEST[num4];
			$g5=$_REQUEST[num5];
			$g6=$_REQUEST[num6];


			for($i=1;$i<$g1+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('1IM$i','primero');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}
		
  			for($i=1;$i<$g2+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('2IM$i','segundo');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		
    		
    		for($i=1;$i<$g3+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('3IM$i','tercero');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			} 

			for($i=1;$i<$g4+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('4IM$i','cuarto');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		

			for($i=1;$i<$g5+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('5IM$i','quinto');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		 		

			for($i=1;$i<$g6+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('6IM$i','sexto');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		 		

			
			mysqli_close($conn);
			return $conn;
		}


		function registraGrupV()
		{
			require 'conexion.php';

			$g1=$_REQUEST[num1v];
			$g2=$_REQUEST[num2v];
			$g3=$_REQUEST[num3v];
			$g4=$_REQUEST[num4v];
			$g5=$_REQUEST[num5v];
			$g6=$_REQUEST[num6v];


			for($i=1;$i<$g1+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('1IV$i','primerov');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}
		
  			for($i=1;$i<$g2+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('2IV$i','segundov');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		
    		
    		for($i=1;$i<$g3+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('3IV$i','tercerov');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			} 

			for($i=1;$i<$g4+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('4IV$i','cuartov');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		

			for($i=1;$i<$g5+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('5IV$i','quintov');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		 		

			for($i=1;$i<$g6+1;$i++)
			{
				$sql="insert into grupo (idGrupo, grupo) values('6IV$i','sextov');";

				if(mysqli_query($conn,$sql)){
					//echo "Registro exitoso";
				}else{
					echo("Error description: ".mysqli_error($conn));
				}
			}  		 		

			
			mysqli_close($conn);
			return $conn;
		}

		function registraApart()
		{
			require 'conexion.php';
			
    		$sql="insert into apartados(idEsp, idHor, idDia) 
			values(
			'$_REQUEST[salon]',
			'$_REQUEST[hora]',
			'$_REQUEST[dia]');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: ".mysqli_error($conn));
			}
    		

			
			mysqli_close($conn);
			return $conn;
		}	


		function registraReport()
		{
			require 'conexion.php';
			
    		$sql="insert into reportes(idGrupo, materia, idEsp, idProm, descrip) 
			values(
			'$_REQUEST[grupo]',
			'$_REQUEST[mater]',
			'$_REQUEST[salon]',
			'$_REQUEST[problem]',
			'$_REQUEST[problemadesc]');";

			if(mysqli_query($conn,$sql)){
				//echo "Registro exitoso";
			}else{
				echo("Error description: ".mysqli_error($conn));
			}
    		

			
			mysqli_close($conn);
			return $conn;
		}	


		
		
	}


				


	class Cambios{
		function cambiarGrup(){
			require 'conexion.php';
			

			$g1=$_REQUEST[num1];
			$g2=$_REQUEST[num2];
			$g3=$_REQUEST[num3];
			$g4=$_REQUEST[num4];
			$g5=$_REQUEST[num5];
			$g6=$_REQUEST[num6];

			if($g1!="")
			{
				if($g1>=0)
				{
					$sql="delete from grupo where grupo='primero';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}
			
			}
			
			if($g2!="")
			{
				if($g2>=0)
				{
					$sql="delete from grupo where grupo='segundo';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}
				
			}
			
			if($g3!="")
			{
				if($g3>=0)
				{
					$sql="delete from grupo where grupo='tercero';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}
			}

			if($g4!="")
			{
				if($g4>=0)
				{	
					$sql="delete from grupo where grupo='cuarto';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}	
			}
			
			if($g5!="")
			{
				if($g5>=0)
				{	
					$sql="delete from grupo where grupo='quinto';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}	
			}
			
			if($g6!="")
			{
				if($g6>=0)
				{	
					$sql="delete from grupo where grupo='sexto';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}	
			}
			
			mysqli_close($conn);
			return $conn;
		}	

		function cambiarGrupV(){
			require 'conexion.php';
			

			$g1=$_REQUEST[num1v];
			$g2=$_REQUEST[num2v];
			$g3=$_REQUEST[num3v];
			$g4=$_REQUEST[num4v];
			$g5=$_REQUEST[num5v];
			$g6=$_REQUEST[num6v];

			if($g1!="")
			{
				if($g1>=0)
				{
					$sql="delete from grupo where grupo='primerov';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}
			
			}
			
			if($g2!="")
			{
				if($g2>=0)
				{
					$sql="delete from grupo where grupo='segundov';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}
				
			}
			
			if($g3!="")
			{
				if($g3>=0)
				{
					$sql="delete from grupo where grupo='tercerov';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}
			}

			if($g4!="")
			{
				if($g4>=0)
				{	
					$sql="delete from grupo where grupo='cuartov';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}	
			}
			
			if($g5!="")
			{
				if($g5>=0)
				{	
					$sql="delete from grupo where grupo='quintov';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}	
			}
			
			if($g6!="")
			{
				if($g6>=0)
				{	
					$sql="delete from grupo where grupo='sextov';";
					if(mysqli_query($conn,$sql)){
						//echo "Eliminar exitoso";
					}else{
						echo("Error description: ".mysqli_error($conn));
					}
				}	
			}
			
			mysqli_close($conn);
			return $conn;
		}	
	}
?>
	