<?php 
  session_start();
  include("modulos/conn.php");
  if(isset($_SESSION['id'])){
    echo '<meta http-equiv="refresh" content="0;url=platform/#home/"/>';
  }else{
    if(isset($_SESSION['bloqueo'])){
        header("Location: blockscreen.php");
    }
?>

<!DOCTYPE HTML>
<html dir="ltr" lang="es">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Ventas e Inventario</title>
  <link rel="stylesheet" href="css/style-l.css" type="text/css" />
  <link rel="shortcut icon" href="images/favicon.png">

  </head>

  <body>
    <?php 
      if(isset($_POST['submit'])){
        extract($_POST);
        $password = md5($password);
        $d = mysql_query("SELECT * FROM usuarios WHERE nombre_usu='$username' AND clave_usu='$password'");
        $s = mysql_num_rows($d);
        if($s>0){
          $row = mysql_fetch_array($d);
          $_SESSION['id'] = $row['id_usu'];
          $_SESSION['usuario'] = $row['nombre_usu'];
          echo '<meta http-equiv="refresh" content="0;url=platform/#home"/>';
        }else{
          echo '<script>alert("Credenciales incorrectas")</script>';
        }
      }
    ?>

    <style type="text/css">
      select::-ms-expand{
        display: none;
      }
    </style>
    <div id="container">
      <form method="post">
        <div class="login">Iniciar Sesión</div>
        <div class="username-text">Usuario</div>
        <div class="password-text">Contraseña</div>
        <div class="username-field">
          <input type="text" name="username" autofocus autocomplete="off" />
        </div>
        <div class="password-field">
          <input type="password" name="password"/>
        </div><!--
        <input type="checkbox" name="remember-me" id="remember-me" /><label for="remember-me">Recuerdame</label>
        <div class="forgot-usr-pwd">Forgot <a href="#">username</a> or <a href="#">password</a>?</div>-->
        <input type="submit" name="submit" value="Entrar" />
      </form>
    </div>
  </body>
</html>
<?php 
  }
?>