<?php


// namespace model;

class ProfessorModel extends PersistModelAbstract{
    protected $nome;
    private $id;
    function __construct(){
        parent::__construct($parent);
        $this->createTable();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($in_id){
        $this->id = $in_id;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($in_nome){
        $this->nome = $in_nome;
        return $this;
    }

    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS Professor 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `Nome` CHAR(255) NOT NULL,
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