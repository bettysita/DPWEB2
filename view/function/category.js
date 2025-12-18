
async function view_categorias() {
    try {
        let respuesta = await fetch(base_url + '/control/CategoriaController.php?tipo=ver_categorias', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        contenidot = document.getElementById('content_categorias');
        if (json.status) {
            let cont = 1;
            json.data.forEach(categoria => {

                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + categoria.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `
                            <td>${cont}</td>
                            <td>${categoria.nombre}</td>
                            <td>${categoria.detalle}</td>
                            <td>
                                <button class="btn btn-primary" onclick="window.location.href='`+ base_url + `edit-category/` + categoria.id + `'">Editar</button>
                                <button class="btn btn-danger" onclick="fn_eliminar(` + categoria.id + `);">Eliminar</button>
                            </td>
                `;
                cont++;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (error) {
        console.log('error en mostrar categoria ' + error);
    }
}
if (document.getElementById('content_categorias')) {
    view_categorias();
}



function validar_form(tipo) {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    if (nombre == "" || detalle == "") {
        Swal.fire({
            title: "Error campos vacios!",
            icon: "Error",
            draggable: true
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarCategoria();
    }
    if (tipo == "actualizar") {
        actualizarCategoria();
    }

}

if (document.querySelector('#frm_category')) {
    // evita que se envie el formulario
    let frm_category = document.querySelector('#frm_category');
    frm_category.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}
async function registrarCategoria() {
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_category);
        //enviar datos a controlador
        let respuesta = await fetch(base_url + '/control/CategoriaController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        // validamos que json.status sea = True
        if (json.status) {
            Swal.fire({
                icon: "success",
                title: "Éxito",
                text: json.msg
            }).then(() => {
                document.getElementById('frm_category').reset();
                window.location.href = base_url + "category";
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (e) {
        console.log("Error al registrar Categoria:" + e);
    }
}


async function edit_categoria() {
    try {
        let id_categoria = document.getElementById('id_categoria').value;
        const datos = new FormData();
        datos.append('id_categoria', id_categoria);

        let respuesta = await fetch(base_url + '/control/CategoriaController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
            return;
        }
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
    } catch (error) {
        console.log('oops, ocurrió un error ' + error);
    }
}
if (document.querySelector('#frm_edit_category')) {
    edit_categoria();
    // evita que se envie el formulario
    let frm_user = document.querySelector('#frm_edit_category');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}


async function actualizarCategoria() {
    const datos = new FormData(frm_edit_category);
    let respuesta = await fetch(base_url + '/control/CategoriaController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrió un error al actualizar, inténtelo nuevamente"
        });
        console.log(json.msg);
        return;
    } else {
        Swal.fire({
            icon: "success",
            title: "Actualizado",
            text: json.msg
        }).then(() => {
            window.location.href = base_url + "category";
        });
    }
}


async function fn_eliminar(id) {
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrá revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarCategoria(id);
        }
    });
}
async function eliminarCategoria(id) {
    let datos = new FormData();
    datos.append('id_categoria', id);
    let respuesta = await fetch(base_url + '/control/CategoriaController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    let json = await respuesta.json();
    if (!json.status) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrió un error al eliminar categoría, inténtelo más tarde"
        });
        console.log(json.msg);
        return;
    } else {
        Swal.fire({
            icon: "success",
            title: "Eliminado",
            text: json.msg
        }).then(() => {
            location.reload();
        });
    }
}