<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'correo', 'password', 'token', 'nivel', 'nro_ventas','celular'];

    public $id;
    public $nombre;
    public $correo;
    public $password;
    public $token;
    public $nivel;
    public $nro_ventas;
    public $celular;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->celular = $args['celular'] ?? '';
        $this->nivel = $args['nivel'] ?? 1;
        $this->nro_ventas = $args['nro_ventas'] ?? 0;
      
    }

    // Validar el Login de Usuarios
    public function validarLogin() {
        if(!$this->correo) {
            self::$alertas['error'][] = 'El Correo del Usuario es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña no puede ir vacia';
        }
        return self::$alertas;
    }

     // Valida un email
     public function validarEmail() {
        if(!$this->correo) {
            self::$alertas['error'][] = 'El Correo es Obligatorio';
        }
        if(!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Correo no válido';
        }
        return self::$alertas;
    }

    // Generar un Token
    public function crearToken() : void {
        $this->token = rand(111111,987654);
        
    }

     // Valida el Password 
     public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->password) < 4) {
            self::$alertas['error'][] = 'El password debe contener al menos 4 caracteres';
        }
        return self::$alertas;
    }

    // Hashea el password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}