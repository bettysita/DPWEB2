<div class="container mt-4">
    <h3 class="text-center">Lista de Usuarios</h3>

    <p class="text-start">
        <button class="btn btn-primary" onclick="location.href='new-usuario.php'">Nuevo Usuario</button>
    </p>

    <table class="table table-bordered table-striped text-center">
        <thead class="table-light">
            <tr>
                <th>Nro</th>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="content_users">
            <!-- Aquí se cargarán los usuarios -->
        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/users.js"></script>
