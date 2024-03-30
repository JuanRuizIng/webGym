<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $servurl = "http://localhost:3001/usuarios/$usuario/$password";
    $curl = curl_init($servurl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    if ($response === false) {
        header("Location: index.html");
        exit();
    }

    $resp = json_decode($response);

    if (count($resp) != 0) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rutina"] = $resp[0]->rutina;
        $_SESSION["peso"] = $resp[0]->peso;
        $_SESSION["rol"] = $resp[0]->rol;
        $role = $_SESSION["rol"];
        
        if ($role == "Entrenador") {
            header("Location: entrenador.php");
            exit();
        } else {
            header("Location: usuario.php");
            exit();
        }
    } else {
        header("Location: index.html");
        exit();
    }
} else {
    // Si alguien intenta acceder directamente a este script, no deberíamos permitirlo.
    header("Location: index.html");
    exit();
}
?>
