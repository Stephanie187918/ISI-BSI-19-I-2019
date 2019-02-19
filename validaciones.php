<?php



if (empty($_POST['nombre'])) {$_POST['nombre'] = "Debe digitar su nombre!";}
else
{echo "nombre: "; echo $_POST['nombre']; echo "<br/>";}



if (empty($_POST['apellido'])) {$_POST['apellido'] = "Debe digitar su nombre!";}
else
{echo "apellido: "; echo $_POST['apellido']; echo "<br/>";}


if ($Password1 == $Password2 ){
		echo "Password1: "; echo $_POST['Password1']; echo "<br/>";
		echo "Password2: "; echo $_POST['Password2']; echo "<br/>";
		}else
		{echo "Password1 "; echo $_POST['Password1']; echo "<br/>";}

if (empty($_POST['Correo'])) {
	$_POST['Correo'] = "Este campo no puede estar vacío";
}else{
	echo "Correo: "; echo $_POST['Correo']; echo "<br/>";
}


if (empty($_POST['FechaNacimiento'])) {
	$_POST['FechaNacimiento'] = "Este campo no puede estar vacío";
}else{
	echo "FechaNacimiento: "; echo $_POST['FechaNacimiento']; echo "<br/>";}
	
	




?>