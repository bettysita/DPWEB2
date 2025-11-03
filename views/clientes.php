<div class="container mt-4">
    <h4 class="mb-3 text-center">Lista de Clientes</h4>

    <button type="button" class="btn btn-primary mb-3" onclick="nuevoCliente()">
        + Agregar Cliente
    </button>

    <table class="table table-striped table-bordered text-center">
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
        <tbody id="content_clientes">
            
        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>views/function/clientes.js"></script>
