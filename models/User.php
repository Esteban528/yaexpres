<?php
namespace Models;

class User {
  protected static $db;
  protected static $user;

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
        
  public $errores = [];

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

  public function save () {
    $properties = $this->sanitize();
    $query = " INSERT INTO usuarios (";
    $query .= join(", ", array_keys($properties));
    $query .= " ) VALUES ( '";
    $query .= join("', '", array_values($properties));
    $query .= "') ";

    $result = self::$db->query($query);
    return $result;
  }

  public function validate() {
    $this->errores = [];
  
    if (!$this->nombre) {
      $errores[] = "Nombre no válido";
    } 
    if (!$this->apellido) {
      $errores[] = "Apellido no válido";
    } 
    if (!$this-> email) {
      $errores[] = "Email incorrecto";
    }
    if (!$this->telefono) {
      $errores[] = "Telefono no válido";
    }
    if (!$this->cedula) {
      $errores[] = "Cedula incoherente";
    }
    if (!$this->password) {
      $errores[] = "Password no válido";
    }
    if (!$this->telefono) {
      $errores[] = "Telefono no válido";
    }
  }

  public function attributes () {
    $cols = [];
    foreach(self::$dbCol as $column){
      if ($column === 'id') continue;
      $cols[$column] = $this->$column;
    }
    return $cols;
  }

  public function sanitize() {
    $attributes = $this->attributes();
    $sanitiy = [];

    foreach ($attributes as $key => $value) {
      $sanitiy[$key] = self::$db->escape_string($value);
    }

    return $sanitiy;
  }


  # STATIC 
  public static function setDB($DB)
  {
    self::$db = $DB;
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

