function validar_form(tipo) {
    let nro_documento = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;
    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        Swal.fire({
            title: "Error campos vacios!",
            icon: "Error",
            draggable: true
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarCliente();
    }
    if (tipo == "actualizar") {
        actualizarCliente();
    }

}

if (document.querySelector('#frm_client')) {
    // evita que se envie el formulario
    let frm_client = document.querySelector('#frm_client');
    frm_client.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}
async function registrarCliente() {
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_client);
        //enviar datos a controlador
        let respuesta = await fetch(base_url + '/control/UsuarioController.php?tipo=registrar', {
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
                if (window.location.href.includes('client')) {
                    window.location.href = base_url + "clients";
                } else {
                    window.location.href = base_url + "users";
                }
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (e) {
        console.log("Error al registrar Cliente:" + e);
    }
}

async function view_clients() {
    try {
        let respuesta = await fetch(base_url + '/control/UsuarioController.php?tipo=ver_clients', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();
        let contenidot = document.getElementById('content_clients');
        if (json.status) {
            let cont = 1;
            json.data.forEach(usuario => {
                if (usuario.estado == 1) {
                    estado = "activo";
                } else {
                    estado = "inactivo";
                }
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + usuario.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `
                            <td>${cont}</td>
                            <td>${usuario.nro_identidad}</td>
                            <td>${usuario.razon_social}</td>
                            <td>${usuario.correo}</td>
                            <td>${usuario.rol}</td>
                            <td>${estado}</td>
                            <td>
                                <button class="btn btn-primary" onclick="window.location.href='`+ base_url + `edit-client/` + usuario.id + `'">Editar</button>
                                <button class="btn btn-danger" onclick="fn_eliminar(` + usuario.id + `);">Eliminar</button>
                            </td>
                `;
                cont++;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (error) {
        console.log('error en mostrar usuario ' + error);
    }
}
if (document.getElementById('content_clients')) {
    view_clients();
}

async function edit_client() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        datos.append('id_persona', id_persona);

        let respuesta = await fetch(base_url + '/control/UsuarioController.php?tipo=ver', {
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
                text: json.msg
            });
            return;
        }
        document.getElementById('nro_identidad').value = json.data.nro_identidad;
        document.getElementById('razon_social').value = json.data.razon_social;
        document.getElementById('telefono').value = json.data.telefono;
        document.getElementById('correo').value = json.data.correo;
        document.getElementById('departamento').value = json.data.departamento;
        document.getElementById('provincia').value = json.data.provincia;
        document.getElementById('distrito').value = json.data.distrito;
        document.getElementById('cod_postal').value = json.data.cod_postal;
        document.getElementById('direccion').value = json.data.direccion;
        document.getElementById('rol').value = json.data.rol;

    } catch (error) {
        console.log('oops, ocurrió un error ' + error);
    }
}
if (document.querySelector('#frm_edit_user')) {
    // evita que se envie el formulario
    let frm_user = document.querySelector('#frm_edit_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

async function actualizarCliente() {
    const datos = new FormData(frm_edit_user);
    let respuesta = await fetch(base_url + '/control/UsuarioController.php?tipo=actualizar', {
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
            if (window.location.href.includes('client')) {
                window.location.href = base_url + "clients";
            } else {
                window.location.href = base_url + "users";
            }
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
            eliminarCliente(id);
        }
    });
}
async function eliminarCliente(id) {
    try {
        let datos = new FormData();
        datos.append('id_persona', id);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            Swal.fire({
                icon: "success",
                title: "Eliminado",
                text: json.msg
            }).then(() => {
                location.reload();
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (error) {
        console.log("Error al eliminar cliente: " + error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudo eliminar el cliente. Es posible que tenga registros asociados (ventas)."
        });
    }
}