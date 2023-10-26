<?php

namespace Model;

class PostMetadata extends Base
{
  protected static $dbTable = 'post_metadata';

  protected static $dbCol = [
    "id", "clave", "valor", "tipo", "idPost"
  ];

  public $id;
  public $clave;
  public $valor;
  public $tipo;
  public $idPost;

  public function __construct($args = []){
    $this->id = $args['id'] ?? 0;
    $this->clave = $args['clave'] ?? '';
    $this->valor = $args['valor'] ?? '';
    $this->tipo = $args['tipo'] ?? '';
    $this->idPost = $args['idPost'] ?? 0;

    $this->validate();
  }

  public static function locate($id, $type) {
    $query = "SELECT * FROM ". static::$dbTable;
    $query .= " WHERE idPost = ";
    $query .= $id." AND tipo = '".$type."' ";
    
    $result = self::consult($query);
    return array_shift($result);
  }

  public function validate()
  {
    $this->errors = [];

    if(!$this->clave) {
      $this->errors = "No hay clave";
    }

    if(!$this->valor) {
      $this->errors = "No hay valor";
    }

    return $this->errors;
  }
}