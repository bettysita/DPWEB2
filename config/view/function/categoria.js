
function validar_form_categoria() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    
    if (nombre=="" || detalle =="") {
        alert("error campos vacios");
        return; 
    }
    registrarCategoria();


}
    
if (document.querySelector('#frm_categoria')) {
    // evita que se envie el formulario
    let frm_categoria = document.querySelector('#frm_categoria');
    frm_categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form_categoria();
        
    }
    
}
async function registrarCategoria() {
    try {
        // capturar campos de formulario (HTML)
        const datos = new FormData(document.getElementById(frm_categoria));
        // enviar datos a controlador
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
            });
            let json = await respuesta.json();
            //validamos que json.status sea = true
            if (json.status) { // true
                alert(json.msg); 
                document.getElementById('frm_categoria').reset();  
            }else{
                alert(json.msg);
            }

    } catch (e) {
        console.error("Error al registrar categoria:" + e);
    }  
}
