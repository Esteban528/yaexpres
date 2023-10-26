<?php
    importTemplate('adminNav', 'actualAdmin', $actualAdmin ?? '');
    use Model\User;
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="container admin-section main-content overflow-auto">
            <a href="/admin/post/add" class="btn btn-primary">Agregar una publicacion</a>
        </div>

        <div class="card-group row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($posts as $post): ?>
                <div class="col">
                <div class="card">
                
                    <?php if($post->imagen != '')
                        echo "<img src='/image?public=true&image={$post->imagen}' class='card-img-top w-20' alt='PostImage'>"
                    ?>
                        
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->titulo; ?></h5>
                        <p class="card-text"><?php echo $post->contenido; ?></p>
                        
                    </div>


                    <div class="card-footer">
                        <small class="text-body-secondary"><?php echo $post->fecha; ?></small>
                    </div>
                
                </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>