<!-- se inicia sesion se usuario -->
<?php
session_start();
require_once('conexion.php');

$nickname_usuari = $_POST['usuari'];
$password_usuari = $_POST['clave'];

$consulta = "SELECT * FROM usuario WHERE nickname_usuari='$nickname_usuari' and password_usuari='$password_usuari'";
$query = mysql_query($consulta,$conexion);

/* Si el usuario existe se inicia sesion, si no lo está o la contraseña es incorrecta 
se notifica y volvemos a la pagina principal del formulario */ 
if($row = mysql_fetch_assoc($query)){
	$_SESSION['nickname_usuari'] = $row['nickname_usuari'];
	header('Location: index.php?id=conectado');
	} else {
	echo"<script type='text/javascript'>
		alert('El usuario o la contraseña son incorrectos. Vuelve a intentarlo!!!');
		window.location='index.php';
		</script>";
}
?>

