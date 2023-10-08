<?php
namespace Models;

class User extends Base{
  protected static $user;
  protected static $dbTable = 'usuarios';

  protected static $dbCol = [
    "id", "nombre", "apellido", "email", "telefono", "cedula", "password", "permiso" 
  ];

  public $id;
  public $nombre;
  public $apellido;
  public $email;
  public $telefono;
  public $cedula;
  public $password;
  public $permiso;
        

  public function __construct($args = [])
  {
    $this -> id = $args['id'] ?? 0;
    $this -> nombre = $args['nombre'] ?? '';
    $this -> apellido = $args['apellido'] ?? '';
    $this -> email = $args['email'] ?? '';
    $this -> telefono = $args['telefono'] ?? '';
    $this -> cedula = $args['cedula'] ?? '';
    $this -> password = $args['password'] ?? '';
    $this -> permiso  = $args['permiso'] ?? '';

    $this->validate();
  }

  public static function auth () : bool {
    session_start();
    
    if (!$_SESSION['login']) {
      header('Location: /');
    } 
      return true;
  }

  public static function setUser($user) {
    self::$user = $user;
  }
  
  public static function getUser()  {
    return self::$user;
  }
  
}

