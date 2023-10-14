<?php

namespace Model;

class Base
{
    public $errores = [];
    public $id=0;

    public static $db;
    protected static $dbCol = [];
    protected static $dbTable = '';
    

    public function save()
    {
        $properties = $this->sanitize();
        $query = " INSERT INTO ".static::$dbTable." (";
        $query .= join(", ", array_keys($properties));
        $query .= " ) VALUES ( '";
        $query .= join("', '", array_values($properties));
        $query .= "') ";

        $result = self::$db->query($query);
        return $result;
    }

    public function create() {   
        $attributes = $this->sanitize();
        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$dbTable . " ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";
        
        if (!empty($error)){
            $result = self::$db->query($query);
        }
        
        return $result ?? null;
    }

    public function delete () {
        if ($this->id && $this->id>0) {
            $query = "DELETE FROM ".static::$dbTable." WHERE id=".$this->id;
            // showFormat($query, true);
            $result = self::$db->query($query);
            return $result;
        }
    }

    public function validate()
    {
        $this->errores = [];

        foreach (static::$dbCol as $value) {
            if (!$this->$value) {
                $errores[] = $value . " inválido";
            }
        }

    }

    public function attributes()
    {
        $cols = [];
        foreach (static::$dbCol as $column) {
            if ($column === 'id') continue;
            $cols[$column] = $this->$column;
        }
        return $cols;

        
    }

    public function sanitize()
    {
        $attributes = $this->attributes();
        $sanitiy = [];

        foreach ($attributes as $key => $value) {
            $sanitiy[$key] = self::$db->escape_string($value);
        }
        
        return $sanitiy;
    }

    # STATIC 
    public static function setDB($DB)
    {
        self::$db = $DB;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$dbTable . "";
        $result = self::consult($query);
        return $result;
    }

    public static function find($id) {
        $query = "SELECT * FROM " . static::$dbTable  ." WHERE id = {$id}";
        $result = self::consult($query);
        return array_shift( $result ) ;
    }

    public static function get($limit) {
        $query = "SELECT * FROM " . static::$dbTable . " LIMIT {$limit}";
        $result = self::consult($query);

        return $result;
    }

    protected static function consult($query) : array {
        
        $result = self::$db->query($query);
        $array = [];
        while($registro = $result->fetch_assoc()) {
            $array[] = static::createObject($registro);
        }

        $result->free();
        return $array;
    }

    protected static function createObject($array) {
        $obj = new static;
        foreach($array as $key => $value ) {
            if(property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }
        return $obj;
    }
}
