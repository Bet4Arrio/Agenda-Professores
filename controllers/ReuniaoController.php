<?php
require_once "models/ReuniaoModel.php";


class ReuniaoController{
    public function homeAction(){
        $st = new AgendaModel();
        
        $o_view = new View('views/agenda.xsl');
        
        if($st->loadById(1)){
            $o_view->setParams($st->getXML());
        }   
        $o_view->showContents();
    }

    public function createAction(){
        $o_reuniao = new ReuniaoModel();
        $o_reuniao->setAgenda_id($_POST['Agenda']);
        $o_reuniao->setAluno_id($_POST['Aluno']);
        $o_reuniao->getHorarioIncio($_POST['HorarioInicio']);
        $o_reuniao->getHorarioFinal($_POST['HorarioFinal']);
        $o_reuniao->save()
    }

    public function DeleteAction(){
        $st = new ReuniaoModel();
    }

    public function UpdateAction(){
        $st = new ReuniaoModel();
    }

}