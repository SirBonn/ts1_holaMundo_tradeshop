<?php
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../config/routes.php';
require_once __DIR__ . '/../config/db_conection.php';
require_once __DIR__ . '/getterElement.php';

$con = connect();

if (isset($_POST['username']) && isset($_POST['password'])) {

    $usrname = $_POST['username'];
    $usrpass = $_POST['password'];
    
    try {
        $user = getUser($usrname, $usrpass);
    } catch (Exception $e) {
        session_start();
        $_SESSION["error_message"] = "Las credenciales ingresadas son incorrectas";
        header("Location: " . getLogin());
        exit();
    }

    if ($user == null) {
        setError();
    } else {
        session_start();
        $_SESSION['usr'] = $user;
        header("Location: " . getInitSesion($user));
        exit();
    }
} else {
    // setError();
}

function setError()
{
    session_start();
    $_SESSION["error_message"] = "Las credenciales ingresadas son incorrectas";

    // Redirigimos al usuario a la página de inicio de sesión
    header("Location: " . getLogin());
    exit();
}
