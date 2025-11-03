<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404 - Página no encontrada</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url('https://img.freepik.com/vector-gratis/fondo-textura-futurista-pastel-abstracto_53876-115746.jpg?semt=ais_hybrid&w=740');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            max-width: 600px;
            padding: 2rem;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .message {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .description {
            font-size: 1rem;
            margin-bottom: 2rem;
            color: #000000ff;
        }

        .btn-home {
            padding: 0.75rem 1.5rem;
            background-color: #fff;
            color: #764ba2;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-home:hover {
            background-color: #ddd;
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 6rem;
            }

            .message {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="error-code">404</div>
        <div class="message">¡Ups! Página no encontrada</div>
        <div class="description">
            La página que buscas no existe o ha sido movida. <br>Por favor, vuelve al inicio.
        </div>
        <a href="index.html" class="btn-home">Volver al Inicio</a>
    </div>

</body>

</html>

