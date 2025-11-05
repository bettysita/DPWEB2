<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://unpkg.com/lottie-web@5.7.4/build/player/lottie.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
            color: #fff;
        }

        /* 🖼️ Imagen de fondo difuminada */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(8px) brightness(0.7);
            z-index: 0;
        }

        /* 🌤️ Fondo con onda suave encima */
        .wave-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 120%, rgba(224, 169, 109, 0.25), transparent 60%);
            animation: waveMove 10s infinite alternate ease-in-out;
            z-index: 1;
        }

        @keyframes waveMove {
            0% {
                transform: translateY(0px);
            }

            100% {
                transform: translateY(15px);
            }
        }

        /* Círculos de fondo */
        .circle-bg {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(224, 169, 109, 0.15);
            filter: blur(40px);
            animation: float 12s infinite ease-in-out alternate;
            z-index: 2;
        }

        .circle-bg-1 {
            top: 10%;
            left: 15%;
        }

        .circle-bg-2 {
            bottom: 15%;
            right: 20%;
        }

        .circle-bg-3 {
            top: 30%;
            right: 25%;
        }

        .circle-bg-4 {
            bottom: 25%;
            left: 10%;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(20px);
            }
        }

        /* Contenedor principal */
        .main-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 80px;
            position: relative;
            z-index: 10;
            padding: 60px 70px;
            max-width: 1100px;
            width: 85%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(25px);
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.15);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Sección de bienvenida */
        .welcome-section {
            flex: 1;
            text-align: left;
        }

        .welcome-section h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: -1px;
        }

        .welcome-section h2 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: rgba(255, 255, 255, 0.95);
        }

        .welcome-section p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            max-width: 450px;
        }

        /* Formulario de login */
        .login-form {
            width: 420px;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .login-form label {
            display: block;
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.95rem;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .login-form input {
            width: 100%;
            padding: 16px 18px;
            margin-bottom: 24px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.98);
            color: #333;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .login-form input:focus {
            outline: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        /* 🔸 BOTÓN MODIFICADO */
        .login-form button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #e0a96d 0%, #c88c4a 100%);
            color: white;
            font-weight: 700;
            font-size: 1.3rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(224, 169, 109, 0.5);
            margin-top: 10px;
        }

        .login-form button:hover {
            background: linear-gradient(135deg, #c88c4a 0%, #a87132 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(224, 169, 109, 0.6);
        }

        .register-link {
            margin-top: 25px;
            text-align: center;
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.95rem;
        }

        .register-link a {
            color: #fbbf24;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            color: #fcd34d;
            text-decoration: underline;
        }

        @media (max-width: 968px) {
            .main-container {
                flex-direction: column;
                gap: 40px;
                padding: 40px 30px;
                width: 90%;
            }

            .welcome-section {
                text-align: center;
            }

            .welcome-section h1 {
                font-size: 2.5rem;
            }

            .welcome-section h2 {
                font-size: 1.5rem;
            }

            .welcome-section p {
                max-width: 100%;
            }

            .login-form {
                width: 100%;
                max-width: 420px;
            }
        }
    </style>
    <script>
        const base_url = '<?= BASE_URL; ?>';
    </script>
</head>

<body>
    <div class="wave-bg"></div>
    <div class="circle-bg circle-bg-1"></div>
    <div class="circle-bg circle-bg-2"></div>
    <div class="circle-bg circle-bg-3"></div>
    <div class="circle-bg circle-bg-4"></div>

    <div class="main-container">
        <div class="welcome-section">
            <h1>¡Bienvenido!</h1>
            <h2>¡Explora con nosotros!</h2>
            <p>Autentícate para acceder a todos nuestros servicios y novedades.</p>
        </div>

        <div class="login-form">
            <form action="validar_login.php" method="POST" id="frm_login" name="frm_login">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" placeholder="12345678" id="usuario" required>

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="••••••••" id="password" required>

                <button type="button" onclick="iniciar_sesion();">Iniciar sesión</button>
            </form>

            <div class="register-link">
                ¿No tienes una cuenta? <a href="#">Regístrate</a>
            </div>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>views/function/user.js"></script>
</body>

</html>