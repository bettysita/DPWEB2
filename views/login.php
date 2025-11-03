<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
            background: linear-gradient(135deg, #5b3a9d 0%, #7c5ac2 50%, #6b4ba8 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        /* Patrón de puntos mejorado */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.12) 1.5px, transparent 1.5px);
            background-size: 40px 40px;
            opacity: 0.5;
        }
        
        /* Círculos decorativos en el fondo */
        .circle-bg {
            position: absolute;
            border-radius: 50%;
            opacity: 0.15;
            animation: float 8s ease-in-out infinite;
        }
        
        .circle-bg-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 105, 180, 0.3), transparent);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }
        
        .circle-bg-2 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.25), transparent);
            bottom: -50px;
            right: -50px;
            animation-delay: 2s;
        }
        
        .circle-bg-3 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.3), transparent);
            top: 50%;
            left: 10%;
            animation-delay: 4s;
        }
        
        .circle-bg-4 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 182, 193, 0.25), transparent);
            top: 20%;
            right: 15%;
            animation-delay: 1s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -30px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }
        
        /* Líneas diagonales decorativas mejoradas */
        .line-decoration {
            position: absolute;
            width: 2px;
            background: linear-gradient(180deg, transparent, rgba(255, 215, 0, 0.3), transparent);
            animation: shimmer 3s ease-in-out infinite;
        }
        
        .line-1 {
            height: 350px;
            top: 5%;
            left: 20%;
            transform: rotate(45deg);
            animation-delay: 0s;
        }
        
        .line-2 {
            height: 300px;
            top: 10%;
            right: 25%;
            transform: rotate(-50deg);
            background: linear-gradient(180deg, transparent, rgba(255, 105, 180, 0.3), transparent);
            animation-delay: 1s;
        }
        
        .line-3 {
            height: 250px;
            bottom: 15%;
            left: 30%;
            transform: rotate(-40deg);
            background: linear-gradient(180deg, transparent, rgba(138, 43, 226, 0.25), transparent);
            animation-delay: 2s;
        }
        
        .line-4 {
            height: 280px;
            bottom: 20%;
            right: 20%;
            transform: rotate(55deg);
            background: linear-gradient(180deg, transparent, rgba(255, 182, 193, 0.3), transparent);
            animation-delay: 1.5s;
        }
        
        @keyframes shimmer {
            0%, 100% {
                opacity: 0.3;
            }
            50% {
                opacity: 0.7;
            }
        }
        
        /* Partículas brillantes */
        .sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            animation: sparkle-float 15s infinite;
        }
        
        @keyframes sparkle-float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }
        
        /* Ondas de gradiente en el fondo */
        .wave-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 30%, rgba(138, 43, 226, 0.1) 50%, transparent 70%);
            animation: wave-move 10s ease-in-out infinite;
        }
        
        @keyframes wave-move {
            0%, 100% {
                transform: translateX(-50px);
            }
            50% {
                transform: translateX(50px);
            }
        }
        
        /* Contenedor principal unificado */
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
            background: rgba(139, 92, 182, 0.25);
            backdrop-filter: blur(30px);
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.4), 0 0 100px rgba(138, 43, 226, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.15);
            animation: fadeIn 0.8s ease-out;
        }
        
        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, transparent 100%);
            border-radius: 24px;
            pointer-events: none;
        }
        
        /* Sección de bienvenida */
        .welcome-section {
            color: white;
            flex: 1;
            text-align: left;
            position: relative;
            z-index: 2;
        }
        
        .welcome-section h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: -1px;
            line-height: 1.1;
        }
        
        .welcome-section h2 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: rgba(255, 255, 255, 0.95);
            letter-spacing: -0.5px;
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
            text-align: left;
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
        
        .login-form input::placeholder {
            color: #999;
        }
        
        .login-form input:focus {
            outline: none;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        
        .login-form button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #7c3aed 0%, #6b21a8 100%);
            color: white;
            font-weight: 600;
            font-size: 1.05rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4);
            text-transform: none;
            margin-top: 10px;
        }
        
        .login-form button:hover {
            background: linear-gradient(135deg, #6b21a8 0%, #581c87 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.5);
        }
        
        .login-form button:active {
            transform: translateY(0);
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
            transition: color 0.3s;
        }
        
        .register-link a:hover {
            color: #fcd34d;
            text-decoration: underline;
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
        
        /* Responsive */
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
        const base_url = '<?=BASE_URL; ?>';
    </script>
</head>
<body>
    <!-- Onda de gradiente en el fondo -->
    <div class="wave-bg"></div>
    
    <!-- Círculos decorativos en el fondo -->
    <div class="circle-bg circle-bg-1"></div>
    <div class="circle-bg circle-bg-2"></div>
    <div class="circle-bg circle-bg-3"></div>
    <div class="circle-bg circle-bg-4"></div>
    
    <!-- Líneas decorativas mejoradas -->
    <div class="line-decoration line-1"></div>
    <div class="line-decoration line-2"></div>
    <div class="line-decoration line-3"></div>
    <div class="line-decoration line-4"></div>
    
    <!-- Partículas brillantes -->
    <script>
        for(let i = 0; i < 25; i++) {
            const sparkle = document.createElement('div');
            sparkle.className = 'sparkle';
            sparkle.style.left = Math.random() * 100 + '%';
            sparkle.style.animationDelay = Math.random() * 15 + 's';
            sparkle.style.animationDuration = (Math.random() * 10 + 15) + 's';
            document.body.appendChild(sparkle);
        }
    </script>
    
    <!-- Contenedor unificado con todo el contenido -->
    <div class="main-container">
        <!-- Sección de bienvenida -->
        <div class="welcome-section">
            <h1>¡Bienvenido!</h1>
            <h2>¡Explora con nosotros!</h2>
            <p>Autentícate para acceder a todos nuestros servicios y novedades.</p>
        </div>
        
        <!-- Formulario de login -->
        <div class="login-form">
            <form action="validar_login.php" method="POST" id="frm_login" name="frm_login">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" placeholder="12345678" id="usuario" required>
                
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="••••••••" id="password" required>
                
                <button type="button" class="btn btn-primary w-100" onclick="iniciar_sesion();">Iniciar sesión</button>
            </form>
            
            <div class="register-link">
                ¿No tienes una cuenta? <a href="#">Regístrate</a>
            </div>
        </div>
    </div>
    
    <script src="<?php echo BASE_URL; ?>views/function/user.js"></script>
</body>
</html>