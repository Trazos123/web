<?php include("../../conexion.php");?>
<?php include("../../template/header_L.php");?>
<div class="titulos"> productos </div>
<?php
if ($_SERVER['REQUEST_URI'] == '/Proyecto_Pago/modulos/fotos/') {
    // Mostrar el formulario de subida de foto
    echo '
<form action="subir.php" method="POST" enctype="multipart/form-data">
    <label for="file" class="text-white">Subir imagen</label><br>
    <input type="file" id="file" name="file" class="text-white"><br> <!-- Archivo -->
    
    <label for="desc" class="text-white">Descripcion de la imagen</label><br>
    <input type="text" id="desc" name="desc" class="text-black"><br> <!-- Descripcion -->
     
    <input type="submit" class="text-white bg-danger" value="Subir"> <!-- Descripcion --><br>
    ';
}

  // Obtener todas las fotos ordenadas por ID
  $productos_query = $conexion->query("SELECT * FROM producto ORDER BY producto_id DESC");
  $productos = $productos_query->fetchAll(PDO::FETCH_ASSOC);

  foreach($productos as $producto) {
    echo "<div class='photo-container'>";
    echo "<img class='styled-img' src='../../public/img/".$producto['nombre_producto']."' alt='".$producto['descripcion_producto']."' />";
    echo "<p><a class='contenido' href='Ver_mas.php?producto_id=".$producto['producto_id']."'>".$producto['descripcion_producto']."</a></p>";
    echo "</div>";
  }
  if ($_SERVER['REQUEST_URI'] == '/Proyecto_Pago/modulos/fotos/') {
    echo '</form>';
}
  ?>

<?php include("../../template/footer.php");?>