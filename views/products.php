<div class="container mt-4">
    <h5 class="mb-3 text-center">Lista de Productos</h5>

    <button type="button" class="btn btn-primary mb-3" onclick="nuevoProducto()">
        + Nuevo Producto
    </button>

    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>F.V.</th>
                <th>Codigo barra</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="content_productos">
        </tbody>
    </table>
</div>

<script src="<?php echo BASE_URL; ?>views/function/Producto.js"></script>
<script src="<?php echo BASE_URL; ?>views/function/JsBarcode.all.min.js"></script>
