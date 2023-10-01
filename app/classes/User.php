<?php
namespace App;

class User {
  protected static $db;

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

  public static function setDB($DB)
  {
    self::$db = $DB;
  }
}

