<?php
// Conexión a la base de datos
include("../../conexion.php");

// Reporte de cantidad de empleados por departamento con nombres de departamento
$query_cantidad_empleados_departamento = "SELECT * FROM empleados_cantidad_departamento";
$result_cantidad_empleados_departamento = $conexion->query($query_cantidad_empleados_departamento);

// Reporte de nombres y usuarios correspondientes a cada departamento
$query_nombres_usuarios_departamento = "SELECT * FROM nombres_usuarios_por_departamento";
$result_nombres_usuarios_departamento = $conexion->query($query_nombres_usuarios_departamento);
?>

<?php include("../../template/header.php");?>

<!doctype html>
<html lang="en">
<head>
    <title>Reportes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Reporte de cantidad de empleados por departamento con nombres de departamento -->
                <h2>Reporte de la cantidad de empleados por departamento</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Departamento</th>
                            <th>Cantidad de Empleados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_cantidad_empleados_departamento) {
                            while ($row = $result_cantidad_empleados_departamento->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$row['id_departamento']."</td>";
                                echo "<td>".$row['dep']."</td>";
                                echo "<td>".$row['cantidad_empleados']."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>Error en la consulta de cantidad de empleados por departamento</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <!-- Reporte de nombres y usuarios correspondientes a cada departamento -->
                <h2>Reporte de nombres y usuarios correspondientes a cada departamento</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Departamento</th>
                            <th>Nombre Empleado</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_nombres_usuarios_departamento) {
                            while ($row = $result_nombres_usuarios_departamento->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$row['dep']."</td>";
                                echo "<td>".$row['nombre']."</td>";
                                echo "<td>".$row['usuario']."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Error en la consulta de nombres y usuarios por departamento</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


<?php include("../../template/footer.php");?>