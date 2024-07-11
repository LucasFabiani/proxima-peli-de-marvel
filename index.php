<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

// Creando una sesion de curl (ch = cURL handle)
$ch = curl_init(API_URL);
// Que no imprima el resultado en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resultado = curl_exec($ch);
$datos = json_decode($resultado, true);
curl_close($ch);

// Otra alternatica es
// file_get_contents(API_URL);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Proxima Pelicula</title>

    <meta name="description" content="La proxima pelicula de marvel">
    <meta name="author" content="Lucas Fabiani">
    <meta name="keywords" content="marvel, proxima pelicula">

    <link rel="stylesheet" href="css/pico.min.css" />

    <style>
        :root {
            color-scheme: light dark;
        }

        body, main {
            padding: 2rem;
            display: flex;
            justify-content: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        
        hgroup {
            margin-left: 2rem;
        }

        @media screen and (max-width: 500px) {
            body, main {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <main>
        <img width="300px" style="border-radius: 1rem" src="<?= $datos['poster_url']; ?>">
        <hgroup>
            <h1 style="color: gray"><?= $datos['title']; ?></h1>
            <h2>Faltan <?= $datos['days_until']; ?> dias para el estreno</h2>
            <p style="color: gray"><?= $datos['overview']; ?></p>
        </hgroup>
    </main>


</body>

</html>