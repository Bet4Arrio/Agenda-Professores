<?php

class Request{
    public POST;
    function __construct(){
        $dataPOST = trim(file_get_contents('php://input'));
        $this->POST = simplexml_load_string($dataPOST);
    }
}