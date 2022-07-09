<?php
class AulaModel extends PersistModelAbstract{
    protected $Agenda_id;
    protected $horario_incio;
    protected $horario_final;
    protected $nome;
    private $id;
    function __construct(){
        parent::__construct();
        $this->createTable();
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($in_nome){
        $this->nome = $in_nome;
        return $this;
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
                $aula = new AulaModel();
                $aula->setId($row["Id"]);
                $aula->setAgenda_id($row["Agenda_id"]);
                $aula->setNome($row["nome"]);
                $aula->setHorarioIncio($row["horario_inico"]);
                $aula->setHorarioFinal($row["horario_final"]);
                $lista[] =  $aula;
            }
            return $lista;
        }
        return false;
    }

    public function save(){
        if(is_null($this->Id)){
            $query = "INSERT INTO `Aula` 
                    (
                        Agenda_id,
                        nome,
                        horario_inico,
                        horario_final
                    )
                    VALUES
                    (   
                        '$this->Agenda_id',
                        '$this->nome',
                        '$this->horario_incio'
                        '$this->horario_final'
                    );";
        }else{
            " UPDATE  `Aula` SET
                Agenda_id=  $this->Agenda_id,
                nome = $this->nome,
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
        $query ="CREATE TABLE IF NOT EXISTS Aula 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `nome` CHAR(255) NOT NULL,
            `Agenda_id` INTEGER NOT NULL,
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