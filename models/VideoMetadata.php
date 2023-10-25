<?php

namespace Model;

class VideoMetadata extends Base
{
  protected static $dbTable = 'video_metadata';

  protected static $dbCol = [
    "id", "clave", "valor", "tipo", "idVideo"
  ];

  public $id;
  public $clave;
  public $valor;
  public $tipo;
  public $idVideo;

  public function __construct($args = []){
    $this->id = $args['id'] ?? 0;
    $this->clave = $args['clave'] ?? '';
    $this->valor = $args['valor'] ?? '';
    $this->tipo = $args['tipo'] ?? '';
    $this->idVideo = $args['usuario'] ?? 0;

    $this->validate();
  }
}