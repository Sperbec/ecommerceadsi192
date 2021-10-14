<?php


class Proveedores {
    private $ProNdo;
    private $ProNit;
    private $ProNom;
    private $CiuCod;
    private $ProDir;
    private $ProEma;
    
    function __construct($ProNdo, $ProNit, $ProNom, $CiuCod, $ProDir, $ProEma) {
        $this->ProNdo = $ProNdo;
        $this->ProNit = $ProNit;
        $this->ProNom = $ProNom;
        $this->CiuCod = $CiuCod;
        $this->ProDir = $ProDir;
        $this->ProEma = $ProEma;
    }
        
    function getProNdo() {
        return $this->ProNdo;
    }

    function getProNit() {
        return $this->ProNit;
    }

    function getProNom() {
        return $this->ProNom;
    }

    function getCiuCod() {
        return $this->CiuCod;
    }

    function getProDir() {
        return $this->ProDir;
    }

    function getProEma() {
        return $this->ProEma;
    }



}
