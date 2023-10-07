<?php require 'app/app.php';
  importTemplate('header');
?>

<main class="container">
    <h1 class="display-5">Iniciar sesión</h1>
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">Inicia sesión</button>
    </form>
    <p>¿No tienes una cuenta? <a href="register.php" class="btn btn-link">Crea una cuenta</a></p>
</main>
<?php importTemplate('footer');
