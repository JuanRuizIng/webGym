<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Mi rutina</title>
</head>
<body>
    <?php
        session_start();
        $us=$_SESSION["usuario"];
        $ru=$_SESSION["rutina"];
        if ($us==""){
            header("Location: index.html");
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="usuario.php">Gimnasio UAO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="usuario.php">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="asignar-rutinas-usuario.php">Rutinas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="rutina-usuario.php">Mi rutina</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="progreso-usuario.php">Mi progreso</a>
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
        <th scope="col">ID</th>
        <th scope="col">Descripción</th>
        <th scope="col">Objetivo</th>
        <th scope="col">Kilos aumentados(positivos)/quemados(negativos)</th>
        </tr>
    </thead>
    <div>
        <p>¿No aparece la rutina que seleccionaste anteriormente? Tranquilo. Solo vuelve a iniciar sesion :)</p>
    </div>
    <tbody>
    <?php
        $servurl="http://localhost:3002/rutinas/misRutinas/$ru";
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
            $descripcion=$dec->descripcion;
            $objetivo=$dec->objetivo;
            $objetivoKilos=$dec->objetivoKilos;
     ?>
    
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $descripcion; ?></td>
        <td><?php echo $objetivo; ?></td>
        <td><?php echo $objetivoKilos; ?></td>
        </tr>
     <?php 
        }
     ?>   
    </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            ¿Terminaste tu rutina?
    </button>
    <div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Apunta tu progreso</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="crearProgreso.php" method="post">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">¡Ya he terminado mi rutina!</button>
        </div>
        </div>
    </div>
    </div>
</body>