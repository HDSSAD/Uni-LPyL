<?php
class Persona{

    public $usuario;
    private $pass;
    private $apellido;
    private $nombre;
    private $lista;
    public function __construct($usuario, $pass, $apellido, $nombre)
    {
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->lista = array();
    }

    public function agregarLista($item) {
        $this->lista[] = $item;
    }
    public function quitarLista($item) {
        
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getLista()
    {
        return $this->lista;
    }
    public function setLista($lista)
    {
        $this->lista = $lista;

        return $this;
    }
}