<?php


class TelefonoProveedor {
    private $ProId;
    private $TelProNum;
    function __construct($ProId, $TelProNum) {
        $this->ProId = $ProId;
        $this->TelProNum = $TelProNum;
    }
    function getProId() {
        return $this->ProId;
    }

    function getTelProNum() {
        return $this->TelProNum;
    }

}
