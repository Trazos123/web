<?php
// Verifica si se ha pasado el parámetro foto_id en la URL
if (isset($_GET['producto_id'])) {
  // Obtén el producto_id desde la URL
  $producto_id = $_GET['producto_id'];

  // Realiza la conexión a la base de datos
  include("../../conexion.php");

  // Obtén el nombre del archivo y la descripción de la imagen asociada al producto_id
  $query = $conexion->prepare("SELECT nombre_producto, descripcion_producto FROM producto WHERE producto_id = :producto_id");
  $query->bindParam(':producto_id', $producto_id);
  $query->execute();
  
  // Verifica si se encontró una imagen con el producto_id proporcionado
  if ($query->rowCount() > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $nombre_producto = $row['nombre_producto'];
    $descripcion_producto = $row['descripcion_producto'];

$delete_query = $conexion->prepare("DELETE FROM producto WHERE producto_id = :producto_id");
$delete_query->bindParam(':producto_id', $producto_id);
$delete_query->execute();

// Elimina el archivo de la carpeta de imágenes
if (unlink("../../public/img/".$nombre_producto)) {
  echo "El producto '".$descripcion_producto."' ha sido eliminada exitosamente.";

  // Redirige al usuario a index.php después de 2 segundos
  header("refresh:2; url=index.php");
} else {
  echo "Ha ocurrido un error al eliminar el producto '".$descripcion_producto."'.";
} } else {
    echo "No se encontró ningun producto con el producto_id proporcionado.";
  }
} else {
  echo "No se ha proporcionado el producto_id en la URL.";
}
?>