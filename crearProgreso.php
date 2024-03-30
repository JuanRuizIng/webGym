<?php
    session_start();
    $us=$_SESSION["usuario"];
    if ($us==""){
        header("Location: index.html");
    }
    // URL de la solicitud POST
    $url = "http://localhost:3003/crearProgreso";

    // Datos que se enviarán en la solicitud POST
    $data = array(
        'usuario' => $us
    );
    $json_data = json_encode($data);

    // Inicializar cURL
    $ch = curl_init();

    // Configurar opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud POST
    $response = curl_exec($ch);

    // Manejar la respuesta
    if ($response===false){
        header("Location:index.html");
    }
    // Cerrar la conexión cURL
    curl_close($ch);
    header("Location:rutina-usuario.php");

?>