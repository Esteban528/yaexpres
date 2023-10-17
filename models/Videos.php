<?php

namespace Model;

class Videos extends Base
{
  protected static $dbTable = 'videos';

  protected static $dbCol = [
    "id", "titulo",
  ];

  public $id;
  public $titulo;

  public function __construct($args = []){
    $this->id = $args['id'] ?? 0;
    $this->titulo = $args['titulo'] ?? '';
    
    $this->validate();
  }
}