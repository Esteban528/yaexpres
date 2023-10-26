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
    $this->contenido = $args['contenido'] ?? '';
    $this->tipo = $args['tipo'] ?? 1;
    $this->usuario = $args['usuario'] ?? 0;
    $this->fecha = $args['fecha'] ?? null;

    $this->restartErrors();
    $this->validate();
  }

  public function restartErrors(){
    $this->errors = [];
  }

  public function validate()
  {

    if (!$this->titulo) {
      $this->errors[] = "El titulo es obligatorio";
    }
    // if (!$this->imagen) {
    //   $this->errors[] = "La imagen es obligatoria";
    // }
    if (!$this->contenido) {
      $this->errors[] = "El contenido es obligatorio";
    }
    if (!$this->tipo) {
      $this->errors[] = "El tipo es obligatorio";
    }

    return $this->errors;
  }
  public function update () {
    // static::$dbCol = [
    //   "id", "nombre", "apellido", "email", "telefono", "cedula", "permiso"
    // ];
    return $this->save();
  }

  public function generate() {
    static::$dbCol = [
      "id", "titulo", "contenido", "imagen", "tipo", "usuario"
    ];

    return $this->create();
  }
}