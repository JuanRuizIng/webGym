<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Usuarios</title>
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
        <a class="navbar-brand" href="admin.php">Gimnasio UAO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="entrenador.php">Usuarios</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="rutinas-entrenador.php">Rutinas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="entrenador-progreso.php">Progreso</a>
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
        <th scope="col">Nombre</th>
        <th scope="col">Peso</th>
        <th scope="col">Meta</th>
        <th scope="col">Usuario</th>
        <th scope="col">Contraseña</th>
        <th scope="col">Rol</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $servurl="http://www.gimnasiouao.com:3001/usuarios/crearUsuario";
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
            $nombre=$dec ->nombre;
            $peso=$dec ->peso;
            $meta=$dec ->meta;
            $usuario=$dec->usuario;
            $password=$dec->password;
            $rol=$dec ->rol;
     ?>
    
        <tr>
        <td><?php echo $nombre; ?></td>
        <td><?php echo $peso; ?></td>
        <td><?php echo $meta; ?></td>
        <td><?php echo $usuario; ?></td>
        <td><?php echo $password; ?></td>
        <td><?php echo $rol; ?></td>
        </tr>
     <?php 
        };
     ?>   
    </tbody>
    </table>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            CREAR USUARIO
    </button>
    <div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">CREAR USUARIO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="crearUsuario.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Peso</label>
                <input type="number" name="peso" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Solo en números. Esto se tomará como kilogramos.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Meta</label>
                <input type="text" name="meta" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">¿Aumentar (o) Disminuir?</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rol</label>
                <input type="text" name="rol" class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text">Solo sirven estas dos opciones: Usuario (o) Entrenador</div>
            </div>
            
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
        </div>
    </div>
    </div>
</body>