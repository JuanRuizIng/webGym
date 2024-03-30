<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido al Gimnasio UAO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        p {
            color: #6669;
            text-align: center;
        }
    </style>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
    <div class="container">
        <h1>Bienvenido al Gimnasio UAO</h1>
        <p>¡Estamos emocionados de tenerte aquí!</p>
    </div>
</body>
</html>
<p>¡Es hora de ponerte en forma y alcanzar tus metas!</p>
<p>Recuerda que el éxito no viene por accidente, viene por dedicación y esfuerzo.</p>