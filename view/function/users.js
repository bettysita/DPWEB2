function validar_form(tipo) {
   let nro_identidad = document.getElementById("nro_identidad").value;
   let razon_social = document.getElementById("razon_social").value;
   let telefono = document.getElementById("telefono").value;
   let correo = document.getElementById("correo").value;
   let departamento = document.getElementById("departamento").value;
   let provincia = document.getElementById("provincia").value;
   let distrito = document.getElementById("distrito").value;
   let cod_postal = document.getElementById("cod_postal").value;
   let direccion = document.getElementById("direccion").value;
   let rol = document.getElementById("rol").value;
   if (nro_identidad == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
      Swal.fire({
         icon: "error",
         title: "Oops...",
         text: "Something went wrong!",
         footer: '<a href="#">Why do I have this issue?</a>'
      });
      Swal.fire({
         title: "Drag me!",
         icon: "success",
         draggable: true
      });

      return;
   }

   if (tipo == "nuevo") {
      registrarUsuario();
   }
   if (tipo == "actualizar") {
      actualizarUsuario();

   }
}


if (document.querySelector('#frm_user')) {
   // evita que e envie el formulario
   let frm_user = document.querySelector('#frm_user');
   frm_user.onsubmit = function (e) {
      e.preventDefault();
      validar_form("nuevo");
   }
}


async function registrarUsuario() {
   try {
      //capturar campos de formulario(HTML)
      const datos = new FormData(frm_user);
      //enviar datos a controlador 
      let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
         method: 'POST',
         mode: 'cors',
         cache: 'no-cache',
         body: datos
      });
      let json = await respuesta.json();
      // validamos que json sea true
      if (json.status) { //true
         alert(json.msg);
         document.getElementById('frm_user').reset();
      } else {
         alert(json.msg);
      }

   } catch (error) {
      console.log("Error al registrar Usuario:" + error);
   }

}


function alerth() {
   Swal.fire({
      icon: "warning",
      title: "¿Estás seguro?",
      text: "Se cancelará el registro",
      showCancelButton: true,
      confirmButtonText: "Sí, cancelar",
      cancelButtonText: "No"
   });
}

async function iniciar_sesion() {
   let usuario = document.getElementById("username").value;
   let password = document.getElementById("password").value;

   if (usuario == "" || password == "") {
      alert("error, campos vacios!");
      return;
   }
   try {
      const datos = new FormData(frm_login);
      let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
         method: 'POST',
         mode: 'cors',
         cache: 'no-cache',
         body: datos
      });
      let json = await respuesta.json();
      // validamos que json sea true
      if (json.status) { //true
         location.replace(base_url + 'new-user');
      } else {
         alert(json.msg);
      }
   } catch (error) {
      console.log(error);

   }

}

async function view_users() {
   try {
      let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=ver_usuarios', {
         method: 'POST',
         mode: 'cors',
         cache: 'no-cache'
      });
      let json = await respuesta.json();
      if (json && json.length > 0) {
         let html = '';
         json.forEach((user, index) => {
            html += `<tr>
                    <td>${index + 1}</td>
                    <td>${user.nro_identidad}</td>
                    <td>${user.razon_social}</td>
                    <td>${user.correo}</td> 
                    <td>${user.rol}</td> 
                    <td>${user.estado}</td>
                    <td>
                   <a href="${base_url}edit-user/${user.id}" class="btn btn-primary btn-sm">Editar</a>
                    <button onclick="eliminarUsuario(${user.id})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>`;

         });
         document.getElementById('content_users').innerHTML = html;
      } else {
         document.getElementById('content_users').innerHTML = '<tr><td colspan="6">No hay usuarios disponibles</td></tr>';
      }
   } catch (error) {
      console.log(error);
      document.getElementById('content_users').innerHTML = '<tr><td colspan="6">Error al cargar los usuarios</td></tr>';
   }
}

if (document.getElementById('content_users')) {
   view_users();
}

async function edit_user() {
   try {
      let id_persona = document.getElementById('id_persona').value;
      const datos = new FormData();
      datos.append("id_persona", id_persona);

      let respuesta = await fetch(
         base_url + "control/usuarioController.php?tipo=ver",
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
if (document.querySelector('#frm_edit_user')) {
   // evita que e envie el formulario
   let frm_user = document.querySelector('#frm_edit_user');
   frm_user.onsubmit = function (e) {
      e.preventDefault();
      validar_form("actualizar");
   }
}
async function actualizarUsuario() {
   const datos = new FormData(frm_edit_user);
   let respuesta = await fetch(base_url + 'control/usuarioController.php?tipo=actualizar', {
      method: 'POST',
      mode: 'cors',
      cache: 'no-cache',
      body: datos
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
async function eliminarUsuario(id_persona) {
    // Confirmación normal
    const confirmacion = confirm("¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.");
    
    if (confirmacion) {
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
                alert("Usuario eliminado correctamente");
                // Recargar la lista de usuarios
                view_users();
            } else {
                alert("Error: " + json.msg);
            }
        } catch (error) {
            console.log("Error al eliminar usuario: " + error);
            alert("Ocurrió un error al eliminar el usuario");
        }
    }
}
