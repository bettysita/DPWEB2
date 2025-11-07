<?php
$base = defined('BASE_URL') ? BASE_URL : '/';
?>
<div class="container py-3">
    <a href=""></a>
    <h2>Productos</h2>
    <div id="productos_grid" class="row g-2">
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap');

body {
    background-color: #ffffff;
    font-family: 'Quicksand', sans-serif;
    color: #5a5a5a;
}

h2 {
    text-align: center;
    font-weight: 700;
    font-size: 2rem;
    background: linear-gradient(90deg, #a479b7, #f9c5d1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 5px rgba(164,121,183,0.1);
    margin-bottom: 25px;
}

#productos_grid {
    padding: 20px;
}

#productos_grid .card {
    background-color: #ffe6eb;
    border-radius: 12px;
    border: 1px solid #f3c9d4;
    box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#productos_grid .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(255,182,193,0.4);
}

#productos_grid .card-title {
    color: #a45a76;
    font-weight: 700;
    font-size: 1.1rem;
}

#productos_grid .card-text {
    color: #6a6a6a;
    font-size: 0.95rem;
}

#productos_grid .btn {
    background: linear-gradient(90deg, #7ec8e3, #4a90e2);
    color: #ffffff;
    border: none;
    border-radius: 25px;
    padding: 10px 18px;
    font-weight: 700;
    transition: all 0.3s ease;
    box-shadow: 0 3px 8px rgba(122,188,255,0.4);
}

#productos_grid .btn:hover {
    background: linear-gradient(90deg, #66b2ff, #2e6dd6);
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(122,188,255,0.6);
}
</style>

<script>
var base_url = '<?php echo $base; ?>';
</script>
<script src="<?php echo $base; ?>views/function/Producto.js"></script>
