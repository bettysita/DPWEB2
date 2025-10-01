<div class="container mt-4">
    <h3 class="text-center">Lista de Productos</h3>

    <p class="text-start">
        <a href="<?php echo BASE_URL; ?>new-producto" class="btn btn-primary">
            Nuevo Producto
        </a>
    </p>

    <table class="table table-bordered table-striped text-center">
        <thead class="table-light">
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
            <!-- Aquí se cargarán los productos -->
        </tbody>
    </table>
</div>

<!-- Script -->
<script src="<?php echo BASE_URL; ?>view/function/producto.js"></script>

