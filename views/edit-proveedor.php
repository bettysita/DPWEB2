<<<<<<< HEAD:view/new-user.php


    <!-- inicio de cuerpo de pagina-->
    <div class="container" style="margin-top: 100px;">
        <div class="card">
            <div class="card-header" style="text-align:center;">
                Registro de Usuario
            </div>
            <form id="frm_user" action="" method="">
=======
<!-- Inicio de cuerpo de Página -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Editar Datos de Proveedores</h5>
            <?php
            if (isset($_GET["views"])) {
                $ruta = explode("/",$_GET["views"]);
                //echo $ruta[1];
            }
            ?>
            <form id="frm_edit_proveedor" action="" method="">
                <input type="hidden" id="id_persona" name="id_persona" value="<?= $ruta[1]; ?>">
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                <div class="card-body">

                    <div class="mb-3 row">
<<<<<<< HEAD:view/new-user.php
                        <label for="nro_identidad" class="col-sm-2 col-form-label">Nro de Documento</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="razon_social" class="col-sm-2 col-form-label">Nombre/Razon Social</label>
=======
                        <label for="nro_identidad" class="col-sm-2 col-form-label">Nro identidad</label>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        <div class="col-sm-10">
                            <input type="text" maxlength="11" class="form-control" id="nro_identidad" name="nro_identidad" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="razon_social" class="col-sm-2 col-form-label">Razón Social</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <input type="number" class="form-control" id="telefono" name="telefono"required>
=======
                            <input type="text" maxlength="130" class="form-control" id="razon_social" name="razon_social" required>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="15" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <input type="email" class="form-control" id="correo" name="correo"required>
=======
                            <input type="email" maxlength="100" class="form-control" id="correo" name="correo" required>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <input type="text" class="form-control" id="departamento" name="departamento"required>
=======
                            <input type="text" maxlength="20" class="form-control" id="departamento" name="departamento" required>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <input type="text" class="form-control" id="provincia" name="provincia"required>
=======
                            <input type="text" maxlength="30" class="form-control" id="provincia" name="provincia" required>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="distrito" class="col-sm-2 col-form-label">Distrito</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <input type="text" class="form-control" id="distrito" name="distrito"required>
=======
                            <input type="text" maxlength="50" class="form-control" id="distrito" name="distrito" required>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        </div>
                    </div>

                    <div class="mb-3 row">
<<<<<<< HEAD:view/new-user.php
                        <label for="cod_postal" class="col-sm-2 col-form-label">Codigo Postal</label>
=======
                        <label for="cod_postal" class="col-sm-2 col-form-label">Código Postal</label>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cod_postal" name="cod_postal"required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <input type="text" class="form-control" id="direccion" name="direccion"required>
=======
                            <input type="text" maxlength="150" class="form-control" id="direccion" name="direccion" required>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rol" class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">
<<<<<<< HEAD:view/new-user.php
                            <select class="form-select" aria-label="Default select example" id="rol" name="rol">
                                <option value="" disabled selected>seleccione</option>
                                <option value="admin">Administrador</option>
                                <option value="user">Usuario</option>
                                <option value="proveedor">Proveedor</option>
=======
                            <select class="form-select" id="rol" name="rol" required>
                                <option value="Proveedor" selected>Proveedor</option>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
                            </select>
                        </div>
                    </div>

<<<<<<< HEAD:view/new-user.php
                    <div style="display: flex; justify-content:center; gap:20px">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-info">Limpiar</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--fin de cuerpo de pagina-->
    <script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
    
=======
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <button type="submit" class="btn btn-success">Actualizar</button>
                      <a href="<?= BASE_URL ?>users" class="btn btn-danger">Cancelar</a>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de cuerpo de Página -->
 <script src="<?php echo BASE_URL; ?>views/function/proveedor.js"></script>
 <script>
    edit_proveedor();
 </script>
>>>>>>> 12a1557f143908d62423beb642b6fda3054c014f:views/edit-proveedor.php
