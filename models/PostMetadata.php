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
    $this->idPost = $args['usuario'] ?? 0;

    $this->validate();
  }
}