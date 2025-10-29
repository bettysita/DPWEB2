<div class="container">
    <h5 class="mt-3 text-center">LISTA DE CLIENTES</h5>

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

        <tbody id="content_clients">
            <!-- Contenido dinámico -->
        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/clients.js"></script>
<!--<script>view_users();</script>-->
