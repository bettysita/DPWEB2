function validar_form(tipo) {
  let nro_identidad = document.getElementById("nro_identidad").value;
  let razon_social = document.getElementById("razon_social").value;
  let telefono = document.getElementById("telefono").value;
  let correo = document.getElementById("correo").value;
  let departamento = document.getElementById("departamento").value;
  let provincia = document.getElementById("provincia").value;
  let cod_postal = document.getElementById("cod_postal").value;
  let direccion = document.getElementById("direccion").value;
  let rol = document.getElementById("rol").value;

  if (
    nro_identidad == "" ||
    razon_social == "" ||
    telefono == "" ||
    correo == "" ||
    departamento == "" ||
    provincia == "" ||
    cod_postal == "" ||
    direccion == "" ||
    rol == ""
  ) {
    Swal.fire({
      title: "Error de Validación",
      text: "Existen campos vacíos. Por favor, complete todos los datos.",
      icon: "error",
      confirmButtonText: "Entendido",
    });
    return;
  }

  if (tipo== "nuevo") {
    registrarCliente();
  }
  if (tipo== "actualizar") {
    actualizarCliente();
  }
  
}

if (document.querySelector("#frm_cliente")) {
  // Evita que se envie el formulario
  let frm_user = document.querySelector("#frm_cliente");
  frm_user.onsubmit = function (e) {
    e.preventDefault();
    validar_form("nuevo");
  };
}

async function registrarCliente() {
  try {
    const datos = new FormData(document.querySelector("#frm_cliente"));

    let respuesta = await fetch(
      base_url + "control/UsuarioController.php?tipo=registrar",
      {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        body: datos,
      }
    );

    let json = await respuesta.json();

    if (json.status) {
      alert(json.msg);
      document.getElementById("frm_cliente").reset();
    } else {
      alert(json.msg);
    }
  } catch (e) {
    console.log("Error a registrar Usuario:" + e);
  }
}


async function iniciar_sesion() {
  let usuario = document.getElementById("usuario").value;
  let password = document.getElementById("password").value;

  if (usuario == "" || password == "") {
    alert("ERROR, CAMPOS VACÍOS!");
    return;
  }

  try {
    const datos = new FormData(document.querySelector("#frm_login"));
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
      method: "POST",
      mode: "cors",
      cache: "no-cache",
      body: datos,
    });
    // ------------------------------
    let json = await respuesta.json();
    // Validamos que json.status sea=true
    if (json.status) { // true
      location.replace(base_url + 'new-clientes');
    } else {
      alert(json.msg);
    }
  } catch (error) {
    console.log(error);
  }
}

async function view_clientes() {
  try {
    let respuesta = await fetch(
      base_url + "control/UsuarioController.php?tipo=ver_clientes",
      {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
      }
    );
    let json = await respuesta.json();
    if (json && json.length > 0) {
      let html = "";
      json.forEach((user, index) => {
        html += `<tr>
                    <td>${index + 1}</td>
                    <td>${user.nro_identidad}</td>
                    <td>${user.razon_social}</td>
                    <td>${user.correo}</td> 
                    <td>${user.rol}</td> 
                    <td>${user.estado}</td>
                    <td>
                    <a href="${base_url}edit-clientes/${user.id}" class="btn btn-primary btn-sm">Editar</a>
                    <button onclick="eliminarCliente(${user.id})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                    </tr>`;
      });
      document.getElementById("content_clientes").innerHTML = html;
    } else {
      document.getElementById("content_clientes").innerHTML =
        '<tr><td colspan="6">No hay clientes disponibles</td></tr>';
    }
  } catch (error) {
    console.log(error);
    document.getElementById("content_clientes").innerHTML =
      '<tr><td colspan="6">Error al cargar los Clientes</td></tr>';
  }
}

if (document.getElementById("content_clientes")) {
  view_clientes();
}

async function edit_clientes() {
  try {
    let id_persona = document.getElementById('id_persona').value;
    const datos = new FormData();
    datos.append("id_persona", id_persona);
    let respuesta = await fetch(
      base_url + "control/UsuarioController.php?tipo=ver",
      {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        body: datos
      });
    json = await respuesta.json();
    if (!json.status) {
      alert(json.msg);
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
    console.log('oops, ocurrio un error' + error);
  }
}
if (document.querySelector("#frm_edit_user")) {
  // evita que se envie el formulario
  let frm_user = document.querySelector("#frm_edit_cliente");
  frm_user.onsubmit = function (e) {
    e.preventDefault();
    validar_form("actualizar");
  }
}

async function actualizarCliente() {
  const datos = new FormData(frm_edit_cliente);
  let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=actualizar', {
      method: "POST",
      mode: "cors",
      cache: "no-cache",
      body: datos,
  });
  json = await respuesta.json();
    if (!json.status) {
      alert("Ooops, ocurrio un error al actualizar, intentelo nuevamente");
      console.log(json.msg);
      return;
    }else{
      alert(json.msg);
    }
    
}

async function eliminarCliente(id_persona) {
    // Confirmar eliminación
    const confirmacion = await Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    });

    if (confirmacion.isConfirmed) {
        try {
            const datos = new FormData();
            datos.append("id_persona", id_persona);
            
            let respuesta = await fetch(
                base_url + "control/UsuarioController.php?tipo=eliminar",
                {
                    method: "POST",
                    mode: "cors",
                    cache: "no-cache",
                    body: datos,
                }
            );
            
            let json = await respuesta.json();
            
            if (json.status) {
                Swal.fire({
                    title: 'Eliminado',
                    text: json.msg,
                    icon: 'success'
                });
                // Recargar la lista de usuarios
                view_clientes();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: json.msg,
                    icon: 'error'
                });
            }
        } catch (error) {
            console.log("Error al eliminar usuario: " + error);
            Swal.fire({
                title: 'Error',
                text: 'Ocurrió un error al eliminar el usuario',
                icon: 'error'
            });
        }
    }
}
function nuevoCliente() {
  // Redirige al formulario de registro de productos
  window.location.href = base_url + "new-clientes"; 
}