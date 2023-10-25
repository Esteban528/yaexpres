<?php

namespace Model;

class UsuarioMetadata extends Base
{
  protected static $dbTable = 'usuario_metadata';

  protected static $dbCol = [
    "id", "clave", "valor", "tipo", "idUsuario"
  ];

  public $id;
  public $clave;
  public $valor;
  public $tipo;
  public $idUsuario;

  public function __construct($args = []){
    $this->id = $args['id'] ?? 0;
    $this->clave = $args['clave'] ?? '';
    $this->valor = $args['valor'] ?? '';
    $this->tipo = $args['tipo'] ?? '';
    $this->idUsuario = $args['usuario'] ?? 0;

    $this->validate();
  }
}