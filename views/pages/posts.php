<?php 
    use Model\User;
    use Model\PostMetadata;
?>
<main class="container">
    <h1>Publicaciones</h1>
    <?php foreach ($posts as $post): 
        $postMetadataVisible = PostMetadata::locate($post->id, "visible");
        $postShow = $postMetadataVisible->valor == "true";

        if (!$postShow) continue;
        if ($perm !== intval($post->tipo)) continue;
    ?>
        
        <div class="card border-primary text-center mb-4">
            <?php if($post->imagen != ''){
                // echo '<div class="col-md-4">';
                echo "<img src='/image?public=true&image={$post->imagen}' class='rounded m-1 img-fluid' alt='PostImage'>";
                // echo "</div>";
            }
            ?>
            <h5 class="card-header"><?php echo $post->titulo; ?></h5>

                <div class="card-body">
                    <p class="card-text"><?php echo $post->contenido; ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo calcTime($post->fecha); ?></small></p>
                    <blockquote>
                        <footer class="blockquote-footer">
                            <?php 
                            $user = User::find($post->usuario);
                            echo $user->nombre . " " . $user->apellido;
                            ?>
                            </footer>
                    </blockquote>
                </div>
        </div>
        <?php endforeach; ?>
</main>