<div class="container">
    <h5 class="mt-3 text-center">Lista de Productos</h5>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Proveedor</th>
                <th>Fecha Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="content_productos">
            <!-- Aquí se cargarán los datos dinámicamente -->
        </tbody>
    </table>
</div>

<script src="<?php echo BASE_URL; ?>view/function/producto.js"></script>
