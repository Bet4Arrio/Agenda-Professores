<?php

require_once("lib/PersistModelAbstract.php");
require_once("models/ReuniaoModel.php");
require_once("models/AulaModel.php");
require_once("models/UserModel.php");

class AgendaModel extends PersistModelAbstract{
    private $id;
    private $professor_id;
    private $aulas;
    private $reunioes;
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

    public function _listAll(){

    }

    public function LoadByProf($_id){
        $query = "SELECT * FROM `Agenda` WHERE Professor_id = '$_id'";
        $ret = $this->o_db->query($query);
        if($ret != false){
            $data = $ret->fetchObject();
            $this->setId($data->Id);
            $this->setprofessorId($data->Professor_id);
            return $this;
        }
        return false;
    }
    public function getAllProfContents(){
  
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