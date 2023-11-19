<?php include("../../conexion.php");?>
<?php include("../../template/header.php");?>
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
  $photo = $query->fetch(PDO::FETCH_ASSOC);

  if ($photo) {
    echo "<div class='photo-container-2'>";
    echo "<img class='styled-img-2' src='../../public/img/".$photo['nombre_foto']."' alt='".$photo['descripcion_foto']."' />";
    echo "<p>".$photo['descripcion_foto']."</p>";
    echo "</div>";
    echo "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, inventore blanditiis sequi, asperiores esse tempore facere ut aperiam culpa corporis nemo! Quisquam cumque tenetur mollitia, consequatur vero aperiam obcaecati odio.";
    
  } else {
    echo "No se encontró ninguna foto con el ID indicado.";
  }
}
?>


