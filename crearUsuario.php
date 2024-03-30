<?php
    $nombre=$_POST["nombre"];
    $peso=$_POST["peso"];
    $meta=$_POST["meta"];
    $usuario=$_POST["usuario"];
    $pass=$_POST["password"];
    $rol=$_POST["rol"];

    // URL de la solicitud POST
    $url = 'http://localhost:3001/usuarios/crearUsuario';

    // Datos que se enviarán en la solicitud POST
    $data = array(
        'nombreCompleto' => $nombre,
        'peso' => $peso,
        'meta' => $meta,
        'usuario' => $usuario,
        'password' => $pass,
        'rol' => $rol
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
    header("Location:entrenador.php");

?>