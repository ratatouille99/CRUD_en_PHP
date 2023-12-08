<?php   
include("../../conexion.php");

$stm = $conexion->prepare("SELECT * FROM vista_empleados_departamentos");
$stm->execute();
$vista = $stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id_empleado'])){
    $id_empleado = isset($_GET['id_empleado']) ? $_GET['id_empleado'] : "";
    $stm = $conexion->prepare("DELETE FROM empleados WHERE id = :id_empleado");
    $stm->bindParam(":id_empleado", $id_empleado);
    $stm->execute();
    header("location:index.php");
    exit();
}
?>

<?php include("../../template/header.php"); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Agregar Empleado
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_departamento">
  Agregar Departamento
</button>

<div class="table-responsive">
    <br>
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vista as $item) { ?>
            <tr class="">
                <td scope="row"><?php echo $item['id_empleado'] ?></td>
                <td><?php echo $item['nombre_empleado'] ?></td>
                <td><?php echo $item['nombre_departamento'] ?></td>
                <td>
                    <a href="edit.php?id_empleado=<?php echo $item['id_empleado'] ?>" class="btn btn-success">Editar</a>
                    <a href="index.php?id_empleado=<?php echo $item['id_empleado'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
         <?php } ?>
        </tbody>
    </table>
</div>

<?php include("create.php"); ?>
<?php include("../../template/footer.php"); ?>
