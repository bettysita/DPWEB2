<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - SIGI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <style>
    body {
      /* Degradado similar a la imagen: Azul a la izquierda, Magenta a la derecha */
      background: linear-gradient(135deg, #005bea 0%, #88d8eeff 0%, #665cf1ff 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow: hidden; /* Para evitar scroll si se usa el efecto de ondas */
    }

    /* Efecto de ondas sutiles en el fondo (Opcional, puramente estético) */
    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: radial-gradient(circle at 10% 20%, rgba(255,255,255,0.1) 0%, transparent 20%);
      pointer-events: none;
      z-index: 0;
    }

    .login-box {
      /* Eliminamos el fondo blanco solido para hacerlo transparente como la imagen */
      background: transparent; 
      padding: 2rem;
      width: 100%;
      max-width: 400px;
      position: relative;
      z-index: 1;
      color: white; /* Texto blanco */
    }

    .login-box h2 {
      margin-bottom: 2rem;
      font-weight: 400;
      font-size: 2.5rem;
      text-align: center;
    }

    /* Estilos para los Inputs transparentes */
    .custom-input-group {
      background: rgba(255, 255, 255, 0.2); /* Blanco semitransparente */
      border-radius: 4px;
      display: flex;
      align-items: center;
      padding: 0.5rem;
      margin-bottom: 1.5rem;
      border: 1px solid rgba(255,255,255,0.1);
    }

    .custom-input-group i {
      color: rgba(255, 255, 255, 0.8);
      padding: 0 10px;
      font-size: 1.2rem;
    }

    .form-control {
      background: transparent !important;
      border: none !important;
      color: white !important;
      box-shadow: none !important;
    }

    /* Color del placeholder (texto de ayuda) */
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.9rem;
    }

    /* Botón de Login */
    .btn-login {
      background-color: rgba(255, 255, 255, 0.3);
      border: 1px solid rgba(255,255,255,0.4);
      color: white;
      border-radius: 50px; /* Borde redondeado tipo píldora */
      padding: 10px 0;
      font-weight: 500;
      transition: all 0.3s;
      width: 100%;
      margin-top: 1rem;
    }

    .btn-login:hover {
      background-color: rgba(255, 255, 255, 0.5);
      color: white;
    }

    /* Estilos para "Remember Me" y "Forgot Me" */
    .options-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 1rem;
    }

    .options-row a {
      color: rgba(255, 255, 255, 0.9);
      text-decoration: none;
    }

    .form-check-input {
      background-color: rgba(255,255,255,0.3);
      border: none;
    }
    
    /* Ocultar labels originales visualmente pero mantener accesibilidad */
    .visually-hidden-custom {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0,0,0,0);
      border: 0;
    }

    .logo {
      display: none; /* La imagen de referencia no tiene logo visible, solo texto "Login" */
    }
  </style>
  <script>
    const base_url = '<?= BASE_URL; ?>';
  </script>
</head>
<body>

<div class="login-box">
  <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/HD_transparent_picture.png" alt="Logo" class="logo">
  
  <h2>Login</h2>
  
  <form id="frm_login">
    
    <div class="custom-input-group">
        <i class="bi bi-person-fill"></i>
        <label for="username" class="visually-hidden-custom">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
    </div>

    <div class="custom-input-group">
        <i class="bi bi-lock-fill"></i>
        <label for="password" class="visually-hidden-custom">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <div class="options-row">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>
        <a href="#">Forgot Me?</a>
    </div>

    <button type="button" class="btn btn-login" onclick="iniciar_sesion();">Ingresar</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL; ?>view/function/user.js"></script>

</body>
</html>