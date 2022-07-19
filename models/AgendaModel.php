<?php

require_once("lib/PersistModelAbstract.php");
require_once("models/ReuniaoModel.php");
require_once("models/AulaModel.php");
require_once("models/UserModel.php");

class AgendaModel extends PersistModelAbstract{
    public $id;
    public $professor_id;
    public $aulas;
    public $reunioes;
    public $professor;
    function __construct(){
        parent::__construct();
        $this->createTable();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($in_id){
        $this->id = $in_id;
        return $this;
    }

    public function getprofessorId(){
        return $this->professor_id;
    }

    public function setprofessorId($in_professor_id){
        $this->professor_id = $in_professor_id;
        return $this;
    }

    public function getReunioes(){
        $o_reuniao = new ReuniaoModel(); 
        $this->reunioes =  $o_reuniao->_listAgenda($this->id);
        return $this->reunioes;
    }
    public function getAulas(){
        $o_aula = new ReuniaoModel(); 
        $this->aulas =  $o_aula->_listAgenda($this->id);
        return $this->aulas;
    }

    public function _listAll($_agendaID){
        $query = "SELECT * FROM Agenda WHERE 1";
        $ret = $this->o_db->query($query);
        // $data = $ret->fetchObject();
        $lista = [];
        if($ret){
            foreach ($ret as $row){
                $agenda = new AgendaModel();
                $agenda->setId($row["Id"]);
                $agenda->setprofessorId($row["Professor_id"]);
                $agenda->loadProf();
                $lista[] =  $agenda;
            }
            return $lista;
        }
        return false;
    }
    public function LoadByProf($_id){
        $query = "SELECT * FROM `Agenda` WHERE Professor_id = '$_id'";
        $ret = $this->o_db->query($query);
        if($ret != false){
            $data = $ret->fetchObject();
            if($data){
                echo $data;
                $this->setId($data->Id);
                $this->setprofessorId($data->Professor_id);
                return $this;
            }
            echo "infernoooooooooooooooooooooooooooooooooooooooooooooo";
            return false;
        }
        return false;
    }
    private function loadProf(){
        if(! is_null($this->professor_id)){
            $this->professor = new User();
            $this->professor->loadById($this->professor_id);
            return $this;
        }
    }
    
    public function getAllProfContents(){
        $this->loadProf();
        $this->getReunioes();
        $this->getAulas();
    }



    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS Agenda 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `Professor_id` INTEGER NOT NULL,
            PRIMARY KEY(Id)
        );
        
        ";
        $st = $this->o_db->prepare($query);
         try{
            $st->execute();

          }
          catch(PDOException $e)
          {
              throw $e;
          }   
    }
}