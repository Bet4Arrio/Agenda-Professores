<?php

require_once("lib/PersistModelAbstract.php");

class AgendaModel extends PersistModelAbstract{
    private $id;
    private $xml;
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

    public function getXml(){
        return $this->xml;
    }
    public function setXml($in_xml){
        $this->xml = $in_xml;
        return $this;
    }
    public function loadById($id){
        $query = "SELECT * FROM Agenda_temp WHERE Id=$id";
        $ret = $this->o_db->query($query);
        if($ret != false){
            $data = $ret->fetchObject();
            $this->setId($data->Id);
            $this->setXml($data->xml);
            return $this;
        }
        return false;
    }
    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS Agenda_temp 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `xml` LONGTEXT NOT NULL,
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