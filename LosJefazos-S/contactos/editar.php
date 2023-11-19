
<?php 

include("../../conexion.php");

if(isset($_GET['usuario_id'])){ 
    $txtid=(isset($_GET['usuario_id'])?$_GET['usuario_id']:"");
    $stm=$conexion->prepare("SELECT * FROM usuario WHERE usuario_id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();    
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $usuario_nombre=$registro['usuario_nombre'];
    $usuario_apellido=$registro['usuario_apellido'];
    $usuario_email=$registro['usuario_email'];
    $usuario_clave=$registro['usuario_clave'];
    $usuario_usuario=$registro['usuario_usuario'];
    }

    if($_POST){
      $txtid=(isset($_POST['txtid'])?$_POST['txtid']:'');
      $usuario_nombre=(isset($_POST['usuario_nombre'])?$_POST['usuario_nombre']:'');
      $usuario_apellido=(isset($_POST['usuario_apellido'])?$_POST['usuario_apellido']:'');
      $usuario_email=(isset($_POST['usuario_email'])?$_POST['usuario_email']:'');
      $usuario_clave=(isset($_POST['usuario_clave'])?$_POST['usuario_clave']:'');
      $usuario_usuario=(isset($_POST['usuario_usuario'])?$_POST['usuario_usuario']:'');
  
  $stm=$conexion->prepare("UPDATE usuario SET usuario_nombre=:usuario_nombre,usuario_apellido=:usuario_apellido,usuario_usuario=:usuario_usuario,usuario_clave=:usuario_clave,usuario_email=:usuario_email WHERE usuario_id=:txtid");
  $stm->bindParam(":usuario_nombre", $usuario_nombre);
  $stm->bindParam(":usuario_apellido", $usuario_apellido);
  $stm->bindParam(":usuario_email", $usuario_email);
  $stm->bindParam(":usuario_clave", $usuario_clave);
  $stm->bindParam(":usuario_usuario", $usuario_usuario);
  $stm->bindParam(":txtid", $txtid);
  $stm->execute();
  header("refresh:2; url=index.php");
  }
  
?>
<?php include("../../template/header.php"); ?>

<form action="" method="post">
      <div class="modal-body">
        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>" placeholder="Ingrese nombre">
        <label for="">AKA</label>
        <input type="text" class="form-control" name="usuario_usuario" value=""placeholder="Ingrese AKA">
    
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="usuario_nombre" value="<?php echo $usuario_nombre; ?>" placeholder="Ingrese nombre">
        
        <label for="">apellido</label>
        <input type="text" class="form-control" name="usuario_apellido" value="<?php echo $usuario_apellido; ?>" placeholder="Ingrese apellido">
      
        <label for="">email</label>
        <input type="text" class="form-control" name="usuario_email" value="<?php echo $usuario_email; ?>"> 

        <label for="">Contraseña</label>
        <input type="text" class="form-control" name="usuario_clave" value=""placeholder="Ingrese Contraseña">

      </div>
      <div class="modal-footer">
      <a href="index.php" class="btn btn-danger"> Cancelar</a>
      <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
      <?php include("../../template/footer.php"); ?> 