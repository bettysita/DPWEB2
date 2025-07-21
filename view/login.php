<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background-image: url('https://img.freepik.com/vector-gratis/fondo-minimalista-gradiente_23-2149976746.jpg?semt=ais_hybrid&w=740');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2); /* Cambiado para que se vea claro */
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 900px;
            padding: 2rem;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
        }

        .card-inner-content {
            display: flex;
            flex-direction: column;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            margin-bottom: 2rem;
        }

        .sign-in-title {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .card-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .welcome-section {
            color: white;
        }

        .welcome-title {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .welcome-subtitle {
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .welcome-text {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .login-section {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }

        .input-label {
            color: white;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
        }

        .form-input {
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            font-size: 1rem;
            outline: none;
        }

        .form-input::placeholder {
            color: rgba(155, 10, 10, 0.7);
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
        }

        .forgot-link {
            color: white;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .submit-btn {
            background: #420adbff;
            border: none;
            padding: 1rem;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: 0.3s ease;
        }

        .submit-btn:hover {
            background: #8711e7ff;
        }

        .signup-link {
            color: white;
            font-size: 0.9rem;
            margin-top: 1rem;
            text-align: center;
        }

        .signup-link a {
            color: #fca5a5;
            text-decoration: none;
        }

        .demo-info {
            color: white;
            font-size: 0.8rem;
            text-align: center;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .card-content {
                grid-template-columns: 1fr;
            }

            .welcome-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-card">
            <div class="card-inner-content">
                <div class="card-header"></div>

                <div class="card-content">
                    <!-- Lado izquierdo: bienvenida -->
                    <div class="welcome-section">
                        <h2 class="welcome-title">¡Bienvenido!</h2>
                        <h3 class="welcome-subtitle">¡Explora con nosotros!</h3>
                        <p class="welcome-text">
                            Autentícate para acceder a todos nuestros servicios y novedades.
                        </p>
                    </div>

                    <!-- Lado derecho: formulario -->
                    <div class="login-section">
                        <form id="frm_login">
                            <div class="form-group">
                                <label class="input-label" for="username">Usuario</label>
                                <input type="text" id="username" name="username" class="form-input" placeholder="Ingrese su usuario">
                            </div>

                            <div class="form-group">
                                <label class="input-label" for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-input" placeholder="Ingrese su contraseña">
                            </div>

                            <button type="button" class="submit-btn" onclick="iniciar_sesion()">Iniciar sesión</button>
                        </form>

                        <div class="signup-link">
                            ¿No tienes una cuenta? <a href="#">Regístrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function iniciar_sesion() {
            const user = document.getElementById('username').value.trim();
            const pass = document.getElementById('password').value.trim();

            if (user === 'admin@example.com' && pass === 'admin') {
                alert('Inicio de sesión exitoso');
            } else {
                alert('Usuario o contraseña incorrecta');
            }
        }
    </script>
</body>

</html>
