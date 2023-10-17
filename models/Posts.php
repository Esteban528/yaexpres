<?php

namespace Model;

class Posts extends Base
{
  protected static $dbTable = 'posts';

  protected static $dbCol = [
    "id", "titulo", "contenido", "imagen", "tipo", "usuario", "fecha"
  ];

  public $id;
  public $titulo;
  public $contenido;
  public $imagen;
  public $tipo;
  public $usuario;
  public $fecha;

  public function __construct($args = []){
    $this->id = $args['id'] ?? 0;
    $this->titulo = $args['titulo'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->tipo = $args['tipo'] ?? '';
    $this->usuario = $args['usuario'] ?? 0;
    $this->fecha = $args['fecha'] ?? null;

    $this->validate();
  }
}