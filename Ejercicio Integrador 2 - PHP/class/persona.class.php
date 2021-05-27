<?php

class Persona
{
    private $apellido, $nombre, $dni, $fechaNacimiento;
    private $contratos;
    public function __construct($apellido, $nombre, $dni, $fechaNacimiento)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->contratos = array();
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
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
    public function getContratos()
    {
        return $this->contratos;
    }
    public function setContratos($contratos)
    {
        $this->contratos = $contratos;

        return $this;
    }
}
