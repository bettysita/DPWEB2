async function agregar_producto_temporal() {
    let id = document.getElementById('id_producto_venta').value;
    let precio = document.getElementById('producto_precio_venta').value;
    let cantidad = document.getElementById('producto_cantidad_venta').value;
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);
    try {
        let respuesta = await fetch(base_url + '/control/VentaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            Swal.fire({
                icon: "success",
                title: "Carrito",
                text: json.msg == "registrado" ? "Producto agregado al carrito" : "Cantidad actualizada en el carrito",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });
            listarTemporales();
        }

    } catch (error) {
        console.log("error en agregar producto temporal " + error);
    }
}

async function listarTemporales() {
    try {
        let respuesta = await fetch(base_url + '/control/VentaController.php?tipo=listarTemporales', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        contenidot = document.getElementById('lista_compra');
        contenidot.innerHTML = '';
        let subtotal = 0;
        if (json.status) {
            json.data.forEach(temp => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.innerHTML = `
                    <td>${temp.producto}</td>
                    <td><input type="number" class="form-control" value="${temp.cantidad}" min="1" onchange="actualizarCantidad(${temp.id}, this.value)"></td>
                    <td>$${temp.precio}</td>
                    <td>$${temp.subtotal}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarTemporal(${temp.id})">Eliminar</button></td>
                `;
                contenidot.appendChild(nueva_fila);
                subtotal += temp.subtotal;
            });
        }
        let igv = subtotal * 0.18;
        let total = subtotal + igv;
        document.getElementById('subtotal').innerHTML = '$' + subtotal.toFixed(2);
        document.getElementById('igv').innerHTML = '$' + igv.toFixed(2);
        document.getElementById('total').innerHTML = '$' + total.toFixed(2);
    } catch (e) {
        console.log('error en listar temporales ' + e);
    }
}

async function eliminarTemporal(id) {
    const datos = new FormData();
    datos.append('id', id);
    try {
        let respuesta = await fetch(base_url + '/control/VentaController.php?tipo=eliminarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            listarTemporales();
        }
    } catch (error) {
        console.log("error en eliminar temporal " + error);
    }
}

async function actualizarCantidad(id, cantidad) {
    const datos = new FormData();
    datos.append('id', id);
    datos.append('cantidad', cantidad);
    try {
        let respuesta = await fetch(base_url + '/control/VentaController.php?tipo=actualizarCantidadTemporalPorId', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            // Actualizar subtotales y totales sin recargar toda la lista
            actualizarTotales();
            // También actualizar el subtotal de la fila específica
            let fila = document.querySelector(`input[onchange*="${id}"]`).closest('tr');
            let precio = parseFloat(fila.cells[2].innerText.replace('$', ''));
            let subtotal = precio * parseInt(cantidad);
            fila.cells[3].innerHTML = '$' + subtotal.toFixed(2);
        }
    } catch (error) {
        console.log("error en actualizar cantidad " + error);
    }
}

async function actualizarTotales() {
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=listarTemporales', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        if (json.status) {
            let subtotal = 0;
            json.data.forEach(temp => {
                subtotal += temp.subtotal;
            });
            let igv = subtotal * 0.18;
            let total = subtotal + igv;
            document.getElementById('subtotal').innerHTML = '$' + subtotal.toFixed(2);
            document.getElementById('igv').innerHTML = '$' + igv.toFixed(2);
            document.getElementById('total').innerHTML = '$' + total.toFixed(2);
        }
    } catch (e) {
        console.log('error en actualizar totales ' + e);
    }
}

async function realizarVenta() {
    try {
        let respuesta = await fetch(base_url + '/control/VentaController.php?tipo=registrarVenta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        if (json.status) {
            alert("Venta realizada por $" + json.total);
            listarTemporales(); // to clear the list
        }
    } catch (error) {
        console.log("error en realizar venta " + error);
    }
}

async function buscar_cliente_venta() {
    let dni = document.getElementById('cliente_dni').value;
    if (dni == '') {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "Ingrese el DNI del cliente"
        });
        return;
    }
    try {
        const datos = new FormData();
        datos.append('dni', dni);
        let respuesta = await fetch(base_url + '/control/UsuarioController.php?tipo=buscar_cliente', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        if (!respuesta.ok) {
            throw new Error(`HTTP error! status: ${respuesta.status}`);
        }
        json = await respuesta.json();
        if (json.status) {
            document.getElementById('cliente_nombre').value = json.data.razon_social;
            document.getElementById('id_cliente_venta').value = json.data.id;
            Swal.fire({
                icon: "success",
                title: "Cliente encontrado",
                text: json.data.razon_social,
                timer: 1500,
                showConfirmButton: false
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "No encontrado",
                text: json.msg
            });
            document.getElementById('cliente_nombre').value = '';
            document.getElementById('id_cliente_venta').value = '';
        }
    } catch (error) {
        console.log("error en buscar cliente " + error);
        alert("Error al buscar cliente: " + error.message);
    }
}

if (document.getElementById('lista_compra')) {
    listarTemporales();
}

async function registrarVenta() {
    let id_cliente = document.getElementById('id_cliente_venta').value;
    let fecha_venta = document.getElementById('fecha_venta').value;
    try {
        const datos = new FormData();
        datos.append('id_cliente', id_cliente);
        datos.append('fecha_venta', fecha_venta);
        let respuesta = await fetch(base_url + '/control/VentaController.php?tipo=registrarVenta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            Swal.fire({
                icon: "success",
                title: "Venta Exitosa",
                text: "Venta registrada con éxito. Código: " + json.codigo + " Total: $" + json.total.toFixed(2)
            }).then(() => {
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error de Venta",
                text: json.msg
            });
        }

    } catch (error) {
        console.log("error en registrar venta " + error);

    }
}