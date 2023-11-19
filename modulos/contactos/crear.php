<?php 
if($_POST){
  // Obtener los valores del formulario
  $usuario_nombre = isset($_POST['usuario_nombre']) ? $_POST['usuario_nombre'] : '';
  $usuario_apellido = isset($_POST['usuario_apellido']) ? $_POST['usuario_apellido'] : '';
  $usuario_email = isset($_POST['usuario_email']) ? $_POST['usuario_email'] : '';
  $usuario_clave = isset($_POST['usuario_clave']) ? $_POST['usuario_clave'] : '';
  $usuario_usuario = isset($_POST['usuario_usuario']) ? $_POST['usuario_usuario'] : '';

  // Verificar si el correo electrónico ya está registrado
  $stm = $conexion->prepare("SELECT * FROM usuario WHERE usuario_email = :usuario_email");
  $stm->bindParam(":usuario_email", $usuario_email);
  $stm->execute();
  if ($stm->rowCount() > 0) {
      // El correo electrónico ya está registrado, mostrar mensaje de error
      echo "El correo electrónico ya está registrado.";
      exit;
  }

  // Verificar si el nombre de usuario ya está registrado
  $stm = $conexion->prepare("SELECT * FROM usuario WHERE usuario_usuario = :usuario_usuario");
  $stm->bindParam(":usuario_usuario", $usuario_usuario);
  $stm->execute();
  if ($stm->rowCount() > 0) {
      // El nombre de usuario ya está registrado, mostrar mensaje de error
      echo "El nombre de usuario ya está registrado.";
      exit;
  }

  // Insertar los datos en la base de datos
  $stm = $conexion->prepare("INSERT INTO usuario(usuario_id, usuario_nombre, usuario_apellido, usuario_usuario, usuario_clave, usuario_email)
      VALUES(null, :usuario_nombre, :usuario_apellido, :usuario_usuario, :usuario_clave, :usuario_email)");
  $stm->bindParam(":usuario_nombre", $usuario_nombre);
  $stm->bindParam(":usuario_apellido", $usuario_apellido);
  $stm->bindParam(":usuario_email", $usuario_email);
  $stm->bindParam(":usuario_clave", $usuario_clave);
  $stm->bindParam(":usuario_usuario", $usuario_usuario);

  if ($stm->execute()) {
      // Registro exitoso
      echo "Registro exitoso. Ahora puedes iniciar sesión.";
      header("refresh:1;");
      exit;
  } else {
      // Error en el registro
      echo "Error en el registro. Por favor, intenta nuevamente.";
      exit;
  }
}
?>
<!-- Modal creat-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">AKA</label>
        <input type="text" class="form-control" name="usuario_usuario" value=""placeholder="Ingrese AKA">

        <label for="">Nombre</label>
        <input type="text" class="form-control" name="usuario_nombre" value="" placeholder="Ingrese Nombre">
        
        <label for="">Apellido</label>
        <input type="text" class="form-control" name="usuario_apellido" value="" placeholder="Ingrese Apellido">
      
        <label for="">Email</label>
        <input type="text" class="form-control" name="usuario_email" value=""placeholder="Ingrese Correo Electronico">

        <label for="">Contraseña</label>
        <input type="text" class="form-control" name="usuario_clave" value=""placeholder="Ingrese Contraseña">

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
