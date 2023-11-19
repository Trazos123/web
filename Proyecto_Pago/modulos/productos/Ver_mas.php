<?php include("../../conexion.php");?>
<?php include("../../template/header.php");?>
<?php
// Verifica si se ha pasado el parámetro foto_id en la URL
if (isset($_GET['producto_id'])) {
  // Obtén el foto_id desde la URL
  $producto_id = $_GET['producto_id'];

  // Realiza la conexión a la base de datos
  include("../../conexion.php");

  // Obtén el nombre del archivo y la descripción de la imagen asociada al foto_id
  $query = $conexion->prepare("SELECT nombre_producto, descripcion_producto FROM producto WHERE producto_id = :producto_id");
  $query->bindParam(':producto_id', $producto_id);
  $query->execute();
  $producto = $query->fetch(PDO::FETCH_ASSOC);

  if ($producto) {
    echo "<div class='photo-container-2'>";
    echo "<img class='styled-img-2' src='../../public/img/".$producto['nombre_producto']."' alt='".$producto['descripcion_producto']."' />";
    echo "<p>".$producto['descripcion_producto']."</p>";
    echo "</div>";
    echo "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, inventore blanditiis sequi, asperiores esse tempore facere ut aperiam culpa corporis nemo! Quisquam cumque tenetur mollitia, consequatur vero aperiam obcaecati odio.";
    
  } else {
    echo "No se encontró ninguna producto con el ID indicado.";
  }
}
?>
