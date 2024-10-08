<?php

namespace Model;

class Permisos extends Base
{
  protected static $dbTable = 'permisos';

  protected static $dbCol = [
    "id", "nombre",
  ];

  public $id;
  public $nombre;

  public function __construct($args = []){
    $this->id = $args['id'] ?? 0;
    $this->nombre = $args['nombre'] ?? '';
    
    $this->validate();
  }
}