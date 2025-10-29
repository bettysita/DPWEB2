<div class="container mt-4">
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
