<?php

$alert = '';

session_start();
if(!empty($_SESSION['active']))
{
header('location: sistema/');
}else{



if(!empty($_POST))
{
if(empty($_POST['usuario'])||empty($_POST['clave']))
{
$alert='Ingrese su usuario y contraseña';
}else{
require_once "conexion.php";
$user= mysqli_real_escape_string($conection,$_POST['usuario']);
$pass= md5(mysqli_real_escape_string($conection,$_POST['clave']));
$query=mysqli_query($conection,"SELECT*FROM usuario WHERE usuario
='$user' AND clave= '$pass'");
$result= mysqli_num_rows($query);

if($result>0)
{
$data= mysqli_fetch_array($query);

$_SESSION['active']=true;
$_SESSION['idUser']=$data['idusuario'];
$_SESSION['nombre']=$data['nombre_completo'];
$_SESSION['email']=$data['correo_electronico'];
$_SESSION['user']=$data['usuario'];
$_SESSION['rol']=$data['rol'];

header('location: sistema/');

}else {
$alert= 'Usuario o clave incorrecto';
session_destroy();

}

}
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login | Sistema de Facturación</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<section id="container">
	<form action="" method="post">

		<h3>Inicio de sesión</h3>
		<img src="img/login.png" alt="Login">

		<input type="text" name="usuario" placeholder="Usuario">
		<input type="password" name="clave" placeholder="Contraseña">
		<div class="alert"><?php echo isset($alert)?$alert:'';?></div>
		<input type="submit" value="ACEPTAR">

	</form> 
</section>
</body>
</html>