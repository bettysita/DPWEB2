<div class="container mt-4">
<<<<<<< HEAD
  <h5 class="text-center mt-3">Lista de Usuarios</h5>

  <table class="table table-bordered text-center mt-3">
    <thead>
      <tr>
        <th>N°</th>
        <th>DNI</th>
        <th>Nombres y Apellidos</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody id="content_users">
      <!-- Aquí se cargarán los datos dinámicamente -->
    </tbody>
  </table>
</div>

<script src="<?= BASE_URL ?>view/function/user.js"></script>
=======
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
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f
