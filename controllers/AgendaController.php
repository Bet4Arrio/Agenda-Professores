<?php
require_once "models/AgendaModel.php";

class AgendaController{
    public function homeAction(){
        $st = new AgendaModel();
        
        $o_view = new View('views/agenda.xsl');
        
        if($st->loadById(1)){
            $o_view->setParams($st->getXML());
        }   
        $o_view->showContents();
    }
}