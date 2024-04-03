<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Progresos</title>
</head>
<body>
    <?php
        session_start();
        $us=$_SESSION["usuario"];
        if ($us==""){
            header("Location: index.html");
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="entrenador.php">Gimnasio UAO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="entrenador.php">Usuarios</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="rutinas-entrenador.php">Rutinas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="entrenador-progreso.php">Progresos</a>
            </li>
        </ul>
        <span class="navbar-text">
            <?php echo "<a class='nav-link' href='logout.php'>Logout $us</a>" ;?>
        </span>
        </div>
    </div>
    </nav>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID progreso</th>
        <th scope="col">Usuario</th>
        <th scope="col">ID rutina</th>
        <th scope="col">Nuevo peso del usuario</th>
        <th scope="col">Fecha y hora de finalización de la rutina</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $servurl="http://www.gimnasiouao.com:3003/progresos";
        $curl=curl_init($servurl);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response=curl_exec($curl);
       
        if ($response===false){
            curl_close($curl);
            die("Error en la conexion");
        }

        curl_close($curl);
        $resp=json_decode($response);
        $long=count($resp);
        for ($i=0; $i<$long; $i++){
            $dec=$resp[$i];
            $id=$dec ->id;
            $usuario=$dec->usuario;
            $rutina=$dec->rutina;
            $nuevoPesoUsuario=$dec->nuevoPesoUsuario;
            $fechaRutinaTerminada=$dec->fechaRutinaTerminada;
     ?>
    
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $usuario; ?></td>
        <td><?php echo $rutina; ?></td>
        <td><?php echo $nuevoPesoUsuario; ?></td>
        <td><?php echo $fechaRutinaTerminada; ?></td>
        </tr>
     <?php 
        }
     ?>   
    </tbody>
    </table>
</body>