<?php
class Lista
{
    private $persona, $peso, $estatura;
    public function __construct($persona, $peso, $estatura)
    {
        $this->persona = $persona;
        $this->peso = $peso;
        $this->estatura = $estatura;
    }

    public function getMasa()
    {
        return $this->peso / (($this->estatura/100) * ($this->estatura/100));
    }
    public function getStatus()
    {
        $masa = $this->getMasa();
        if ($masa < 18.5) {
            return "Valores de bajo peso";
        }
        if ($masa < 24.90) {
            return "Valores de peso normal";
        }
        if ($masa < 29.90) {
            return "Valores de sobrepeso";
        }
        return "Valores de obesidad";
    }
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set the value of persona
     *
     * @return  self
     */
    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get the value of peso
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of estatura
     */
    public function getEstatura()
    {
        return $this->estatura;
    }

    /**
     * Set the value of estatura
     *
     * @return  self
     */
    public function setEstatura($estatura)
    {
        $this->estatura = $estatura;

        return $this;
    }
}
