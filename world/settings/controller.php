<?php
// Conexion a la base de datos
include_once("../settings/db.php");
$connection = mysqli_connect($host, $user, $pw, $db);
if(isset($connection)){
    echo 'La bd tareas_db está conectada';
}
mysqli_set_charset($connection, "utf8");

// Controlador para login
if (isset($_POST['login-admin'])) {

    $usuario = $_POST['user'];
    $password = $_POST['password'];

    try {
        //code...
        $stmt = $connection->prepare("SELECT password FROM staff WHERE username = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($password_admin); //bind_result retorna los resultados de usar SELECT y permite asignarle en ese retorno las variables que se desean usar
        if ($stmt->affected_rows) {
            # code...
            $existe = $stmt->fetch();
            if ($existe) {
                # code...
                if (password_verify($password, $password_admin)) {
                    # code...
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_admin;
                    $_SESSION['funcion'] = "admin";
                    header("Location: index.php");
                }else{
                    header("Location: login.php?mensaje=1");
                }
            } else{
                header("Location: login.php?mensaje=1");
            }
        }else{
            header("Location: login.php?mensaje=1");
        }
        $stmt->close();
        $connection->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>