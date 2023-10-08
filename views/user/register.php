
<main class="container">
  <h1 class="display-2">Registro</h1>

  <form method="POST">
    <label for="personal-info" class="form-label">Información personal</label>
    <div class="input-group">
      <span class="input-group-text">Nombre y Apellidos</span>
      <input type="text" name="nombre" aria-label="First name" placeholder="Nombre" class="form-control">
      <input type="text" name="apellido" aria-label="Last name" placeholder="Apellido" class="form-control">
    </div>
    <div class="mb-3">
      <label for="cedula" class="form-label">Cédula de ciudadania <small class="text-body-secondary">(Opcional)</small></label>
      <input type="dni" name="cedula" class="form-control" id="cedula" aria-describedby="cedula">
      <div id="emailHelp" class="form-text">Sus datos personales están seguros aquí.</div>
    </div>

    <label for="telefono" class="form-label">Contacto</label>
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
        </svg>
    </span>
      <input type="text" id="telefono" class="form-control" placeholder="Número telefonico" aria-label="telefono" aria-describedby="basic-addon1">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Correo electronico</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Dirección de correo electrónico para autenticación y recibir novedades</div>
    </div>
    
    <div class="row g-3 align-items-center">
        
        <label for="inputPassword6" class="col-form-label">Password</label>
        
        <div class="col-auto">
            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
            Minimo 8 caracteres
            </span>
        </div>
        
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
            Confirma tu contraseña
            </span>
        </div>
        
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<main>
