<?php  

class Vajilla {

    private $cantPlatos, $cantCubiertos, $lugarEntrega, $fechaInicio, $horaEntrega, $horaFin, $importeTotal;
    private $codigo;
    private $importeXhora = 150;

    public function __construct($cantPlatos, $cantCubiertos, $lugarEntrega, $fechaInicio, $horaEntrega, $horaFin)
    {
        $this->cantPlatos = $cantPlatos;
        $this->cantCubiertos = $cantCubiertos;
        $this->lugarEntrega = $lugarEntrega;
        $this->fechaInicio = $fechaInicio;
        $this->horaEntrega = $horaEntrega;
        $this->horaFin = $horaFin;
        $this->codigo = $this->createCode();
    }

    private function createCode() { //  <-- Edit
        return "VAJ" . /* Timestamp fechaInicio y horaEntrega  . */ random_int(100, 500);
    }

    public function getCantPlatos()
    {
        return $this->cantPlatos;
    }
    public function setCantPlatos($cantPlatos)
    {
        $this->cantPlatos = $cantPlatos;

        return $this;
    }
    public function getCantCubiertos()
    {
        return $this->cantCubiertos;
    }
    public function setCantCubiertos($cantCubiertos)
    {
        $this->cantCubiertos = $cantCubiertos;

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
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }
    public function getHoraEntrega()
    {
        return $this->horaEntrega;
    }
    public function setHoraEntrega($horaEntrega)
    {
        $this->horaEntrega = $horaEntrega;

        return $this;
    }
    public function getHoraFin()
    {
        return $this->horaFin;
    }
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

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
    public function getImporteXhora()
    {
        return $this->importeXhora;
    }
}

?>