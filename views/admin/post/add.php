<?php
    importTemplate('adminNav', 'actualAdmin', $actualAdmin ?? '');;
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="container admin-section main-content overflow-auto">
            <form method="POST" action="/admin/post/add" id="form-register" class="form-container">
            <div class="mb-3">
                <input type="hidden" name="post[id]" value="<?php echo $post->id ?? 0 ?>" >
                <label for="titlePost" class="form-label">Titulo de la publicación</label>
                <input type="email" class="form-control" id="titlePost" placeholder="Escriba el titulo que usted quiere que tenga la publicación" name="post[titulo]" value="<?php $post->titulo ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label for="contentPost" class="form-label">Contenido</label>
                    <textarea name="post[contenido]" value="<?php $post->contenido ?? '' ?> ?>" class="form-control" id="contentPost" rows="3" placeholder="Escriba el texto que usted quiere que tenga la publicación"></textarea>
                </div>

                <div class="mb-3">
                    <label for="imageFile" class="form-label">Imagen del post</label>
                    <input class="form-control" type="file" name="post[imagen]" value="<?php $post->imagen ?? '' ?> accept="image/jpeg, image/png">
                </div>

                <div class="mt-3 mb-3">
                <label for="rankSelector" class="form-label">Seleccione que tipo de usuarios va a ver la publicacion    </label>
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
    </main>