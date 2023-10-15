<main class="container">
    <h1 class="display-5">Iniciar sesión</h1>
    
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required name="login[email]" type="email" class="form-control if-email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $login['email'] ?? '' ?>">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="input-group mb-3">
          <button class="btn btn-outline-secondary" type="button" id="form-button-showPassword">
            <i class="bi bi-eye"></i>
          </button>

          <input type="password" name="login[password]" value="<?php echo $login['password'] ?? '' ?>" id="inputPassword" class="form-control if-lenght-8" aria-describedby="passwordHelpInline">
          
        </div>
        
        <button type="submit" class="btn btn-primary">Inicia sesión</button>
    </form>
    <p>¿No tienes una cuenta? <a href="/register" class="btn btn-link">Crea una cuenta</a></p>
</main>

