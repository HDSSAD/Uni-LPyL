<?php

class Vehiculo
{
    private $patente, $marca, $modelo, $lugarEntrega, $lugarRecepcion, $fechaInicio, $fechaFin, $importeTotal;
    private $codigo;
    private $importeXdia = 1850;

    public function __construct($patente, $marca, $modelo, $lugarEntrega, $lugarRecepcion, $fechaInicio, $fechaFin)
    {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->lugarEntrega = $lugarEntrega;
        $this->lugarRecepcion = $lugarRecepcion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->codigo = $this->createCode();
    }

    private function createCode()
    {
        return "VEH-" . random_int(10000, 20000) . "-" . $this->patente;
    }
    public function getPatente()
    {
        return $this->patente;
    }
    public function setPatente($patente)
    {
        $this->patente = $patente;

        return $this;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
    public function getLugarEntrega()
    {
        return $this->lugarEntrega;
    }
    public function setLugarEntrega($lugarEntrega)
    {
        $this->lugarEntrega = $lugarEntrega;

        return $this;
    }
    public function getLugarRecepcion()
    {
        return $this->lugarRecepcion;
    }
    public function setLugarRecepcion($lugarRecepcion)
    {
        $this->lugarRecepcion = $lugarRecepcion;

        return $this;
    }
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }
    public function getImporteTotal()
    {
        return $this->importeTotal;
    }
    public function setImporteTotal($importeTotal)
    {
        $this->importeTotal = $importeTotal;

        return $this;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getImporteXdia()
    {
        return $this->importeXdia;
    }
}
