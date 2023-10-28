<?php
    importTemplate('adminNav', 'actualAdmin', $actualAdmin ?? '');

use Model\Permisos;
use Model\User;
    use Model\PostMetadata;
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        
        <a href="/admin/post/add" class="mb-4 btn btn-primary">Agregar una publicacion</a>
        <div class="container admin-section main-content overflow-auto mb-4">
            <h3>Publicaciones</h3>
            <div class="card-group row row-cols-1 row-cols-md-3 g-4 container">
                <?php foreach ($posts as $post): ?>

                    <div class="col">
                        <div class="card mb-3 border-primary" style="max-width: 540px;">
                            <div class="row g-0">
                                <?php if($post->imagen != ''){
                                    echo '<div class="col-md-4">';
                                    echo "<img src='/image?public=true&image={$post->imagen}' class='rounded m-1 img-fluid' alt='PostImage'>";
                                    echo "</div>";
                                }
                                ?>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post->titulo; ?></h5>
                                    <p class="card-text text-truncate"><?php echo $post->contenido; ?>.</p>
                                    <p class="card-text"><small class="text-body-secondary"><?php echo $post->fecha; ?></small></p>
                                    <p class="card-text">Visibilidad: <?php
                                        $postMetadataVisible = PostMetadata::locate($post->id, "visible");
                                        $postShow = $postMetadataVisible->valor == "true";
                                        echo $postShow ? '<i class="bi bi-eye-fill"></i>': '<i class="bi bi-eye-slash-fill"></i>';
                                        echo " (";
                                        echo Permisos::find($post->tipo)->nombre;
                                        echo ")";
                                    ?></p>
                                    <p class="card-footer">
                                        <?php 
                                            $user = User::find($post->usuario);
                                            echo $user->nombre . " " . $user->apellido;
                                        ?>
                                    </p>
                                    <div class="btn-group">
                                        <a href="/admin/post/edit?id=<?php echo $post->id ?>" class="btn btn-warning">Editar</a>
                                        <a href="/admin/post/hide?id=<?php echo $post->id ?>&show=<?php echo $postShow ? 'false' : 'true' ?>" class="btn btn-info"><?php echo $postShow ? 'Ocultar' : 'Mostrar' ?></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </main>