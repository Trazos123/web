<?php include("../../conexion.php");

$file_name= $_FILES['file']['name'];
$file_tmp= $_FILES['file']['tmp_name'];
$desc=$_POST['desc']; // Lo que va en "[]" es el nombre del input menos en el 2do en caso de los de arriba
$route = "../../public/img/".$file_name; // Ruta de acceso

move_uploaded_file($file_tmp,$route);

try {
  $stm=$conexion->prepare("INSERT INTO producto (nombre_producto, descripcion_producto) VALUES (:nombre_producto, :descripcion_producto)");
  $stm->bindParam(":nombre_producto", $file_name);
  $stm->bindParam(":descripcion_producto", $desc);
 
  if ($stm->execute()) {
    echo "Se subió la foto correctamente.";
    header("refresh:2; url=index.php");
    } else {
    echo "Error al subir la foto a la base de datos.";
  }
} 
  catch(PDOException $e) {
  echo 'Error de conexión: ' . $e->getMessage();
}
$productos_query = $conexion->query("SELECT * FROM producto ORDER BY producto_id ASC");
$productos = $productos_query->fetchAll(PDO::FETCH_ASSOC);
1
?>