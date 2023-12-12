<?php

include("conexion.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT * FROM empleados WHERE usuario = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verifica la contraseña almacenada con la contraseña ingresada
        if ($password === $usuario['contraseña']) {
            $_SESSION['usuario'] = $usuario['usuario'];
        } else {
            $error = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    } else {
        $error = "Usuario no encontrado. Inténtalo de nuevo.";
    }

    if($usuario['usuario'] == 'root'){
        header("Location:modulos/contactos/index.php");
        exit();
    }else{
        header("Location: login.php");
        exit();
    }
}
?>

<?php include("template/header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Iniciar sesión</h2>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>
