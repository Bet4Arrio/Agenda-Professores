<?php

require_once("lib/PersistModelAbstract.php");

class AgendaModel extends PersistModelAbstract{
    private $id;
    private $professor_id;
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

    public function getprofessor_id(){
        return $this->professor_id;
    }
    public function setprofessor_id($in_professor_id){
        $this->professor_id = $in_professor_id;
        return $this;
    }
    // public function loadById($id){}

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