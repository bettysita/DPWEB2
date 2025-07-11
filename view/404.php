<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f9f9f9, #e0e0e0);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
        }

        h1 {
            font-size: 8rem;
            color: #ff6b6b;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            padding: 12px 24px;
            background-color: #ff6b6b;
            color: white;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #ff4c4c;
        }

        @media (max-width: 500px) {
            h1 {
                font-size: 5rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>¡Oops! Página no encontrada</h2>
        <p>La página que estás buscando no existe o fue movida a otro lugar.</p>
        <a href="/">Volver al inicio</a>
    </div>
</body>
</html>
