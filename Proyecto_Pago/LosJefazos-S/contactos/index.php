<?php 
include("../../conexion.php");?>
<?php include("../../template/header.php");?>
<?php
$stm=$conexion->prepare("SELECT * FROM usuario"); //seleccion de tabla 
$stm->execute();
$usuario= $stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['usuario_id'])) {
    $txtid = (isset($_GET['usuario_id']) ? $_GET['usuario_id'] : "");
    $stm = $conexion->prepare("DELETE FROM usuario WHERE usuario_id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
}
?>
<!-- Button trigger modal -->
<div class="titulos"> Lista de Usuarios </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Nuevo
</button>

<div class="table-responsive">
    <table class="table ">
        <thead class="table table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">AKA</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th class="password" scope="col">Contraseña</th>
                
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <body>
        <?php foreach($usuario as $usuarios) {?>
            <tr class="text-white">
                <td scope="row"><?php echo $usuarios['usuario_id'];?></td>
                <td><?php echo $usuarios['usuario_usuario'];?></td>
                <td><?php echo $usuarios['usuario_nombre'];?></td> 
                <td><?php echo $usuarios['usuario_apellido'];?></td>
                <td><?php echo $usuarios['usuario_email'];?></td>
                <td><?php echo $usuarios['usuario_clave'];?></td>
                <td>
                    <a href="editar.php?usuario_id=<?php echo $usuarios['usuario_id'];?>" class="btn btn-warning">Editar</a> <!-- usuario_id = Nombre de la variable_id -->
                    <a href="index.php?usuario_id=<?php echo $usuarios['usuario_id'];?>" class="btn btn-danger">Borrar</a> <!-- usuario_id = Nombre de la variable_id -->
                </td>
            </tr>
        <?php }?>
        </body>
    </table>
</div>
<?php include("../../template/footer.php");?>
<?php include("crear.php");?>
