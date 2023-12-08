<?php
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_empleado'])) {
        // Aquí el código para insertar en la base de datos
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $id_departamento = isset($_POST["departamento"]) ? $_POST["departamento"] : "";
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
        $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";

        $contraseña_hasheada = password_hash($pass, PASSWORD_DEFAULT);
    
        $stm = $conexion->prepare("INSERT INTO empleados (depId, nombre, usuario, contraseña)
        VALUES (:id_departamento, :nombre, :usuario, :pass)");
    
        $stm->bindParam(":nombre", $nombre);
        $stm->bindParam(":id_departamento", $id_departamento);
        $stm->bindParam(":usuario", $usuario);
        $stm->bindParam(":pass", $contraseña_hasheada); // Usar la contraseña hasheada
    
        $stm->execute();
        header("location:index.php");
    } else if ($_SERVER["submit_departamento"] == "") {
            if (isset($_POST["n_departamento"])) {
                // Recuperar el nombre del departamento del formulario
                $nombre_departamento = $_POST["n_departamento"];

                // Preparar la consulta para insertar el nuevo departamento en la tabla departamentos
                $stm = $conexion->prepare("INSERT INTO departamento (dep) VALUES (:nombre_departamento)");

                // Asociar el valor del nombre del departamento al parámetro de la consulta preparada
                $stm->bindParam(":nombre_departamento", $nombre_departamento);

                // Ejecutar la consulta preparada para insertar el nuevo departamento
                $stm->execute();

                // Redireccionar a alguna página o realizar alguna acción después de insertar el departamento
                header("Location:index.php");
            } else {
                // Manejar la situación en la que no se envió el nombre del departamento
                echo "El nombre del departamento no fue proporcionado.";
            }
        }
}

ob_end_flush();
?>


<!-- Modal create-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
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
        <input type="text" class="form_control" name="nombre" value="" placeholder="Ingrese el nombre">
        <br><br>
        <label for="">Usuario</label><br>
        <input type="text" class="form_control" name="usuario" value="" placeholder="Ingrese el nuevo usuario">
        <br><br>
        <label for="">Contraseña</label><br>
        <input type="password" class="form_control" name="pass" value="" placeholder="Ingrese una contraseña">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name = "submit_empleado">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="create_departamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR DEPARTAMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Departamento</label><br>
        <input type="text" class="form_control" name="n_departamento" value="" placeholder="Ingrese nuevo Departamento">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name = "submit_departamento">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>