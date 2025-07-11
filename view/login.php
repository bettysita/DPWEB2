<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        /* Todo tu CSS está bien */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 6px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #66a6ff;
            outline: none;
            box-shadow: 0 0 5px rgba(102, 166, 255, 0.5);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: rgb(255, 102, 196);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: rgb(79, 161, 238);
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #666;
        }

        .footer-text a {
            color: rgb(9, 6, 201);
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        const base_url = '<?= BASE_URL ?>';
    </script>
</head>
<body>
    <div class="login-container">
        <h2>login personal</h2>
        <form id="frm_login">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" id="clave" name="clave" required>
            </div>
            <button type="button" class="btn-login" onclick="iniciar_sesion();">Ingresar</button>
        </form>
        <div class="footer-text">
            ¿No tienes cuenta? <a href="#">Regístrate</a>
        </div>
    </div>

    <script src="<?= BASE_URL ?>view/DPWEB2/function.user.js"></script>
</body>
</html>
