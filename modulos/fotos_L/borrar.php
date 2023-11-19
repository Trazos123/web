<?php
// Verifica si se ha pasado el parámetro foto_id en la URL
if (isset($_GET['foto_id'])) {
  // Obtén el foto_id desde la URL
  $foto_id = $_GET['foto_id'];

  // Realiza la conexión a la base de datos
  include("../../conexion.php");

  // Obtén el nombre del archivo y la descripción de la imagen asociada al foto_id
  $query = $conexion->prepare("SELECT nombre_foto, descripcion_foto FROM fotos WHERE foto_id = :foto_id");
  $query->bindParam(':foto_id', $foto_id);
  $query->execute();
  
  // Verifica si se encontró una imagen con el foto_id proporcionado
  if ($query->rowCount() > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $nombre_foto = $row['nombre_foto'];
    $descripcion_foto = $row['descripcion_foto'];

$delete_query = $conexion->prepare("DELETE FROM fotos WHERE foto_id = :foto_id");
$delete_query->bindParam(':foto_id', $foto_id);
$delete_query->execute();

// Elimina el archivo de la carpeta de imágenes
if (unlink("../../public/img/".$nombre_foto)) {
  echo "La imagen '".$descripcion_foto."' ha sido eliminada exitosamente.";

  // Redirige al usuario a index.php después de 2 segundos
  header("refresh:2; url=index.php");
} else {
  echo "Ha ocurrido un error al eliminar la imagen '".$descripcion_foto."'.";
} } else {
    echo "No se encontró ninguna imagen con el foto_id proporcionado.";
  }
} else {
  echo "No se ha proporcionado el foto_id en la URL.";
}
?>