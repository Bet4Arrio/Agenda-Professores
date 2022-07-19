<?php
require_once "models/AgendaModel.php";
require_once "models/UserModel.php";
require_once "models/AulaModel.php";

class AgendaController{
    public function homeAction(){
        $st = new AgendaModel();
        
        $o_view = new View('views/agenda/todas.xsl');
        
        if($st->_listAll){
        $o_view->setParams($st);
        }   
        $o_view->showContents();
    }

    public function profAction($_prof = NULL){
        if ($_prof == NULL) {
            header("Location: ".URL."/agenda");
        }
        $st = new AgendaModel();
        $o_view = new View('views/agenda.xsl');
        if($st->LoadByProf($_id)){
            $st->getAllProfContents();
            $o_view->setParams($st);
        }
        $o_view->showContents();
    }

    public function MyAgendaAction(){
        $user = new User(); 
        
        if($user->isloged()){
            if(!$user->is_teacher()){
                header("Location: ".URL."/home");
            }
            $st = new AgendaModel();
            $o_view = new View('views\agenda\minhaAgenda.xsl');
            if($st->LoadByProf($user->Id)){
                $st->getAllProfContents();
                $o_view->setParams($st);
            }
            $o_view->showContents();
        }
        header("Location: ".URL."/home");
    }

}