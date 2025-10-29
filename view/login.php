<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Moderno</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #6b3fff, #9b6bff, #b085ff);
      background-size: 200% 200%;
      animation: moveGradient 8s ease infinite;
    }

    @keyframes moveGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      width: 850px;
      height: 480px;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 40px rgba(0, 0, 0, 0.25);
      backdrop-filter: blur(12px);
      display: flex;
      overflow: hidden;
    }

    /* FORMULARIO */
    .form-section {
      width: 50%;
      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: white;
      background: transparent;
    }

    .form-section h2 {
      font-size: 2rem;
      text-align: center;
      margin-bottom: 10px;
    }

    .form-section p {
      text-align: center;
      color: #ddd;
      margin-bottom: 30px;
      font-size: 0.95rem;
    }

    .input-box {
      position: relative;
      margin-bottom: 25px;
    }

    .input-box input {
      width: 100%;
      padding: 14px 50px;
      border: none;
      border-radius: 40px;
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      font-size: 1rem;
      outline: none;
      transition: 0.3s;
    }

    .input-box input::placeholder {
      color: rgba(255, 255, 255, 0.8);
    }

    .input-box input:focus {
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .input-box i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #fff;
      opacity: 0.8;
      font-size: 1.2rem;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 30px;
      background: linear-gradient(90deg, #b78cff, #8758ff);
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 5px 15px rgba(125, 78, 255, 0.4);
      margin-top: 10px;
    }

    .btn:hover {
      transform: scale(1.03);
      background: linear-gradient(90deg, #9d6eff, #c6a2ff);
    }

    .regi a {
      text-decoration: none;
      color: #fff;
      font-size: 0.9rem;
      display: block;
      text-align: center;
      margin-top: 15px;
      opacity: 0.9;
      transition: 0.3s;
    }

    .regi a:hover {
      opacity: 1;
      text-decoration: underline;
    }

    /* PANEL DERECHO */
    .info-section {
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
      padding: 40px;
      position: relative;
      background: transparent;
    }

    .info-content {
      z-index: 1;
    }

    .info-content h2 {
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .info-content p {
      font-size: 1rem;
      line-height: 1.6;
      color: rgba(255, 255, 255, 0.85);
      max-width: 280px;
      margin: 0 auto;
    }

    /* eliminamos cualquier capa blanca */
    .info-section::before {
      content: none;
    }

    @media (max-width: 850px) {
      .container {
        flex-direction: column;
        width: 90%;
        height: auto;
      }

      .form-section, .info-section {
        width: 100%;
        padding: 40px;
      }
    }
  </style>

  <script>
    const base_url = '<?= BASE_URL;?>';
  </script>
</head>

<body>
  <div class="container">
    <!-- FORMULARIO -->
    <div class="form-section">
      <h2>LOGIN</h2>
      <p>Inicia sesión en tu cuenta</p>

      <form id="frm_login">
        <div class="input-box">
          <i class="fas fa-user"></i>
          <input type="text" id="username" name="username" required placeholder="Usuario">
        </div>

        <div class="input-box">
          <i class="fas fa-lock"></i>
          <input type="password" id="password" name="password" required placeholder="Contraseña">
        </div>

        <button class="btn" type="button" onclick="iniciar_sesion();">Iniciar Sesión</button>

        <div class="regi">
          <a href="#">¿No tienes cuenta? Crear</a>
        </div>
      </form>
    </div>

    <!-- PANEL DERECHO -->
    <div class="info-section">
      <div class="info-content">
        <h2>Bienvenido de nuevo</h2>
        <p>Nos alegra verte otra vez. Ingresa tus credenciales para continuar con tu experiencia personalizada.</p>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/9f1b2a58c6.js" crossorigin="anonymous"></script>
  <script src="<?= BASE_URL; ?>view/function/user.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
