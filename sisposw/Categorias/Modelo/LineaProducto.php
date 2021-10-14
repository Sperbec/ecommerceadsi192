<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LineaProducto
 *
 * @author user
 */
class LineaProducto {
    private $LprDes;
    public function __construct($LprDes) {
        $this->LprDes=$LprDes;
    }
    public function getLprDes(){
        return $this->LprDes;
    }
}
