function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre === "" || detalle === "") {
        alert("Error: Existen campos vacíos");
        return;
    }
    registrarCategoria();
}

if (document.querySelector('#frm_categoria')) {
    let frm_categoria = document.querySelector('#frm_categoria');
    frm_categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarCategoria() {
    try {
        const datos = new FormData(frm_categoria);
        let respuesta = await fetch(bd_url + 'control/categoriaController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();

        if (json.status) {
            alert(json.msg);
            frm_categoria.reset();
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar categoría: " + e);
    }
}
