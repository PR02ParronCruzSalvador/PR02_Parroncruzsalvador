<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Recursos de la empresa</title>
  <link type="text/css" rel="stylesheet" href="css.css" />
  <script type="text/javascript" src="resultadoBusqueda.js"></script>
</head>
<header>
  <section>
    <img id='logo' src="img/logo.png">
  </section>
  <section>
    <button id='boton' type="submit" title="Inicio" class="button">LOGOUT</button>
  </section>
</header>
<!-- ############################################################ -->
<body id='bg'>
<section>
    <h1>RECURSOS</h1>
    <section class="recursos">
      <button class="menu" onclick="resultado9();">Els meus recursos</button></br><br>
      <button class="menu" onclick="resultado1();">Aules de teoría</button></br><br>
      <button class="menu" onclick="resultado2();">Aules d'informatica</button></br><br>
      <button class="menu" onclick="resultado3();">Despatxos d'entrevistas</button></br><br>
      <button class="menu" onclick="resultado4();">Sala de reunions</button></br><br>
      <button class="menu" onclick="resultado5();">Projector portàtil</button></br><br>
      <button class="menu" onclick="resultado6();">Carro de portàtils</button></br><br>
      <button class="menu" onclick="resultado7();">Portàtils</button></br><br>
      <button class="menu" onclick="resultado8();">Mòbils</button></br><br>
    </section>
    <section class="formulario">
      <!-- Resultado busqueda de recursos -->
      <?php
        $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
      ?>
      <article id="scroll"></br><br>
      <!-- ############################################################ -->
      <article id="formulario1">
          <form action="index2.php" method="POST">
        <?php
          echo "<h1>Aules de Teoria</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=1";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat: ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario2">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Aules d'Informàtica</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=2";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=`recursos`.`reservas`+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario3">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Despatxos d'entrevistas</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=3";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=$row[reservas]+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario4">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Sala de reunions</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=4";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=`recursos`.`reservas`+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario5">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Projector Portàtil</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=5";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=`recursos`.`reservas`+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario6">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Carro de Portàtils</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=5";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=`recursos`.`reservas`+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario7">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Portàtils</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=7";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=`recursos`.`reservas`+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario8">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Mòbils</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=8";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Disponibilitat: ".utf8_encode($row['disponibilitat'])."<br/>";
              echo "Cantidad de reservas: $row[reservas]<br/>";
              if($row['hora_alliberat']!=NULL){
                echo "Alliberat ".$row['hora_alliberat']."<br/>";
              }
              if($row['usuario']!=NULL){
                echo "Último usuario: ".utf8_encode($row['usuario'])."<br/>";
              }
              if(utf8_encode($row['disponibilitat'])=="disponible"){
                  echo "<input type='checkbox' name='producto[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=`recursos`.`reservas`+1, `recursos`.`usuario`=1 WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">RESERVAR</button>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario9">
          <form action="index.php" method="POST">
        <?php
          echo "<h1>Els Meus Recursos</h1>";
          //$sql="SELECT id_usuario FROM usuario WHERE nickname_usuario=$_POST[nickname_usuario]";
          //$idUser=mysqli_query($con,$sql);
          $sql2="SELECT * FROM recursos WHERE usuario=1";
          $datos=mysqli_query($con,$sql2);
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "Producto $row[id_recurs]<br/>";
              echo "Nombre: ".utf8_encode($row['nom_recurs'])."<br/>";
              echo "Agafat: ".$row['hora_agafat']."<br/>";
              if(utf8_encode($row['disponibilitat'])!="disponible"){
                  echo "<input type='checkbox' name='productox[]' value='$row[id_recurs]'><br/>";
              }else{
                  echo "<input type='checkbox' disabled><br/>";
              }
              echo "||==========================||<br/>";
              
              if(isset($_POST['productox'])){
                foreach($_POST['productox'] as $producto){
                  $sql2="UPDATE `recursos` SET `recursos`.`disponibilitat`='disponible', `recursos`.`hora_alliberat`=now(), `recursos`.`usuario`=NULL WHERE id_recurs=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
          }
        ?>
          <br/><button id='boton2' type="submit">Alliberar</button>
        </form>
      </article>
      <!-- ############################################################ -->
      </article>
    </section>
</section>
<footer class="footer">
<section>
</br><br>
<h2>Escola St.Parrón Cruz Salvador</h2>
<h4>Ensenyament de cualitat desde 1995</h4>
<h5>copyright St. Parrón Cruz Salvador 1995</h5>
</section>
<section class="spe">
  <img src="img/fb.png">
  <img src="img/tw.png">
  <img src="img/ins.png">
  <img src="img/gm.png">
</section>
<section id="footer">
  <h4>Fundació St.ParrónCruzSalvador</h4>
  <h4>Avís legal</h4>
  <h4>Política de privacitat</h4>
  <h4>Contacte</h4>
</section>
</footer>
</body>
</html>
