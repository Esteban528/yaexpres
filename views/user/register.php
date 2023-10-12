<main class="container-md ">
  <h1 class="display-2">Registro</h1>

  <div class="form-container text-light bg-opacity-25">

    <form method="POST" id="form-register">
      <label for="personal-info" class="form-label">Información personal</label>
      <div class="input-group">
        <span class="input-group-text">Nombre y Apellidos</span>
        <input type="text" name="nombre" aria-label="First name" placeholder="Nombre" id="form-register-nombre" class="form-control if-lenght-3">
        <input type="text" name="apellido" id="form-register-apellido" aria-label="Last name" placeholder="Apellido" class="form-control if-lenght-3">
      </div>
      <div class="mb-3 form-element">
        <label for="cedula" class="form-label">Cédula de ciudadania <small class="text-body-secondary">(Opcional)</small></label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">
          <i class="bi bi-person-vcard"></i>
        </span>
        <input name="cedula" class="form-control onlyNumber" id="cedula" aria-describedby="cedula">

        </div>
        <div id="emailHelp" class="text-light form-text">Sus datos personales están seguros aquí.</div>
      </div>

      <label for="telefono" class="form-label">Contacto</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
          <i class="bi bi-whatsapp"></i>
        </span>
        <input type="text" id="form-register-telefono" class="form-control if-lenght-10 onlyNumber" placeholder="Número telefonico" aria-label="telefono" aria-describedby="basic-addon1">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Correo electronico</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">
          <i class="bi bi-envelope"></i>
        </span>
          <input type="email" name="email" class="form-control if-email" id="form-register-email" aria-describedby="emailHelp">
        </div>
        <div id="emailHelp" class="form-text text-light">Dirección de correo electrónico para autenticación y recibir novedades.</div>
      </div>

      <div class="row g-3 align-items-center">

        <label for="inputPassword" class="col-form-label">Contraseña</label>
        <div class="input-group mb-3">
          <input type="password" id="inputPassword" class="form-control if-lenght-8" aria-describedby="passwordHelpInline">
          <button class="btn btn-outline-secondary" type="button" id="form-button-showPassword">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        <div class="col-auto">
          
        </div>
      </div>      

      <button id="form-register-submit" type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>

  <main>