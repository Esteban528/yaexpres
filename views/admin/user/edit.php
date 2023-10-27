
<div class="container-md ">
    <div class="d-flex flex-row mb-3 align-items-center">
        <div class="p-2 ">
            <a href="/admin/users" class="btn btn-info">Volver</a>
        </div>
        <h3 class="p-2 display-5">Editar usuario</h3>
    </div>
    

    <div class="form-container text-light bg-opacity-25">

        <form method="POST" id="">
            <label for="personal-info" class="form-label">Información personal</label>
            <div class="input-group">
                <span class="input-group-text">Nombre y Apellidos</span>
                <input type="text" name="user[nombre]" value="<?php echo $user->nombre ?? '' ?>" aria-label="First name" placeholder="Nombre" id="form-register-nombre" class="form-control if-lenght-3">
                <input type="text" name="user[apellido]" value="<?php echo $user->apellido ?? '' ?>" id="form-register-apellido" aria-label="Last name" placeholder="Apellido" class="form-control if-lenght-3">
            </div>
            <div class="mb-3 form-element">
                <label for="cedula" class="form-label">Cédula de ciudadania <small class="text-body-secondary">(Opcional)</small></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-person-vcard"></i>
                    </span>
                    <input name="user[cedula]" value="<?php echo $user->cedula ?? '' ?>" class="form-control onlyNumber" id="cedula" aria-describedby="cedula">

                </div>
                <div id="emailHelp" class="text-light form-text">Sus datos personales están seguros aquí.</div>
            </div>

            <label for="telefono" class="form-label">Contacto</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-whatsapp"></i>
                </span>
                <input type="text" name="user[telefono]" value="<?php echo $user->telefono ?? '' ?>" id="form-register-telefono" class="form-control if-lenght-10 onlyNumber" placeholder="Número telefonico" aria-label="telefono" aria-describedby="basic-addon1">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="user[email]" value="<?php echo $user->email ?? '' ?>" class="form-control if-email" id="form-register-email" aria-describedby="emailHelp">
                </div>
                <div id="emailHelp" class="form-text text-light">Dirección de correo electrónico para autenticación y recibir novedades.</div>
            </div>

            <div class="mt-3 mb-3">
            <label for="rankSelector" class="form-label">Seleccione el rango</label>
                <select id="rankSelector" class="form-select" name="user[permiso]" aria-label="Default select example">
                    <?php foreach($ranks as $rank):?>
                        <option <?php echo $rank->id == $user->permiso ? "selected" : null; ?> value="<?php echo $rank->id; ?>"><?php echo $rank->nombre; ?></option>
                    <?php endforeach;
                    ?>
                </select>
            </div>

            <button id="form-register-submit" type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>

</div>


<!--data-bs-toggle="modal" data-bs-target="#modalFactory" Modal -->
<div class="modal fade" id="modalFactory" tabindex="-1" aria-labelledby="modalFactoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalFactoryLabel">¿Los datos son correctos?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-bodyRegster">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
                <button type="button" class="btn btn-primary" id="register-button-Confirm">Registrarse</button>
            </div>
        </div>
    </div>
</div>