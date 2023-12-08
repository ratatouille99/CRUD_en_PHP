<?php   
include("../../conexion.php");

if(isset($_GET['id_empleado'])){
    $id_empleado = isset($_GET['id_empleado']) ? $_GET['id_empleado'] : "";
    $stm = $conexion->prepare("SELECT * FROM vista_empleados_departamentos WHERE id_empleado = :id_empleado");
    $stm->bindParam(":id_empleado", $id_empleado);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_LAZY);
    $nombre = $registro["nombre_empleado"];

    if($_POST) {
        // Aquí el código para insertar en la base de datos
        $id_empleado = isset($_POST["id_empleado"]) ? $_POST["id_empleado"] : "";
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $id_departamento = isset($_POST["departamento"]) ? $_POST["departamento"] : "";
    
        $stm = $conexion->prepare("UPDATE empleados SET nombre=:nombre, depId=:id_departamento WHERE id=:id_empleado");
    
        $stm->bindParam(":nombre", $nombre);
        $stm->bindParam(":id_departamento", $id_departamento);
        $stm->bindParam(":id_empleado", $id_empleado);
        $stm->execute();
        header("location:index.php");
    }
}

?>

<?php include("../../template/header.php");?>


<form action="" method="post">
        <input type="hidden" class="form_control" name="id_empleado" value="<?php echo $id_empleado;?>" placeholder="Ingrese el nombre">

        <label for="departamento">Departamento</label><br>
            <select class="form_control" name="departamento">
                <?php
                // Realizar la consulta para obtener los departamentos existentes
                $query_departamentos = "SELECT id, dep FROM departamento";
                // Suponiendo que $conexion es tu instancia de conexión a la base de datos
                $result_departamentos = $conexion->query($query_departamentos);

                // Verificar si la consulta se realizó con éxito
                if ($result_departamentos) {
                    // Obtener todas las filas de resultados como un array asociativo
                    $departamentos = $result_departamentos->fetchAll(PDO::FETCH_ASSOC);

                    // Iterar sobre los resultados y generar las opciones para la lista desplegable
                    foreach ($departamentos as $departamento) {
                        $selected = ($id_departamento == $departamento['id']) ? 'selected' : ''; // Marcar como seleccionado si corresponde
                        echo '<option value="' . $departamento['id'] . '" ' . $selected . '>' . $departamento['dep'] . '</option>';
                    }
                } else {
                    // Manejar el error si la consulta no se realizó correctamente
                    echo "Error en la consulta: " . $conexion->errorInfo()[2];
                }
                ?>
            </select>
        <br><br>
        <label for="">Nombre</label><br>
        <input type="text" class="form_control" name="nombre" value="<?php echo $nombre ;?>">
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>


      <?php include("../../template/footer.php");?>
