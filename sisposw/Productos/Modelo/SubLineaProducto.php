<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubLineaProducto
 *
 * @author user
 */
class SubLineaProducto {
    
    private $SlproDes;
    private $LprID;
    
    function __construct($SlproDes, $LprID) {
        
        $this->SlproDes = $SlproDes;
        $this->LprID = $LprID;
    }
    

    function getSlproDes() {
        return $this->SlproDes;
    }

    function getLprID() {
        return $this->LprID;
    }



    
}
