<?php
$base = defined('BASE_URL') ? BASE_URL : '/';
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap');

    body {
        background-color: #f8f9fa;
        font-family: 'Quicksand', sans-serif;
        color: #5a5a5a;
        overflow: hidden;
    }

    h2,
    .card-title {
        font-weight: 700;
    }

    .input-group-search .input-group-text {
        border: 1px solid #dee2e6;
        border-radius: 8px 0 0 8px;
        background-color: #fff;
        color: #6c757d;
    }

    #buscar_producto {
        border: 1px solid #dee2e6;
        border-radius: 0 8px 8px 0;
        padding: 10px 15px;
    }

    #buscar_producto:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.15);
    }

    .card-productos {
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .productos-container {
        max-height: calc(100vh - 250px);
        overflow-y: auto;
        padding-right: 5px;
    }

    .productos-container::-webkit-scrollbar {
        width: 0 !important;
        height: 0 !important;
    }

    #productos_grid .card {
        background-color: #fff;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    #productos_grid .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    #productos_grid .card-title {
        color: #333;
        font-weight: 600;
        font-size: 1rem;
    }

    #productos_grid .card-text {
        color: #666;
        font-size: 0.9rem;
    }

    #productos_grid .btn {
        background-color: #4a90e2;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px 16px;
        font-weight: 600;
        transition: background-color 0.2s ease;
    }

    #productos_grid .btn:hover {
        background-color: #357abd;
    }

    .lista-compra-simple {
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        padding: 20px;
    }

    .lista-compra-simple h5 {
        color: #333;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
    }

    /* 🔥 Barra de navegación del carrito (solo títulos) */
    .carrito-header {
        display: grid;
        grid-template-columns: 1.5fr 0.8fr 0.8fr 0.8fr 0.6fr;
        font-weight: 700;
        color: #333;
        padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 10px;
        font-size: 0.9rem;
        text-align: center;
    }

    .lista-vacia {
        text-align: center;
        color: #999;
        padding: 40px 0;
    }

    .totales {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 2px solid #e9ecef;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .total-row.total-final {
        font-size: 1.2rem;
        font-weight: 700;
        color: #333;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 2px solid #dee2e6;
    }

    .total-row .valor {
        font-weight: 700;
        color: #4a90e2;
    }

    .btn-venta {
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 12px;
        width: 100%;
        font-weight: 700;
        margin-top: 15px;
        transition: background-color 0.2s ease;
    }

    .btn-venta:hover {
        background-color: #218838;
    }
</style>

<div class="container-fluid mt-4">
    <div class="row">

        <!-- Sección de Productos -->
        <div class="col-lg-8 col-md-7">
            <h2 class="mb-3">Productos</h2>

            <div class="card card-productos">
                <div class="card-body p-3">

                    <!-- Buscador dentro del contenedor -->
                    <div class="mb-3">
                        <div class="input-group input-group-search">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control" id="busqueda_venta" placeholder="Buscar producto..." onkeypress="viewMisProducts();">
                        </div>
                    </div>

                    <!-- GRID -->
                    <div class="productos-container">
                        <div id="productos_grid" class="row g-3">
                            <!-- Productos aquí -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Carrito -->
        <div class="col-lg-4 col-md-5">
            <h2 class="mb-3">Carrito</h2>

            <div class="lista-compra-simple">
                <h5>Lista de Compra</h5>

                <!-- 🔥 Navegación simple (sin tabla) -->
                <div class="carrito-header">
                    <span>Producto</span>
                    <span>Cantidad</span>
                    <span>Precio</span>
                    <span>Total</span>
                    <span>Acciones</span>
                </div>

                <div id="lista_compra">
                    <div class="lista-vacia">
                        <i class="fas fa-shopping-cart" style="font-size: 3rem; color: #ddd;"></i>
                        <p>No hay productos</p>
                    </div>
                </div>

                <div class="totales">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span class="valor" id="subtotal">$0.00</span>
                    </div>

                    <div class="total-row">
                        <span>IGV (18%):</span>
                        <span class="valor" id="igv">$0.00</span>
                    </div>

                    <div class="total-row total-final">
                        <span>Total:</span>
                        <span class="valor" id="total">$0.00</span>
                    </div>

                    <button class="btn-venta" id="btn_realizar_venta">
                        <i class="fas fa-check-circle"></i> Realizar Venta
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var base_url = '<?php echo $base; ?>';
</script>
<script src="<?php echo $base; ?>views/function/Producto.js"></script>
<script src="<?php echo $base; ?>views/function/venta.js"></script>
