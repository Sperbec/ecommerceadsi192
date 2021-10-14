<?php

class Producto {
    private $ArtCant;
    private $ArtPre;
    private $ArtDes;
    private $ProNdo;
    private $SLproId;
    private $imgnombre;
    private $imgruta;
            
    
    function __construct($name,$ruta, $ArtCant, $ArtPre, $ArtDes, $ProNdo, $SLproId) {
        $this->imgnombre= $name;
        $this->imgruta = $ruta;
        $this->ArtCant = $ArtCant;
        $this->ArtPre = $ArtPre;
        $this->ArtDes = $ArtDes;
        $this->ProNdo = $ProNdo;
        $this->SLproId = $SLproId;
    }
    
    function getimgname() {
      
        return $this->imgnombre;
    }
    
    function getimgruta() {
      
        return $this->imgruta;
    }
    
    function getArtCant() {
        return $this->ArtCant;
    }

    function getArtPre() {
        return $this->ArtPre;
    }

    function getArtDes() {
        return $this->ArtDes;
    }

    function getProNdo() {
        return $this->ProNdo;
    }

    function getSLproId() {
        return $this->SLproId;
    }

    



    
    
    
    
}
