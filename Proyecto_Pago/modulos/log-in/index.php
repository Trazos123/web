<?php include("../../conexion.php");?>
<?php include("../../template/header.php");?>

<h1 class="titulos"> Inicio de Sesion </h1>
<?php
session_start(); // Iniciar sesión

include("../../conexion.php");

if ($_POST) {
  // Obtener los valores del formulario
  $usuario_usuario = isset($_POST['usuario_usuario']) ? $_POST['usuario_usuario'] : '';
  $usuario_clave = isset($_POST['usuario_clave']) ? $_POST['usuario_clave'] : '';

  // Verificar las credenciales ingresadas por el usuario
  $stm = $conexion->prepare("SELECT * FROM usuario WHERE usuario_usuario = :usuario_usuario AND usuario_clave = :usuario_clave");
  $stm->bindParam(":usuario_usuario", $usuario_usuario);
  $stm->bindParam(":usuario_clave", $usuario_clave);
  $stm->execute();

  if ($stm->rowCount() > 0) {
    // Las credenciales son válidas, iniciar sesión y redirigir al usuario a la página principal
    $_SESSION['usuario'] = $usuario_usuario;
    $stm = $conexion->prepare("SELECT usuario_id FROM usuario WHERE usuario_usuario = :usuario_usuario");
    $stm->bindParam(":usuario_usuario", $usuario_usuario);
    $stm->execute();
    if ($stm->rowCount() > 0) {
      $row = $stm->fetch(PDO::FETCH_ASSOC);
      $usuario_id = $row['usuario_id'];
      header("Location: ../../usuarios/?usuario_id=$usuario_id");
      exit;
    }
    header("Location: ../logeado/"); // Cambiar "pagina_principal.php" con la ruta de tu página principal
    exit;
  } else {
    // Las credenciales son inválidas, mostrar mensaje de error
    echo "<h1 class='subitules' subtitules> Credenciales inválidas. Por favor, intenta nuevamente.</h1>";
    exit;
  }
}
?>

<form action="" method="post">
  <label for="">AKA</label>
  <input type="text" class="form-control" name="usuario_usuario" value="" placeholder="Ingrese AKA">

  <label for="">Contraseña</label>
  <input type="password" class="form-control" name="usuario_clave" value="" placeholder="Ingrese Contraseña">

  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
  </div>
</form>
<?php include("../../template/footer.php");?>