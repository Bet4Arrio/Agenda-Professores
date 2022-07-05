<?php
class ProfessorModel extends PersistModelAbstract{
    protected $Agenda_id;
    protected $Aluno_id;
    protected $horario;
    private $id;
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

    public function getAgenda_id(){
        return $this->Agenda_id;
    }
    public function setAgenda_id($in_Agenda_id){
        $this->Agenda_id = $in_Agenda_id;
        return $this;
    }

    public function getAluno_id(){
        return $this->Aluno_id;
    }
    public function setAluno_id($in_Aluno_id){
        $this->Aluno_id = $in_Aluno_id;
        return $this;
    }

    public function getHorario(){
        return $this->horario;
    }
    public function setHorario($in_horario){
        $this->horario = $in_horario;
        return $this;
    }

    
    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS Reuniao 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `Agenda_id` INTEGER NOT NULL,
            `Aluno_id` INTEGER NOT NULL,
            `horario` DATETIME NOT NULL,
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