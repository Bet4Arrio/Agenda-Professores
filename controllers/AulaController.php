<?php

require_once "models/AulaModel.php";

class AulaController{
    public function homeAction(){
        $st = new AgendaModel();
        
        $o_view = new View('views/agenda.xsl');
        
        if($st->loadById(1)){
            $o_view->setParams($st->getXML());
        }   
        $o_view->showContents();
    }

    public function createAction(){
        $st = new AulaModel();
    }

    public function DeleteAction(){
        $st = new AulaModel();
    }

    public function UpdateAction(){
        $st = new AulaModel();
    }
}