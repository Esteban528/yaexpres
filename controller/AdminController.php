<?php
namespace Controller;

use Intervention\Image\Exception\ImageException;
use Model\User;
use MVC\Router;
use Model\Posts;
use Model\Permisos;
use Intervention\Image\ImageManagerStatic as Image;
use Model\PostMetadata;

class AdminController {

    public static function index(Router $router) : void {
        User::checkAdmin();

        $router->render('admin/index', [
            'actual' => 'admin',
            'actualAdmin' => '',
        ]);
    }
    
    public static function getUsers(Router $router) : void {
        User::checkAdmin();
        
        $users = User::all();
        $ranks = Permisos::all();

        $router->render('admin/user/users', [
            'actual' => 'admin',
            'users' => $users,
            'ranks' => $ranks,
            'actualAdmin' => 'users',
        ]);
    }

    public static function deleteUser(Router $router) : void {
        User::checkAdmin();
        
        $id = $_GET['id'] ?? null;

        if (!is_null($id)) {
            $user = User::find($id);
            if ($user) {
                $result = $user->delete();
                if ($result) {
                    $msg = "Se eliminó la cuenta (#{$user->id} {$user->nombre} {$user->apellido} | {$user->email} )";
                    header('location: /admin/users');
                }
            }
        }
    }

    public static function editUser(Router $router) : void {
        User::checkAdmin();
       
        $id = $_GET['id'] ?? null;

        if (!is_null($id)) {
            $user = User::find(intval($id) ?? 0);
            if(!$user) {
                header('location: /admin/users');
            }
        }else {
            header('location: /admin/users');
        }

        

        if ($_SERVER['REQUEST_METHOD']=== "POST" ){

            $userData = $_POST['user'];
            $userData['id'] = intval($id);
            $user = new User($userData);
            $result = $user->update();
            
            if($result)
                header('location: /admin/users');
            else
                header('location: /admin/users?msg=3');
        }

        $ranks = Permisos::all();
        $router->render('admin/user/edit', [
            'actual' => 'admin',
            'actualAdmin' => 'users',
            'user' => $user ?? null,
            'ranks' => $ranks ?? [],
            'messages' => $user->validate(),
        ]);
    }

    public static function getPosts (Router $router) {
        User::checkRole("moderator");

        $posts = Posts::all();

        $router->render('admin/post/posts', [
            'actual' => 'admin',
            'actualAdmin' => 'posts',
            'posts' => $posts,
        ]);
    }
    
    public static function addPosts (Router $router) {
        User::checkRole("moderator");

        $id = (User::getIdFromSession());
        $errors = [];
        $post = [];
        $image = '';
        $idPost = 0;


        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $postInfo = $_POST['post'] ?? [];
            if (!empty($postInfo)) {
                $post = new Posts($postInfo);
                $post->usuario = $id;

                $tempImageName = $_FILES['post']['tmp_name']['imagen'];
                if ($tempImageName) {
                    $imageName = md5( uniqid( rand(), true ) ) . ".jpg";
                    try {
                        $image = Image::make($tempImageName);
                    } catch(ImageException $e){
                        $post->errors[] = "El formato o la imagen no pueden ser procesados";
                        // showFormat($e["message"], true);
                    }
                    //
                    $post->imagen = $imageName;
                }
                
                
                $post->validate();
                $result = $post->generate();
                if($result) {
                    if ($image) {
                        $image->save(IMAGE_DIR . $imageName);
                    }
                    $postId = $post->lastInsertId;
                    $postMetadataValues = [
                        "clave" => "show",
                        "valor" => "true",
                        "tipo" => "visible",
                        "idPost" => $postId,
                    ];
                    
                    $postMedatadata = new PostMetadata($postMetadataValues);
                    $postMedatadata->create();
                    
                    header('location: /admin/post?msg=5');
                }
                $post->errors[] = "Ocurrio un error inesperado";
                $errors = $post->errors;
            }

        }

        $router->render('admin/post/add', [
            'actual' => 'admin',
            'post' => $post ?? [],
            'actualAdmin' => 'posts',
            'showRanks' => [1, 2],
            'ranks' => Permisos::all() ?? [],
            'messages' => $errors ?? null,
            'action' => "/admin/post/add",
        ]);
    }

    public static function editPosts(Router $router) {
        User::checkRole("moderator");

        $id = $_GET['id'] ?? 0;
        $image = null;

        if (!$id && $id == 0) {
            header('locaton: /admin/post');
        }

        $post = Posts::find(intval($id));
        $post->restartErrors();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $updatePost = new Posts($_POST['post']);
            $oldImage = $post->imagen;
            
            $tempImageName = $_FILES['post']['tmp_name']['imagen'];

            if ($tempImageName) {
                $imageName = md5( uniqid( rand(), true ) ) . ".jpg";
                try {
                    $image = Image::make($tempImageName);
                } catch(ImageException $e){
                    $updatePost->errors[] = "El formato o la imagen no pueden ser procesados";
                    // showFormat($e["message"], true);
                }

                
                //
                $updatePost->imagen = $imageName;
            }else {
                $updatePost->imagen = $oldImage ?? '';
            }

    
            $result = $updatePost->update();
            if ($result) {
                if ($image) {
                    $image->save(IMAGE_DIR . $imageName);
                    if ($oldImage)
                        unlink(IMAGE_DIR . $oldImage);
                }
                //showFormat($oldImage, true);


                header('location: /admin/post');
            }
        }
        
        
        
        $router->render('admin/post/add', [
            'actual' => 'admin',
            'post' => $post ?? [],
            'actualAdmin' => 'posts',
            'showRanks' => [1, 2],
            'ranks' => Permisos::all() ?? [],
            'messages' => $post->validate() ?? null,
            'action' => "/admin/post/edit",
        ]);
    }

    public static function hidePosts(Router $router) {
        User::checkRole("moderator");

        $id = $_GET['id'] ?? null;
        $show = $_GET['show'] ?? null;

        if ($id && $show) {
            $postMetaData = PostMetadata::locate($id, 'visible');
            
            $postMetaData->valor = !($show == "true") ? 'false' : 'true';
            // showFormat($postMetaData->valor);

            $result = $postMetaData->save();

            if ($result) {
                header('location: /admin/post');
            }
        }

        
    }
}
