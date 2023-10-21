<?php

namespace Model;

class User extends Base
{
  protected static $user;
  public static $levels = [
    "owner" => 5,
    "admin" => 4,
    "moderator" => 3,
    "premium" => 2,
    "all" => 1,
  ];

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
  private bool $passwordHashed = false;


  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? 0;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
    $this->cedula = $args['cedula'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->permiso  = $args['permiso'] ?? 1;

    $this->validate();
  }

  public function update () {
    static::$dbCol = [
      "id", "nombre", "apellido", "email", "telefono", "cedula", "permiso"
    ];
    return $this->save();
  }

  public function create () {
    $this->hashPassword ();
    return parent::create();
  }

  public function validate()
  {

    $this->errores = [];

    if (!$this->nombre){
      $this->errores[] = "El nombre es obligatorio";
    }
    if (!$this->apellido){
      $this->errores[] = "El apellido es obligatorio";
    }
    if (!$this->email){
      $this->errores[] = "El email es obligatorio";
    }
    if (!$this->telefono){
      $this->errores[] = "El telefono es obligatorio";
    }
    if (!$this->password){
      $this->errores[] = "La contraseña es obligatoria";
    }
    if (!$this->permiso){
      $this->errores[] = "Hay un error interno";
    }

    return $this->errores;
  }


  public static function setUser($user)
  {
    self::$user = $user;
  }

  public static function getUser()
  {
    return self::$user;
  }

  public function userExist () {
    $query = "SELECT * FROM ". static::$dbTable . " WHERE email = '". $this->email."' LIMIT 1";
    $result = self::$db->query($query);
    return $result;
  }

  protected function checkPassword($user) : bool{
    return password_verify($this->password, $user->password);
  }

  public function auth($result) : bool{
    $user = $result->fetch_object();
    $password = $this->checkPassword($user);
 
    if($password === true){
      self::sessionManager($user);
      header('location: /?msg=4');
      return true;
    }
    return false;
  }

  public static function sessionManager ($user) {
    self::startSession();

    $_SESSION['email'] = $user->email;
    $_SESSION['id'] = $user->id;
    $_SESSION['logged'] = true;
    $_SESSION['permiso'] = intval($user->permiso);

  }

  public static function isAuth(): bool
  {
    self::startSession();
    if ($_SESSION['logged']) return true;
    // header('Location: /');
    return false;
  }

  public static function getPermits() : int {
    self::startSession();
    return $_SESSION['permiso'] ?? 0;
  }

  public static function logout () {
    self::startSession();
    $_SESSION = [];
    header('location: /?msg=3');
    session_destroy();
  }

  public static function restartActivity() {    
    self::startSession();
    
    $inactivity_timeout = 1800; 
    
    if (isset($_SESSION['last_activity'])) {        
        if (time() - $_SESSION['last_activity'] > $inactivity_timeout) {            
            session_unset();
            session_destroy();
        }
    }
    
    $_SESSION['last_activity'] = time();

  }

  public static function checkAdmin() {
    $bool = self::isRole("admin", self::getPermits());
    
    if (!$bool) {
      header('location: /error');
    }
  }

  public static function checkRole($rol) {
    $bool = self::isRole($rol, self::getPermits());
    
    if (!$bool) {
      header('location: /error');
    }
  }

  public static function isRole($rol, $level) {
    return $level >= self::$levels[$rol];
  }
  
  public static function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
      return session_start();
    }
  }

  public function hashPassword()
  {
    if (!$this->passwordHashed) {
      $passwordHash = password_hash($this->password, PASSWORD_BCRYPT);
      $this->passwordHashed = true;
      $this->password = $passwordHash;
    }
  }
}
