<?php
namespace Controller;

use Model\User;
use MVC\Router;
use Model\Posts;
use Model\Permisos;
use Intervention\Image\ImageManagerStatic as Image;

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

        if ($_SERVER['REQUEST_METHOD']==="POST"){
            $userData = $_POST['user'];
            $userData['id'] = intval($id);
            $user = new User($userData);
            $result = $user->update();
            
            if($result){
                header('location: /admin/users');
            }
            else
                header('location: /admin/users?msg=3');
        }

        $ranks = Permisos::all();
        $router->render('admin/user/edit', [
            'actual' => 'admin',
            'actualAdmin' => 'users',
            'user' => $user ?? null,
            'ranks' => $ranks ?? [],
        ]);
    }

    public static function getPosts (Router $router) {
        User::checkRole("moderator");

        $router->render('admin/post/posts', [
            'actual' => 'admin',
            'actualAdmin' => 'posts',
        ]);
    }
    
    public static function addPosts (Router $router) {
        $id = (User::getIdFromSession());
        $post = [];

        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $postInfo = $_POST['post'] ?? [];
            if (!empty($postInfo)) {
                $post = new Posts($postInfo);

                $tempImageName = $_FILES['post']['tmp_name']['imagen'];
                if ($tempImageName) {
                    $imageName = md5( uniqid( rand(), true ) ) . ".jpg";
                    $image = Image::make($tempImageName)->fit(800,600);
                    $image->save(IMAGE_DIR . $imageName);
                    
                    
                }
                
            }

        }

            // // Setear la imagen
            // // Realiza un resize a la imagen con intervention
            // if($_FILES['posts']['tmp_name']['imagen']) {
            //     $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            //     $propiedad->setImagen($nombreImagen);
            // }
            // $image->save(CARPETA_IMAGENES . $nombreImagen);

            

        $router->render('admin/post/add', [
            'actual' => 'admin',
            'post' => $post ?? [],
            'actualAdmin' => 'posts',
            'showRanks' => [1, 2],
            'ranks' => Permisos::all() ?? [],
        ]);
    }
}