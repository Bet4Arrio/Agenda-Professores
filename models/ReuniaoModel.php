<?php
class ReuniaoModel extends PersistModelAbstract{
    public $Agenda_id;
    public $Aluno_id;
    public $horario_incio;
    public $horario_final;

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

    public function getHorarioIncio(){
        return $this->horario_incio;
    }
    public function setHorarioIncio($in_horario_incio){
        $this->horario_incio = $in_horario_incio;
        return $this;
    }


    public function getHorarioFinal(){
        return $this->horario_final;
    }
    public function setHorarioFinal($in_horario_final){
        $this->horario_final = $in_horario_final;
        return $this;
    }

    public function _listAgenda($_agendaID){
        $query = "SELECT * FROM Reuniao WHERE Agenda_id='$_agendaID'";
        $ret = $this->o_db->query($query);
        // $data = $ret->fetchObject();
        $lista = [];
        if($ret){
            foreach ($ret as $row) {
                $reuniao = new ReuniaoModel();
                $reuniao->setId($row["Id"]);
                $reuniao->setAgenda_id($row["Agenda_id"]);
                $reuniao->setAluno_id($row["Aluno_id"]);
                $reuniao->setHorarioIncio($row["horario_inico"]);
                $reuniao->setHorarioFinal($row["horario_final"]);
                $lista[] =  $reuniao;
            }
            return $lista;
        }
        return false;
    }

    public function save(){
        if(is_null($this->Id)){
            $query = "INSERT INTO `Reuniao` 
                    (
                        Agenda_id,
                        Aluno_id,
                        horario_inico,
                        horario_final
                    )
                    VALUES
                    (   
                        '$this->Agenda_id',
                        '$this->Aluno_id',
                        '$this->horario_incio'
                        '$this->horario_final'
                    );";
        }else{
            "UPDATE `Reuniao`  SET
                Agenda_id=  $this->Agenda_id,
                Aluno_id = $this->Aluno_id,
                horario_inico = $this->horario_incio,
                horario_final = $this->horario_final,
            WHERE
                Id=$this->id;";
        }

        try {
            if($this->o_db->exec($query)>0){
                if(is_null($this->id)){
                    return $this->o_db->lastInsertId();
                }else{
                    return $this->id;
                }
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return false;
    }

    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS Reuniao 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `Agenda_id` INTEGER NOT NULL,
            `Aluno_id` INTEGER NOT NULL,
            `horario_inico` DATETIME NOT NULL,
            `horario_final` DATETIME NOT NULL,
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