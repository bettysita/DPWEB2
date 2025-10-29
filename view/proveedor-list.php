<div class="container">
    <h5 class="mt-3 text-center">Lista de Proveedores</h5>

    <table class="table table-bordered text-center">
        <thead>
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

        <tbody id="content_proveedor">
            <!-- Aquí se cargarán los datos dinámicamente -->
        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/proveedor.js"></script>
<!--<script>view_users();</script>-->
