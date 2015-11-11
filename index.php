<!-- Notificar todos los errores excepto E_NOTICE -->
<?php session_start();
error_reporting(E_ALL^E_NOTICE);
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Escola st.ParronCruzSalvador</title>
<link rel="stylesheet" href="estilo.css" type="text/css" />
<!-- validacion de formulario con javascript -->
<script type="text/javascript">
	function validarForm(formulario) {
		if(formulario.usuari.value.length==0 && formulario.clave.value.length==0) {
			formulario.usuari.focus();
			formulario.clave.focus();
			alert('Los campos estan vacios, debes introducir tu usuario y contraseña');
		return false;
		}
		if(formulario.usuari.value.length==0) {
			formulario.usuari.focus();
			alert('Debes introducir tu nombre de usuario.');
		return false;
		}
		if(formulario.clave.value.length==0) {
			formulario.clave.focus();
			alert('Debes introducir tu contraseña.');
		return false;
		}
		return true;
		}
</script>
</head>
<body>
<div id="header">
</div>
<div id="cuerpo">
<!-- pagina mensaje de inicio de sesion -->
<?php 
if($_SESSION['nickname_usuari']){?> 
<h1>Escola st.ParronCruzSalvador</h1>
<h3>Bienvenido: <?php echo $_SESSION['nickname_usuari']; ?>
<h2>Area de professorat</h2>
<h3><a href="salir.php">Salir</a></h3>
<?php }else{?>
	<!-- formulario de loguin -->
	<div id="login">
    <br />
    <form action="entrar.php" method="post" onsubmit="return validarForm(this);" >
    	<b>Identificación de usuario:</b><br />
        <!--<input type="text" placeholder="Correo electronico..." name="correo" id="texto"/><br />-->
		<input type="text" placeholder="Nombre usuario..." name="usuari" id="texto" required/><br />
        <input type="password" placeholder="Clave acceso..." name="clave" id="texto" required/><br />
        <input type="submit" name="submit" value="Identificarme" />
		<input type="reset" value="Borrar">
        </form>
    </div>
<?php } ?>
</div>
</body>
</html>